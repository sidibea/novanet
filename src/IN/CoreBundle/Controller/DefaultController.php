<?php

namespace IN\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('INCoreBundle:Default:index.html.twig');
    }
}
