<?php

namespace VA\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use VA\CoreBundle\Entity\Planets;
use VA\CoreBundle\Form\PlanetsType;

/**
 * Planets controller.
 *
 */
class PlanetsController extends Controller
{

    /**
     * Lists all Planets entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VACoreBundle:Planets')->findAll();

        return $this->render('VACoreBundle:Entities:index.html.twig', array(
            'entities' => $entities,
            'title' => 'Planets'
        ));
    }

    /**
     * Creates a new Planets entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Planets();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('planets_show', array('id' => $entity->getId())));
        }

        return $this->render('VACoreBundle:Entities:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'title' => 'Planets'
        ));
    }

    /**
     * Creates a form to create a Planets entity.
     *
     * @param Planets $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Planets $entity)
    {
        $form = $this->createForm(new PlanetsType(), $entity, array(
            'action' => $this->generateUrl('planets_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit',
            array('label' => 'Create', 'attr' => array('class' => 'btn btn-primary col-xs-12 col-sm-2')));

        return $form;
    }

    /**
     * Displays a form to create a new Planets entity.
     *
     */
    public function newAction()
    {
        $entity = new Planets();
        $form = $this->createCreateForm($entity);

        return $this->render('VACoreBundle:Entities:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'title' => 'Planets'
        ));
    }

    /**
     * Finds and displays a Planets entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VACoreBundle:Planets')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Planets entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VACoreBundle:Entities:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
            'title' => 'Planets'
        ));
    }

    /**
     * Displays a form to edit an existing Planets entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VACoreBundle:Planets')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Planets entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VACoreBundle:Entities:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'title' => 'Planets'
        ));
    }

    /**
     * Creates a form to edit a Planets entity.
     *
     * @param Planets $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Planets $entity)
    {
        $form = $this->createForm(new PlanetsType(), $entity, array(
            'action' => $this->generateUrl('planets_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit',
            array('label' => 'Update', 'attr' => array('class' => 'btn btn-primary col-xs-12 col-sm-2')));

        return $form;
    }

    /**
     * Edits an existing Planets entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VACoreBundle:Planets')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Planets entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('planets_edit', array('id' => $id)));
        }

        return $this->render('VACoreBundle:Entities:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'title' => 'Planets'
        ));
    }

    /**
     * Deletes a Planets entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VACoreBundle:Planets')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Planets entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('planets'));
    }

    /**
     * Creates a form to delete a Planets entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('planets_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit',
                array('label' => 'Delete', 'attr' => array('class' => 'btn btn-danger col-xs-12 col-sm-2')))
            ->getForm();
    }
}
