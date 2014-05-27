<?php

namespace VA\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use VA\CoreBundle\Entity\Stars;
use VA\CoreBundle\Form\StarsType;

/**
 * Stars controller.
 *
 */
class StarsController extends Controller
{

    /**
     * Lists all Stars entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VACoreBundle:Stars')->findAll();

        return $this->render('VACoreBundle:Entities:index.html.twig', array(
            'entities' => $entities,
            'title' => 'Stars'
        ));
    }

    /**
     * Creates a new Stars entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Stars();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('stars_show', array('id' => $entity->getId())));
        }

        return $this->render('VACoreBundle:Entities:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'title' => 'Stars'
        ));
    }

    /**
     * Creates a form to create a Stars entity.
     *
     * @param Stars $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Stars $entity)
    {
        $form = $this->createForm(new StarsType(), $entity, array(
            'action' => $this->generateUrl('stars_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit',
            array('label' => 'Create', 'attr' => array('class' => 'btn btn-primary col-xs-12 col-sm-2')));

        return $form;
    }

    /**
     * Displays a form to create a new Stars entity.
     *
     */
    public function newAction()
    {
        $entity = new Stars();
        $form = $this->createCreateForm($entity);

        return $this->render('VACoreBundle:Entities:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'title' => 'Stars'
        ));
    }

    /**
     * Finds and displays a Stars entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VACoreBundle:Stars')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Stars entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VACoreBundle:Entities:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
            'title' => 'Stars'
        ));
    }

    /**
     * Displays a form to edit an existing Stars entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VACoreBundle:Stars')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Stars entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VACoreBundle:Entities:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'title' => 'Stars'
        ));
    }

    /**
     * Creates a form to edit a Stars entity.
     *
     * @param Stars $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Stars $entity)
    {
        $form = $this->createForm(new StarsType(), $entity, array(
            'action' => $this->generateUrl('stars_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit',
            array('label' => 'Update', 'attr' => array('class' => 'btn btn-primary col-xs-12 col-sm-2')));

        return $form;
    }

    /**
     * Edits an existing Stars entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VACoreBundle:Stars')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Stars entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('stars_edit', array('id' => $id)));
        }

        return $this->render('VACoreBundle:Entities:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'title' => 'Stars'
        ));
    }

    /**
     * Deletes a Stars entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VACoreBundle:Stars')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Stars entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('stars'));
    }

    /**
     * Creates a form to delete a Stars entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stars_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit',
                array('label' => 'Delete', 'attr' => array('class' => 'btn btn-delete col-xs-12 col-sm-2')))
            ->getForm();
    }
}
