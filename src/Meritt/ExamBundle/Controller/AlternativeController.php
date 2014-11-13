<?php

namespace Meritt\ExamBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Meritt\ExamBundle\Entity\Alternative;
use Meritt\ExamBundle\Form\AlternativeType;

/**
 * Alternative controller.
 *
 */
class AlternativeController extends Controller
{

    /**
     * Lists all Alternative entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MerittExamBundle:Alternative')->findAll();

        return $this->render('MerittExamBundle:Alternative:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Alternative entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Alternative();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('alternative_show', array('id' => $entity->getId())));
        }

        return $this->render('MerittExamBundle:Alternative:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Alternative entity.
     *
     * @param Alternative $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Alternative $entity)
    {
        $form = $this->createForm(new AlternativeType(), $entity, array(
            'action' => $this->generateUrl('alternative_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Alternative entity.
     *
     */
    public function newAction()
    {
        $entity = new Alternative();
        $form   = $this->createCreateForm($entity);

        return $this->render('MerittExamBundle:Alternative:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Alternative entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MerittExamBundle:Alternative')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alternative entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MerittExamBundle:Alternative:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Alternative entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MerittExamBundle:Alternative')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alternative entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MerittExamBundle:Alternative:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Alternative entity.
    *
    * @param Alternative $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Alternative $entity)
    {
        $form = $this->createForm(new AlternativeType(), $entity, array(
            'action' => $this->generateUrl('alternative_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Alternative entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MerittExamBundle:Alternative')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alternative entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('alternative_edit', array('id' => $id)));
        }

        return $this->render('MerittExamBundle:Alternative:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Alternative entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MerittExamBundle:Alternative')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Alternative entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('alternative'));
    }

    /**
     * Creates a form to delete a Alternative entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('alternative_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
