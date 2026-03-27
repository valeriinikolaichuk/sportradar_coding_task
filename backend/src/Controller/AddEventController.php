<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use App\Service\AddEvent\CreateEventDTO;
use App\Service\AddEvent\AddEventService;

class AddEventController extends AbstractController
{
    #[Route('/create', name: 'add_event', methods: ['POST'])]
    public function create(
        Request $request,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        AddEventService $service
    ): JsonResponse {

        try {
            $dto = $serializer ->deserialize(
                $request ->getContent(),
                CreateEventDTO::class,
                'json'
            );
        } catch (\Exception $e) {
            return $this->json(['error' => 'Invalid JSON'], 400);
        }



//        $data = json_decode($request ->getContent(), true);
/*
        if (!$data) {
            return $this->json(['error' => 'Invalid request data'], 400);
        }
*/
        try {
            $eventDTO = $this -> service ->createEvent($data);
        } catch (\Exception $e) {
            return $this ->json(['error' => $e->getMessage()], 400);
        }

        return $this ->json(['data' => $eventDTO], 201);
    }
}