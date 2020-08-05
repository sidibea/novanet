<?php


namespace IN\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('INAdminBundle::dashboard.html.twig');
    }

}