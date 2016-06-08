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
                                                  :     function($router_collection, $actual_path, $request, $user){
            foreach($router_collection->all() as $value){
                if($value->getPath() === $actual_path){
                    return $value->getDefaults()['_controller'];
                }
            }
        };

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
     * @Route("/buildtree", name="build_tree")
     */
    public function buildTree(Request $request, $user)
    {
        return new Response('[{
                    "id":1,"text":"Root node","children":[
                    {"id":2,"text":"Child node 1"},
                    {"id":3,"text":"Child node 2"}
                ]}]');
    }


}
