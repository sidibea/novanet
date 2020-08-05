<?php

namespace IN\AdminBundle\Controller;

use IN\CoreBundle\Entity\Ticket;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Unirest;
/**
 * Ticket controller.
 *
 */
class TicketController extends Controller
{
    /**
     * Lists all ticket entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $dql   = "SELECT t FROM INCoreBundle:Ticket t ";
        $query = $em->createQuery($dql);


        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('INAdminBundle:ticket:index.html.twig', array(
            'pagination' => $pagination,

        ));
    }

    /**
     * Creates a new ticket entity.
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
      /*  $transport = (new \Swift_SmtpTransport('mail.malinova.tech', 465))
            ->setUsername('robot@malinova.tech')
            ->setPassword('Malinova@2020')
        ;
        $mailer = new \Swift_Mailer($transport);*/


        $ticket = new Ticket();
        $form = $this->createForm('IN\CoreBundle\Form\TicketType', $ticket);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ticket->setCreatedBy($this->getUser());
            $ticket->setCreatedAt(new \DateTime());
            $ticket->setUpdatedAt(new \DateTime());
            $em->persist($ticket);
            $em->flush();

       /*    $message = (new \Swift_Message('MALINOVA NOUVELLE NOTIFICATION '.$ticket->getType().''))
                ->setFrom('robot@malinova.tech')
                ->setTo($ticket->getSendTo()->getEmail())
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                        'INAdminBundle:Emails:notification.html.twig',
                        ['ticket' => $ticket]
                    ),
                    'text/html'
                )


            ;

            $mailer->send($message);*/

            $ticket->setCodeTicket('TA'.date('d').date('m').date('Y').$ticket->getId());
            $em->flush();

           // $response = Unirest\Request::post("https://api.smsbox.pro/api.php?apikey=c5ee39d101b5c601d9caab170c4ff-8d0ca44c-8b2f-4489-b263-c8920fb7d80c&msg=Message&dest=0022373033939&mode=Standard&strategy=4");
            $client = new \GuzzleHttp\Client();
            $response = $client->get('https://api.smsbox.pro/api.php?apikey=c5ee39d101b5c601d9caab170c4ff-8d0ca44c-8b2f-4489-b263-c8920fb7d80c&msg=Message&dest=+22373033939&mode=Standard&strategy=4');
            //dump( $response); exit;
            return $this->redirectToRoute('ticket_index');
        }

        return $this->render('INAdminBundle:ticket:new.html.twig', array(
            'ticket' => $ticket,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ticket entity.
     *
     */
    public function showAction(Ticket $ticket)
    {
        $deleteForm = $this->createDeleteForm($ticket);

        return $this->render('ticket/show.html.twig', array(
            'ticket' => $ticket,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ticket entity.
     *
     */
    public function editAction(Request $request, Ticket $ticket)
    {
        $deleteForm = $this->createDeleteForm($ticket);
        $editForm = $this->createForm('IN\CoreBundle\Form\TicketType', $ticket);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ticket_edit', array('id' => $ticket->getId()));
        }

        return $this->render('ticket/edit.html.twig', array(
            'ticket' => $ticket,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ticket entity.
     *
     */
    public function deleteAction(Request $request, Ticket $ticket)
    {
        $form = $this->createDeleteForm($ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ticket);
            $em->flush();
        }

        return $this->redirectToRoute('ticket_index');
    }

    /**
     * Creates a form to delete a ticket entity.
     *
     * @param Ticket $ticket The ticket entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ticket $ticket)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ticket_delete', array('id' => $ticket->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
