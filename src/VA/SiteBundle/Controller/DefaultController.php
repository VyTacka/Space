<?php

namespace VA\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
//        return $this->render('VASiteBundle:Default:index.html.twig', array('name' => $name));
        return $this->render('VASiteBundle:Default:index.html.twig');
    }
}
