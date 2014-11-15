<?php
namespace Meritt\ExamBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Meritt\ExamBundle\Entity\Evaluation;
use Meritt\ExamBundle\Form\EvaluationType;

/**
 * Class reponsible on Evaluation actions
 */
class EvaluationController extends Controller
{

    /**
     * Lists all Evaluation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MerittExamBundle:Evaluation')
            ->findAll();

        return $this->render(
            'MerittExamBundle:Evaluation:index.html.twig',
            [
                'entities' => $entities,
            ]
        );
    }
    /**
     * Create
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request Request
     * @return type
     * 
     */
    public function createAction(Request $request)
    {
        $entity = new Evaluation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect(
                $this->generateUrl(
                    'evaluation_show',
                    ['id' => $entity->getId()]
                )
            );
        }

        return $this->render(
            'MerittExamBundle:Evaluation:new.html.twig',
            [
                'entity' => $entity,
                'form'   => $form->createView(),
            ]
        );
    }

    /**
     * Creates a form to create a Evaluation entity.
     *
     * @param Evaluation $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Evaluation $entity)
    {
        $form = $this->createForm(new EvaluationType(), $entity, array(
            'action' => $this->generateUrl('evaluation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * 
     * @return type
     */
    public function newAction()
    {
        $entity = new Evaluation();
        $form   = $this->createCreateForm($entity);

        return $this->render('MerittExamBundle:Evaluation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * 
     * @param type $id
     * @return type
     * @throws type
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MerittExamBundle:Evaluation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Evaluation entity.');
        }

        $deleteForm = $this->_createDeleteForm($id);

        return $this->render('MerittExamBundle:Evaluation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * 
     * @param type $id
     * @return type
     * @throws type
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MerittExamBundle:Evaluation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Evaluation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MerittExamBundle:Evaluation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Evaluation entity.
    *
    * @param Evaluation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Evaluation $entity)
    {
        $form = $this->createForm(new EvaluationType(), $entity, array(
            'action' => $this->generateUrl('evaluation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    
   /**
    * 
    * @param  Request $request resquest 
    * @param  int    $id      evaluation to be updated 
    * @return type 
    * @throws type 
    */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MerittExamBundle:Evaluation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Evaluation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('evaluation_edit', array('id' => $id)));
        }

        return $this->render(
            'MerittExamBundle:Evaluation:edit.html.twig',
            [
                'entity'      => $entity,
                'edit_form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ]
        );
    }
    /**
     * Delete
     * 
     * @param Request $request Request 
     * @param int     $id      evaluation to be deleted 
     * 
     * @return redirect
     * @throws CreateNotFoundExpection
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MerittExamBundle:Evaluation')->find($id);

            if (!$entity) {
                throw $this
                    ->createNotFoundException(
                        'Unable to find Evaluation entity.'
                    );
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('evaluation'));
    }

    /**
     * Creates a form to delete a Evaluation entity by id.
     *
     * @param mixed $id The entity id
     * 
     * @return \Symfony\Component\Form\Form The form
     * 
     */
    private function _createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evaluation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
    
    /**
     * Filtering Students and theirs points
     * 
     * @param Request $filter filter request
     * 
     * @return type
     * 
     */
    public function listAction(Request $filter)
    {
        
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('MerittExamBundle:Evaluation')
            ->findSorted($filter);

        return $this->render(
            'MerittExamBundle:Evaluation:list.html.twig',
            ['entities' => $entities ]
        );
    }
}
