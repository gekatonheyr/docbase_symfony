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

        $request_cookies = $request->cookies;
        if($request_cookies->has('AUTH_COOKIE')){
            $tmp = $request_cookies->get('AUTH_COOKIE');
            $router = $this->get('router');
            $router_collection = $router->getRouteCollection()->all();
            $actual_path = $request->getPathInfo();
            foreach($router_collection as $value){
                if($value->getPath() === $actual_path){
                    $action_controller = explode('::', $value->getDefaults()['_controller']);
                    //use $action_controller[0];
                    $action_controller[1]();

                }
            }
        }
        $response =  new Response();

        $form = $this->createForm(LoginForm::class, $user);

        $form->handleRequest($request);
        $data = $form->getData();
        $login = $request->request->get('login') ? $request->request->get('login') : $data->getLogin();
        $pass = $request->request->get('passwordHash') ? $request->request->get('passwordHash') : $data->getPasswordHash();
        if(!$login && !$pass){
            return $this->render('TarasTestBundle:Default:login.html.twig', array('login_form' => $form->createView(),));
        }else if($login && !$pass){
            $user_em =$this->getDoctrine()->getManager();
            $user_repo = $user_em->getRepository('TarasTestBundle:User');
            $user=$user_repo->findOneBy(array('login'=>$login));
            if($user){
                $user->generateSalt($user_em);
                return $response->setContent(sha1($user->getSalt()));

            }
        }else if($login && $pass){
            if ($form->isSubmitted() && $form->isValid()) {
                $tmp_user = $this->getDoctrine()->getManager()->getRepository('TarasTestBundle:User')->findOneBy(array('login' => $login));
                if($tmp_user && $pass === sha1($tmp_user->getPasswordHash().sha1($tmp_user->getSalt()))) {
                    $response->headers->setCookie(new Cookie('AUTH_COOKIE', $tmp_user->getId().' '.$pass, time()+3600, '/'));
                    $response->send();
                    return $this->render('TarasTestBundle:Default:index.html.twig', array('login' => $user->getLogin(),
                        'passwordHash' => $user->getPasswordHash(),));
                }else{
                    $form->addError(new FormError('You have entered wrong data!'));
                    return $this->render('TarasTestBundle:Default:login.html.twig', array('login_form' => $form->createView(),));
                }
            }
        }
    }


}
