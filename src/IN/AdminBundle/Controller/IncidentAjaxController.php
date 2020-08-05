<?php


namespace IN\AdminBundle\Controller;


use IN\AdminBundle\Command\Imap;
use IN\CoreBundle\Entity\Incident;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IncidentAjaxController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $email = new Imap();
        $connect = $email->connect(
            '{mail.malinova.tech:143/notls}INBOX', //host
            'sekou.sidibe@malinova.tech', //username
            'Malinova@2020' //password
        );

        $serializer = $this->get('jms_serializer');
        if($connect){
            if(isset($_POST['inbox'])){
                // inbox array
                $inbox = $email->getMessages('html');
                $cont = [];
                $tt = "";
               //dump($inbox); exit;

                foreach($inbox['data'] as $m){
                //   dump($m); exit;
                    $incident = new Incident();

                   // $cont[] = $m['message'];

                   preg_match_all('/<tr class="ue-table-interlace-color-single firstRow"><td width="272" valign="top" style="word-break: break-all;"><strong><span style="text-decoration: none;"><span style="text-decoration: none; background-color: rgb\(255, 255, 0\);">Ticket Create by FO Engineer<\/span><\/span><\/strong><\/td><td width="272" valign="top" style="word-break: break-all;">(.+?)<\/td><\/tr>/s', $m['message'], $match);
                  $incident->setCreatedBy($match[1][0]);
                 //  dump($match); exit;
                   preg_match('/T{2}-[0-9]{8}-[0-9]{8}/s', $m['message'], $match);
                  $incident->setTicketCode($match[0]);
                  preg_match_all('/<tr class="ue-table-interlace-color-double"><td width="272" valign="top" style="word-break: break-all;"><strong><span style="text-decoration: none;"><span style="text-decoration: none; background-color: rgb\(255, 255, 0\);">Site Name<\/span><\/span><\/strong><\/td><td width="272" valign="top" style="word-break: break-all;"><span style="background-color: rgb\(255, 255, 255\);">(.+?)<\/span><\/td><\/tr>/s', $m['message'], $match);
                  $site_no = explode(",", $match[1][0]);
                 // dump(); exit;

                  $site = $em->getRepository('INCoreBundle:Site')->find($site_no[0]);
                  $incident->setSite($site);
                  $incident->setSiteCanonical($site_no[0]);
                  preg_match_all('/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/m', $m['message'], $match);
                    //dump(\DateTime::createFromFormat('Y-m-d h:i:s', $match[0][0])); exit;
                  $incident->setOccuredAt(new \DateTime($match[0][0]));
                  $incident->setTicketCreatedAt(new \DateTime($match[0][1]));
                  preg_match_all('/<td width="272" valign="top" style="word-break: break-all;"><span style="background-color: rgb\(255, 255, 255\);">(\d)<\/span><\/td>/s', $m['message'], $match);
                  $incident->setPriority($match[1][0]);
                //  preg_match_all('/<span style="background-color: rgb\(255, 0, 0\);">Impacts<\/span><\/span><\/strong><\/td><td width="272" valign="top" style="word-break: break-all;"><span style="background-color: rgb\(255, 255, 255\);">(.+?)<\/span><\/td><\/tr>/m', $m['message'], $match);
               //    dump($match); exit;

                //    $incident->setImpacts($match[1][0]);
                  preg_match_all('/<tr class="ue-table-interlace-color-double"><td width="272" valign="top" style="word-break: break-all;"><strong><span style="text-decoration: none;"><span style="text-decoration: none; background-color: rgb\(255, 255, 0\);">Comment<\/span><\/span><\/strong><\/td><td width="272" valign="top" style="word-break: break-all;"><span style="background-color: rgb\(255, 255, 255\);">(.+?)<\/span><\/td><\/tr>/s', $m['message'], $match);
                  $incident->setComment($match[1][0]);
                  preg_match_all('/<tr class="ue-table-interlace-color-single"><td width="272" valign="top" style="word-break: break-all;"><strong><span style="text-decoration: none;"><span style="text-decoration: none; background-color: rgb\(255, 255, 0\);">Description<\/span><\/span><\/strong><\/td><td width="272" valign="top" style="word-break: break-all;"><span style="background-color: rgb\(255, 255, 255\);">(.+?)<\/span><\/td><\/tr>/s', $m['message'], $match);
                  $incident->setDescription($match[1][0]);
                  $incident->setIsClosed(false);
                  $em->persist($incident);
                  $em->flush();
                    //dump($match); exit;

                   $status = imap_setflag_full($email->getImapStream(), $m['uid'], "\\Seen \\Flagged");


                }

                imap_close($email->getImapStream());

                $cont = [
                    'status' => 'success',
                    'ss' => $status
                ];


                $data = $serializer->serialize($cont, 'json');

                $response = new Response($data);
                $response->headers->set('Content-Type', 'application/json');

                return $response;


            }else if(!empty($_POST['uid']) && !empty($_POST['part']) && !empty($_POST['file']) && !empty($_POST['encoding'])){
                // attachments
                $inbox = $email->getFiles($_POST);
                $data = $serializer->serialize($inbox, 'json');
                $response = new Response($data);
                $response->headers->set('Content-Type', 'application/json');
            }else {
                $data = $serializer->serialize(array("status" => "error", "message" => "Not connect."), 'json');
                $response = new Response($data);
                $response->headers->set('Content-Type', 'application/json');
            }
        }else{
            $data = $serializer->serialize(array("status" => "error", "message" => "Not connect."), 'json');
            $response = new Response($data);
            $response->headers->set('Content-Type', 'application/json');

        }


    }

}