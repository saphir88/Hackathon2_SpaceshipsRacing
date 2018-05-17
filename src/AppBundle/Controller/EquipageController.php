<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Equipage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Equipage controller.
 *
 * @Route("equipage")
 */
class EquipageController extends Controller
{
    /**
     * Lists all equipage entities.
     *
     * @Route("/", name="equipage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $equipages = $em->getRepository('AppBundle:Equipage')->findAll();
        return $this->render('equipage/admin.html.twig', array(
            'equipages' => $equipages,
        ));
    }

    /**
     * Creates a new equipage entity.
     *
     * @Route("/new", name="equipage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $equipage = new Equipage();
        $form = $this->createForm('AppBundle\Form\EquipageType', $equipage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipage);
            $em->flush();

            return $this->redirectToRoute('equipage_show', array('id' => $equipage->getId()));
        }

        return $this->render('equipage/new.html.twig', array(
            'equipage' => $equipage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a equipage entity.
     *
     * @Route("/{id}", name="equipage_show")
     * @Method("GET")
     */
    public function showAction(Equipage $equipage)
    {
        $deleteForm = $this->createDeleteForm($equipage);

        return $this->render('equipage/show.html.twig', array(
            'equipage' => $equipage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing equipage entity.
     *
     * @Route("/{id}/edit", name="equipage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Equipage $equipage)
    {
        $deleteForm = $this->createDeleteForm($equipage);
        $editForm = $this->createForm('AppBundle\Form\EquipageType', $equipage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('equipage_edit', array('id' => $equipage->getId()));
        }

        return $this->render('equipage/edit.html.twig', array(
            'equipage' => $equipage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a equipage entity.
     *
     * @Route("/{id}", name="equipage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Equipage $equipage)
    {
        $form = $this->createDeleteForm($equipage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($equipage);
            $em->flush();
        }

        return $this->redirectToRoute('equipage_index');
    }

    /**
     * Creates a form to delete a equipage entity.
     *
     * @param Equipage $equipage The equipage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Equipage $equipage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('equipage_delete', array('id' => $equipage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
