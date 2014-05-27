<?php

namespace VA\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        return $this->render('VAAdminBundle:Default:index.html.twig',
            array(
                'planets' => $em->getRepository('VACoreBundle:Planets')->countAll(),
                'satellites' => $em->getRepository('VACoreBundle:Satellites')->countAll(),
                'stars' => $em->getRepository('VACoreBundle:Stars')->countAll(),
                'systems' => $em->getRepository('VACoreBundle:Systems')->countAll(),
                'users' => $em->getRepository('VACoreBundle:User')->countAll()
            ));
    }
}
