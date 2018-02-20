<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cars;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Car controller.
 *
 * @Route("cars")
 */
class CarsController extends Controller
{
    /**
     * Lists all car entities.
     *
     * @Route("/", name="cars_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cars = $em->getRepository('AppBundle:Cars')->findAll();

        return $this->render('cars/index.html.twig', array(
            'cars' => $cars,
        ));
    }

    /**
     * Creates a new car entity.
     *
     * @Route("/new", name="cars_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $car = new Cars();
        $form = $this->createForm('AppBundle\Form\CarsType', $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($car);
            $em->flush();

            return $this->redirectToRoute('cars_show', array('id' => $car->getId()));
        }

        return $this->render('cars/new.html.twig', array(
            'car' => $car,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a car entity.
     *
     * @Route("/{id}", name="cars_show")
     * @Method("GET")
     */
    public function showAction(Cars $car)
    {
        $deleteForm = $this->createDeleteForm($car);

        return $this->render('cars/show.html.twig', array(
            'car' => $car,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing car entity.
     *
     * @Route("/{id}/edit", name="cars_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cars $car)
    {
        $deleteForm = $this->createDeleteForm($car);
        $editForm = $this->createForm('AppBundle\Form\CarsType', $car);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cars_edit', array('id' => $car->getId()));
        }

        return $this->render('cars/edit.html.twig', array(
            'car' => $car,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a car entity.
     *
     * @Route("/admin/{id}", name="cars_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cars $car)
    {
        $form = $this->createDeleteForm($car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($car);
            $em->flush();
        }

        return $this->redirectToRoute('cars_index');
    }

    /**
     * Creates a form to delete a car entity.
     *
     * @param Cars $car The car entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cars $car)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cars_delete', array('id' => $car->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
