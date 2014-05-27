<?php

namespace VA\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use VA\CoreBundle\Entity\Satellites;
use VA\CoreBundle\Form\SatellitesType;

/**
 * Satellites controller.
 *
 */
class SatellitesController extends Controller
{

    /**
     * Lists all Satellites entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VACoreBundle:Satellites')->findAll();

        return $this->render('VACoreBundle:Entities:index.html.twig', array(
            'entities' => $entities,
            'title' => 'Satellites'
        ));
    }

    /**
     * Creates a new Satellites entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Satellites();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('satellites_show', array('id' => $entity->getId())));
        }

        return $this->render('VACoreBundle:Entities:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'title' => 'Satellites'
        ));
    }

    /**
     * Creates a form to create a Satellites entity.
     *
     * @param Satellites $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Satellites $entity)
    {
        $form = $this->createForm(new SatellitesType(), $entity, array(
            'action' => $this->generateUrl('satellites_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit',
            array('label' => 'Create', 'attr' => array('class' => 'btn btn-primary col-xs-12 col-sm-2')));

        return $form;
    }

    /**
     * Displays a form to create a new Satellites entity.
     *
     */
    public function newAction()
    {
        $entity = new Satellites();
        $form = $this->createCreateForm($entity);

        return $this->render('VACoreBundle:Entities:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'title' => 'Satellites'
        ));
    }

    /**
     * Finds and displays a Satellites entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VACoreBundle:Satellites')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Satellites entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VACoreBundle:Entities:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
            'title' => 'Satellites'
        ));
    }

    /**
     * Displays a form to edit an existing Satellites entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VACoreBundle:Satellites')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Satellites entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VACoreBundle:Entities:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'title' => 'Satellites'
        ));
    }

    /**
     * Creates a form to edit a Satellites entity.
     *
     * @param Satellites $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Satellites $entity)
    {
        $form = $this->createForm(new SatellitesType(), $entity, array(
            'action' => $this->generateUrl('satellites_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit',
            array('label' => 'Update', 'attr' => array('class' => 'btn btn-primary col-xs-12 col-sm-2')));

        return $form;
    }

    /**
     * Edits an existing Satellites entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VACoreBundle:Satellites')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Satellites entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('satellites_edit', array('id' => $id)));
        }

        return $this->render('VACoreBundle:Entities:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'title' => 'Satellites'
        ));
    }

    /**
     * Deletes a Satellites entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VACoreBundle:Satellites')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Satellites entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('satellites'));
    }

    /**
     * Creates a form to delete a Satellites entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('satellites_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit',
                array('label' => 'Delete', 'attr' => array('class' => 'btn btn-danger col-xs-12 col-sm-2')))
            ->getForm();
    }
}
