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
    #[Route('/new_event', name: 'add_event', methods: ['POST'])]
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
            return $this ->json(['error' => 'Invalid JSON'], 400);
        }

        $errors = $validator ->validate($dto);

        if (count($errors) > 0) {
            $formattedErrors = [];

            foreach ($errors as $error) {
                $formattedErrors[] = [
                    'field' => $error ->getPropertyPath(),
                    'message' => $error ->getMessage()
                ];
            }

            return $this ->json([
                'errors' => $formattedErrors
            ], 400);
        }

        $service ->createEvent($dto);

        return $this->json([
            'success' => true,
            'reloadUrl' => $this->generateUrl('events_index')
        ], 201);
    }
}