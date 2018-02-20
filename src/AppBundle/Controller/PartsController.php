<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Parts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Part controller.
 *
 * @Route("parts")
 */
class PartsController extends Controller
{
    /**
     * Lists all part entities.
     *
     * @Route("/", name="parts_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $parts = $em->getRepository('AppBundle:Parts')->findAll();

        return $this->render('parts/index.html.twig', array(
            'parts' => $parts,
        ));
    }

    /**
     * Creates a new part entity.
     *
     * @Route("/new", name="parts_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $part = new Parts();
        $form = $this->createForm('AppBundle\Form\PartsType', $part);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($part);
            $em->flush();

            return $this->redirectToRoute('parts_show', array('id' => $part->getId()));
        }

        return $this->render('parts/new.html.twig', array(
            'part' => $part,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a part entity.
     *
     * @Route("/{id}", name="parts_show")
     * @Method("GET")
     */
    public function showAction(Parts $part)
    {
        $deleteForm = $this->createDeleteForm($part);

        return $this->render('parts/show.html.twig', array(
            'part' => $part,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing part entity.
     *
     * @Route("/{id}/edit", name="parts_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Parts $part)
    {
        $deleteForm = $this->createDeleteForm($part);
        $editForm = $this->createForm('AppBundle\Form\PartsType', $part);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parts_edit', array('id' => $part->getId()));
        }

        return $this->render('parts/edit.html.twig', array(
            'part' => $part,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a part entity.
     *
     * @Route("/admin/{id}", name="parts_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Parts $part)
    {
        $form = $this->createDeleteForm($part);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($part);
            $em->flush();
        }

        return $this->redirectToRoute('parts_index');
    }

    /**
     * Creates a form to delete a part entity.
     *
     * @param Parts $part The part entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Parts $part)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parts_delete', array('id' => $part->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
