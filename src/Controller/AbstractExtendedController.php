<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class AbstractExtendedController extends AbstractController
{
    /** @var SerializerInterface */
    protected $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function serialize($element, $group = 'user')
    {
        return $this->serializer->serialize(
            $element,
            'json', ['groups' => $group]
        );
    }

    public function jsonResponse($data, int $httpCode = 200, $headers = [], $json = true)
    {
        return new JsonResponse($data, 200, [], $json);
    }

}