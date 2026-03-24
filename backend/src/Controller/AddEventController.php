<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\AddEvent\AddEventService;

#[Route('/new_event')]
class AddEventController extends AbstractController
{
    private AddEventService $service;

    public function __construct(AddEventService $service)
    {
        $this -> service = $service;
    }

    #[Route('/create', name: 'add_event', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request ->getContent(), true);

        if (!$data) {
            return $this->json(['error' => 'Invalid request data'], 400);
        }

        try {
            $eventDTO = $this -> service ->createEvent($data);
        } catch (\Exception $e) {
            return $this ->json(['error' => $e->getMessage()], 400);
        }

        return $this ->json(['data' => $eventDTO], 201);
    }
}