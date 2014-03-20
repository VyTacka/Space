<?php

namespace VA\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VAAdminBundle:Default:index.html.twig');
    }
}
