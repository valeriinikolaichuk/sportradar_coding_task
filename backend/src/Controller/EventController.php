<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\Events\EventPipeline;

class EventController extends AbstractController
{
    #[Route('/events', name: 'events_index', methods: ['GET', 'POST'])]
    public function index(
        Request $request,
        EventPipeline $pipeline
        ): JsonResponse {

        $params = json_decode($request -> getContent(), true);
        $events = $pipeline ->handle($params);

        return $this->render(
            'event/_table.html.twig', 
            ['events' => $events] ?? []
        );
    }
}