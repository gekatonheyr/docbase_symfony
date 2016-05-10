<?php

namespace TarasTestBundle\Controller;

use TarasTestBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        //return $this->render('TarasTestBundle:Default:index.html.twig');
        $user = new User();
        /*$user->setLogin('Taras');
        $user->setPass('nopass');*/

        $form = $this->createFormBuilder($user)
            ->add("login", TextType::class, array('label' => 'Enter yout login please '))
            ->add("pass", TextType::class)
            ->add("enter", SubmitType::class, array('label' => 'Enter'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            return $this->render('TarasTestBundle:Default:index.html.twig', array('login' => $user->getLogin(),
                                                                                  'pass' => $user->getPass(),));
        }

        return $this->render('TarasTestBundle:Default:login.html.twig', array('form' => $form->createView(),));

    }
}
