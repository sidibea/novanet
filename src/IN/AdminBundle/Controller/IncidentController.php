<?php

namespace IN\AdminBundle\Controller;

use IN\CoreBundle\Entity\Incident;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Incident controller.
 *
 */
class IncidentController extends Controller
{
    /**
     * Lists all incident entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //$incidents = $em->getRepository('INCoreBundle:Incident')->findAll();
        //dump(date('d M Y')); exit;
        $dql   = "SELECT i FROM INCoreBundle:Incident i ";
        $query = $em->createQuery($dql);


        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('INAdminBundle:incident:index.html.twig', array(
            'pagination' => $pagination

        ));
    }

    /**
     * Creates a new incident entity.
     *
     */
    public function newAction(Request $request)
    {
        $incident = new Incident();
        $form = $this->createForm('IN\CoreBundle\Form\IncidentType', $incident);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($incident);
            $em->flush();

            return $this->redirectToRoute('incident_show', array('id' => $incident->getId()));
        }

        return $this->render('incident/new.html.twig', array(
            'incident' => $incident,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a incident entity.
     *
     */
    public function showAction(Incident $incident)
    {
        $deleteForm = $this->createDeleteForm($incident);

        return $this->render('INAdminBundle:incident:show.html.twig', array(
            'incident' => $incident,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing incident entity.
     *
     */
    public function editAction(Request $request, Incident $incident)
    {
        $deleteForm = $this->createDeleteForm($incident);
        $editForm = $this->createForm('IN\CoreBundle\Form\IncidentType', $incident);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('incident_edit', array('id' => $incident->getId()));
        }

        return $this->render('incident/edit.html.twig', array(
            'incident' => $incident,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a incident entity.
     *
     */
    public function deleteAction(Request $request, Incident $incident)
    {
        $form = $this->createDeleteForm($incident);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($incident);
            $em->flush();
        }

        return $this->redirectToRoute('incident_index');
    }

    /**
     * Creates a form to delete a incident entity.
     *
     * @param Incident $incident The incident entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Incident $incident)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('incident_delete', array('id' => $incident->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
