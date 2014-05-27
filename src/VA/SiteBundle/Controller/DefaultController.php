<?php

namespace VA\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use VA\SiteBundle\Form\ContactType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $system = $em->getRepository('VACoreBundle:Systems')->findAll();
        $star = $em->getRepository('VACoreBundle:Stars')->findOneBy(array('systems' => $system[0]->getId()));
        $planets = $em->getRepository('VACoreBundle:Planets')->findBy(
            array('system' => $system[0]->getId()),
            array('order' => 'ASC')
        );

        $form = $this->createForm(new ContactType(array('action' => 'action')));

        return $this->render('VASiteBundle:Default:index.html.twig',
            array('system' => $system[0],
                'star' => $star,
                'planets' => $planets,
                'form' => $form->createView()
            ));
    }

    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());

        if ($request->isMethod('POST')) {
            $form->submit($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject($form->get('subject')->getData())
                    ->setFrom($form->get('email')->getData())
                    ->setTo($this->container->getParameter('mailer_send_to'))
                    ->setBody(
                        $this->renderView(
                            'VASiteBundle:Mail:contact.html.twig',
                            array(
                                'ip' => $request->getClientIp(),
                                'name' => $form->get('name')->getData(),
                                'message' => $form->get('message')->getData()
                            )
                        )
                    );

                $this->get('mailer')->send($message);

                $request->getSession()->getFlashBag()->add('success', 'Your email has been sent! Thanks!');

                return $this->redirect($this->generateUrl('contact'));
            }
        }

        return array(
            'form' => $form->createView()
        );
    }
}
