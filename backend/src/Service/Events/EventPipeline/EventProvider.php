<?php

namespace App\Service\Events\EventPipeline;

use App\Repository\EventRepository;

class EventProvider implements EventPipelineInterface
{
    private EventRepository $repository;

    public function __construct(EventRepository $repository)
    {
        $this -> repository = $repository;
    }

    public function supports(array $params): bool
    {
        return true;
    }

    public function process(array $data, array $params): array
    {
        return $this -> repository ->findAllEvents();
    }
}