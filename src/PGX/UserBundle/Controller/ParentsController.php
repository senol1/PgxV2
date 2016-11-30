<?php

namespace PGX\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use PGX\UserBundle\Entity\Parents;
use PGX\UserBundle\Form\ParentsType;

/**
 * Parents controller.
 *
 */
class ParentsController extends Controller
{

    /**
     * Lists all Parents entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PGXUserBundle:Parents')->findAll();

        return $this->render('PGXUserBundle:Parents:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Parents entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Parents();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('eleve_parents_show', array('id' => $entity->getId())));
        }

        return $this->render('PGXUserBundle:Parents:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Parents entity.
     *
     * @param Parents $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Parents $entity)
    {
        $form = $this->createForm(new ParentsType(), $entity, array(
            'action' => $this->generateUrl('eleve_parents_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Parents entity.
     *
     */
    public function newAction()
    {
        $entity = new Parents();
        $form   = $this->createCreateForm($entity);

        return $this->render('PGXUserBundle:Parents:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Parents entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PGXUserBundle:Parents')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Parents entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PGXUserBundle:Parents:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Parents entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PGXUserBundle:Parents')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Parents entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PGXUserBundle:Parents:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Parents entity.
    *
    * @param Parents $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Parents $entity)
    {
        $form = $this->createForm(new ParentsType(), $entity, array(
            'action' => $this->generateUrl('eleve_parents_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Parents entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PGXUserBundle:Parents')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Parents entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('eleve_parents_edit', array('id' => $id)));
        }

        return $this->render('PGXUserBundle:Parents:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Parents entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PGXUserBundle:Parents')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Parents entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('eleve_parents'));
    }

    /**
     * Creates a form to delete a Parents entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eleve_parents_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
