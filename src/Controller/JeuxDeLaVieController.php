<?php

namespace App\Controller;

use App\Entity\Jeuxdelavie\Tache;
use App\Form\Jeuxdelavie\TacheType;
use Symfony\Component\Routing\Annotation\Route;

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
        $type = gettype($rendered);
        return $this->jsonResponse($rendered);
    }
}
