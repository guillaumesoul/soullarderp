<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

//class HomeController extends AbstractController
class HomeController extends AbstractExtendedController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find(1);
        return $this->jsonResponse($this->serialize($user));
    }
}
