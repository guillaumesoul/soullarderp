<?php

namespace App\Controller;

use App\Entity\Jeuxdelavie\Tache;
use App\Form\Jeuxdelavie\TacheType;
use phpDocumentor\Reflection\DocBlock\Serializer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class JeuxDeLaVieController extends AbstractExtendedController
{
    /**
     * @Route("/jeuxdelavie", name="jeux_de_la_vie")
     */
    public function index()
    {
        $tache = new Tache();
        $tacheForm = $this->createForm(TacheType::class,$tache);
        $formView = $tacheForm->createView();
        $rendered = $this->renderView('jeuxdelavie/form.html.twig',
            ['form' => $formView]
        );
        $all = $tacheForm->all();
        $type = gettype($rendered);


        $normalizers = [new ObjectNormalizer()];
        $encoders = [new JsonEncoder()];
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);
        $normalized = $serializer->serialize($tacheForm, 'json');
        return $this->jsonResponse($rendered);
    }
}
