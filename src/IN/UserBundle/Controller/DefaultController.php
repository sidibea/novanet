<?php

namespace IN\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('INUserBundle:Default:index.html.twig');
    }
}
