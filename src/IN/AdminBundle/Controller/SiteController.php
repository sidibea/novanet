<?php

namespace IN\AdminBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use IN\CoreBundle\Entity\Site;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Site controller.
 *
 */
class SiteController extends Controller
{

    public function indexAction( Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT s FROM INCoreBundle:Site s ";
        $query = $em->createQuery($dql);


        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        // parameters to template
        return $this->render('INAdminBundle:site:index.html.twig', ['pagination' => $pagination]);
    }

    /**
     * Creates a new site entity.
     *
     */
    public function newAction(Request $request)
    {
        $site = new Site();
        $form = $this->createForm('IN\CoreBundle\Form\SiteType', $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($site);
            $em->flush();

            return $this->redirectToRoute('site_show', array('id' => $site->getId()));
        }

        return $this->render('site/new.html.twig', array(
            'site' => $site,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a site entity.
     *
     */
    public function showAction(Site $site)
    {
        $deleteForm = $this->createDeleteForm($site);

        return $this->render('INAdminBundle:site:show.html.twig', array(
            'site' => $site,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a site entity.
     *
     */
    public function printAction(Site $site)
    {
        $deleteForm = $this->createDeleteForm($site);

        return $this->render('INAdminBundle:site:print.html.twig', array(
            'site' => $site,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing site entity.
     *
     */
    public function editAction(Request $request, Site $site)
    {
        $deleteForm = $this->createDeleteForm($site);
        $editForm = $this->createForm('IN\CoreBundle\Form\SiteType', $site);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('site_edit', array('id' => $site->getId()));
        }

        return $this->render('site/edit.html.twig', array(
            'site' => $site,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a site entity.
     *
     */
    public function deleteAction(Request $request, Site $site)
    {
        $form = $this->createDeleteForm($site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($site);
            $em->flush();
        }

        return $this->redirectToRoute('site_index');
    }

    /**
     * Creates a form to delete a site entity.
     *
     * @param Site $site The site entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Site $site)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('site_delete', array('id' => $site->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
