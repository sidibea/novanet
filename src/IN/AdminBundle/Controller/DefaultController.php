<?php

namespace IN\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('INAdminBundle:Default:index.html.twig');
    }
}
