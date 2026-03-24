<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\Events\EventPipelineFactory;

class EventController extends AbstractController
{
    #[Route('/events', name: 'events_index', methods: ['GET', 'POST'])]
    public function index(
        Request $request,
        EventPipelineFactory $pipelineFactory
        ): Response {

        $params = json_decode($request -> getContent(), true) ?: $request -> query->all();

        $pipeline = $pipelineFactory ->create();

        $events = $pipeline ->handle($params);

        return $this->render(
            'events/_table.html.twig', [
                'events' => $events
            ]
        );
    }
}