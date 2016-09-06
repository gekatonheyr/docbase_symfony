<?php

namespace TarasTestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LawDeptController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
