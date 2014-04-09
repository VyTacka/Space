<?php

namespace VA\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();

        return $this->render('VAAdminBundle:Default:index.html.twig', array('user' => $user));
    }
}
