<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\SingleEvent\SingleEventService;

#[Route('/event')]
class SingleEventController extends AbstractController
{
    private SingleEventService $service;

    public function __construct(SingleEventService $service)
    {
        $this -> service = $service;
    }

    #[Route('/{id}', name: 'single_event_show', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $eventDTO = $this -> service ->getEvent($id);

        if (!$eventDTO) {
            return $this ->json(['error' => 'Event not found'], 404);
        }

        return $this ->json(['data' => $eventDTO]);
    }
}