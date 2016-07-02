<?php

namespace TarasTestBundle\Controller;

use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Cookie;
use TarasTestBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TarasTestBundle\Form\LoginForm;

class DefaultController extends Controller
{
    /**
     * @Route("/{slug}", name="root_route", defaults={"slug"=""})
     */
    public function authAction(Request $request, $slug)
    {
        $user = new User();
        $response =  new Response();
        $request_cookies = $request->cookies;

        $user_em = $this->getDoctrine()->getManager();
        $user_base = $user_em->getRepository('TarasTestBundle:User');

        $router = $this->get('router');
        $router_collection = $router->getRouteCollection();
        $actual_path = $request->getPathInfo();
        $current_controller = ($actual_path==="/")?     $router_collection->get('index_page')->getDefaults()['_controller']
                                                  :     $this->disposeController($router_collection, $actual_path, $request, $user);/*{
            foreach($router_collection->all() as $value){
                if($value->getPath() === $actual_path){
                    return $value->getDefaults()['_controller'];
                }
            }
        };*/

        if($request_cookies->has('AUTH_COOKIE')){
            $auth_cookie_value = $request_cookies->get('AUTH_COOKIE');
            $auth_data = explode(' ', $auth_cookie_value);
            $user = $user_base->findOneBy(array('id'=>$auth_data[0]));
            if($auth_data[1] === sha1($user->getPasswordHash().sha1($user->getSalt()))){
                $user->generateSalt($user_em);
                $response->headers->setCookie(new Cookie('AUTH_COOKIE', $user->getId().' '.sha1($user->getPasswordHash().sha1($user->getSalt())), time()+3600, '/'));
                $response->send();
                return $this->forward($current_controller, array('request' => $request, 'user' => $user,));
            }
        }

        $form = $this->createForm(LoginForm::class, $user);
        $form->handleRequest($request);
        $data = $form->getData();
        $login = $request->request->get('login') ? $request->request->get('login') : $data->getLogin();
        $pass = $request->request->get('passwordHash') ? $request->request->get('passwordHash') : $data->getPasswordHash();

        if(!$login && !$pass){
            return $this->render('TarasTestBundle:Default:login.html.twig', array('login_form' => $form->createView(),));
        }else if($login && !$pass){
            $user=$user_base->findOneBy(array('login'=>$login));
            if($user){
                $user->generateSalt($user_em);
                return $response->setContent(sha1($user->getSalt()));

            }
        }else if($login && $pass){
            if ($form->isSubmitted() && $form->isValid()) {
                $tmp_user = $user_base->findOneBy(array('login' => $login));
                if($tmp_user && $pass === sha1($tmp_user->getPasswordHash().sha1($tmp_user->getSalt()))) {
                    $response->headers->setCookie(new Cookie('AUTH_COOKIE', $tmp_user->getId().' '.$pass, time()+3600, '/'));
                    $response->send();
                    return $this->forward($current_controller, array('request' => $request,
                        'user' => $user,));
                }else{
                    $form->addError(new FormError('You have entered wrong data!'));
                    return $this->render('TarasTestBundle:Default:login.html.twig', array('login_form' => $form->createView(),));
                }
            }
        }
    }

    /**
     * @Route("/index", name="index_page")
     */
    public function indexAction(Request $request, $user)
    {
        return $this->render('TarasTestBundle:Default:index.html.twig', array('login' => $user->getLogin(),
            'passwordHash' => $user->getPasswordHash(),));
    }

    /**
     * @Route("/buildtree", name="buildtree")
     */
    public function buildTree(Request $request, $user)
    {
        $em = $this->getDoctrine()->getManager();
        /*here i'll define root table of the database to form the sidebar tree.
        not sure it is right decision, the time will show it
        but as i think later on i'll create some config file to store this parameter*/
        $root_table = $em->getRepository('TarasTestBundle:DeptStruct');

        $current_node = $request->query->get('id', 'parameters');
        if($current_node == '#'){
            $tree_root = $root_table->findAll();
            $curr_tree_lvl_nodes = array();
            foreach($tree_root as $key => $value){
                $curr_tree_lvl_nodes[] = array( 'id' => $value->getAlias().'-'.$value->getSuccessorTable(),
                                                'text' => $value->getDeptTitle(),
                                                'children' => true);
            }
            return new Response(json_encode($curr_tree_lvl_nodes));
        }
        $children = true;
        $entity_path = explode('-', $current_node);
        $entity_pairs = array();
        while(!empty($entity_path)){
            $entity_pairs[array_shift($entity_path)] = array_shift($entity_path);
        }

        reset($entity_pairs);
        $root_entity_name = key($entity_pairs);
        $aliases_values = array_keys($entity_pairs);
        $successors_vallues = array_values($entity_pairs);

        $current_entity = array_pop($entity_pairs);
        $parent_entity = array_pop($entity_pairs);


        $current_entity_tmpl = explode('_', $current_entity);
        foreach($current_entity_tmpl as $key => $value){
            $entity_name[$key] = ucfirst($value);
        }
        $entity_name = implode('', $entity_name);

        /*in EACH table we need to have some clue column to bundle :) all tables together,
        so i think to form this clue inherited from root_table mentioned at the beginning of the function.
        It forms from the root_table name - the first part of the combination which is the name of table,
        plus postfix _id
        */
        $clue_column = array_shift(explode('_', $em->getClassMetadata('TarasTestBundle:DeptStruct')->getTableName())).'Id';
        $clue_entity_id = $root_table->findOneBy(array('alias' => $root_entity_name))->getId();

        if($current_entity == $parent_entity){
            $parent_node_id = $em->getRepository('TarasTestBundle:'.$entity_name)->findOneBy(array('alias' => array_pop($aliases_values)))->getId();
            $target_table = $em->getRepository('TarasTestBundle:'.$entity_name)->findBy(array('parentId' => $parent_node_id));
        }elseif(in_array($clue_column, $em->getClassMetadata('TarasTestBundle:'.$entity_name)->getFieldNames())){
            $target_table = $em->getRepository('TarasTestBundle:'.$entity_name)->findBy(array($clue_column => $clue_entity_id));
        }else {
            $target_table = $em->getRepository('TarasTestBundle:' . $entity_name)->findAll();
        }


        foreach($target_table as $key => $value){
            if(method_exists($value, 'getHasSubnodes')) $children = $value->getHasSubnodes() ? true : false;
            if($current_entity != $parent_entity) {
                if (method_exists($value, 'getParentId') && $value->getParentId() != null) continue;
            }

            $curr_tree_lvl_nodes[] = array( 'id' => $current_node.'-'.$value->getAlias().'-'.$value->getSuccessorTable(),
                                            'text' => $value->getTitle(),
                                            'children' => $children);
        }
        return new Response(json_encode($curr_tree_lvl_nodes));
    }

    public function disposeController($router_collection, $actual_path, $request, $user){
        foreach($router_collection->all() as $value){
            if($value->getPath() === $actual_path){
                return $value->getDefaults()['_controller'];
            }
        }
    }


}
