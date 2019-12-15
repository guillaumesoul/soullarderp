<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(SerializerInterface $serializer)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find(1);
        $json = $serializer->serialize(
            $user,
            'json', ['groups' => 'user']
        );
        //return $this->render('base.html.twig');
        return new JsonResponse($json);
    }
}
