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

        $user_em = $this->getDoctrine()->getManager();
        $user_base = $user_em->getRepository('TarasTestBundle:User');

        $router = $this->get('router');
        $router_collection = $router->getRouteCollection()->all();
        $actual_path = $request->getPathInfo();

        $request_cookies = $request->cookies;
        if($request_cookies->has('AUTH_COOKIE')){
            $auth_cookie_value = $request_cookies->get('AUTH_COOKIE');
            $auth_data = explode(' ', $auth_cookie_value);
            $user = $user_base->findOneBy(array('id'=>$auth_data[0]));
            if($auth_data[1] === sha1($user->getPasswordHash().sha1($user->getSalt()))){
                $user->generateSalt($user_em);
                $response->headers->setCookie(new Cookie('AUTH_COOKIE', $user->getId().' '.sha1($user->getPasswordHash().sha1($user->getSalt())), time()+3600, '/'));
                $response->send();

                foreach($router_collection as $value){
                    if($value->getPath() === $actual_path){
                        return $this->forward($value->getDefaults()['_controller'], array('request' => $request,
                                                                                            'user' => $user,));
                    }
                }
                return $this->forward('TarasTestBundle:Default:index', array('request' => $request,
                                                                        'user' => $user,));
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
                    return $this->forward($value->getDefaults()['_controller'], array('request' => $request,
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


}
