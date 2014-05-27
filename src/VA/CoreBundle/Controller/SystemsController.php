<?php

namespace VA\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use VA\CoreBundle\Entity\Systems;
use VA\CoreBundle\Form\SystemsType;

/**
 * Systems controller.
 *
 */
class SystemsController extends Controller
{

    /**
     * Lists all Systems entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VACoreBundle:Systems')->findAll();

        return $this->render('VACoreBundle:Entities:index.html.twig', array(
            'entities' => $entities,
            'title' => 'Systems'
        ));
    }

    /**
     * Creates a new Systems entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Systems();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('systems_show', array('id' => $entity->getId())));
        }

        return $this->render('VACoreBundle:Entities:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'title' => 'Systems'
        ));
    }

    /**
     * Creates a form to create a Systems entity.
     *
     * @param Systems $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Systems $entity)
    {
        $form = $this->createForm(new SystemsType(), $entity, array(
            'action' => $this->generateUrl('systems_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit',
            array('label' => 'Create', 'attr' => array('class' => 'btn btn-primary col-xs-12 col-sm-2')));

        return $form;
    }

    /**
     * Displays a form to create a new Systems entity.
     *
     */
    public function newAction()
    {
        $entity = new Systems();
        $form = $this->createCreateForm($entity);

        return $this->render('VACoreBundle:Entities:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'title' => 'Systems'
        ));
    }

    /**
     * Finds and displays a Systems entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VACoreBundle:Systems')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Systems entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VACoreBundle:Entities:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
            'title' => 'Systems'
        ));
    }

    /**
     * Displays a form to edit an existing Systems entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VACoreBundle:Systems')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Systems entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('VACoreBundle:Entities:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'title' => 'Systems'
        ));
    }

    /**
     * Creates a form to edit a Systems entity.
     *
     * @param Systems $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Systems $entity)
    {
        $form = $this->createForm(new SystemsType(), $entity, array(
            'action' => $this->generateUrl('systems_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit',
            array('label' => 'Update', 'attr' => array('class' => 'btn btn-primary col-xs-12 col-sm-2')));

        return $form;
    }

    /**
     * Edits an existing Systems entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VACoreBundle:Systems')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Systems entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('systems_edit', array('id' => $id)));
        }

        return $this->render('VACoreBundle:Entities:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'title' => 'Systems'
        ));
    }

    /**
     * Deletes a Systems entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VACoreBundle:Systems')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Systems entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('systems'));
    }

    /**
     * Creates a form to delete a Systems entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('systems_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit',
                array('label' => 'Delete', 'attr' => array('class' => 'btn btn-delete col-xs-12 col-sm-2')))
            ->getForm();
    }
}
