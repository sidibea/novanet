<?php


namespace IN\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SiteAjaxController extends Controller
{
    /**
     * Lists all site entities.
     *
     */
    public function listAction()
    {
        $encoders = [ new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $em = $this->getDoctrine()->getManager();

        $list = $em->getRepository('INCoreBundle:Site')->findAll();




        return  $this->json([
            'data' => $serializer->serialize($list, 'json'),
            'status' => "success"
        ]);

    }

}