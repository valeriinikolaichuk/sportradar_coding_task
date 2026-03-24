<?php

namespace App\Service\SingleEvent;

use App\Repository\EventRepository;
use App\Service\DTO\EventDTO;
use App\Service\Events\EventPipeline\EventMapper;

class SingleEventService
{
    private EventRepository $repository;
    private EventMapper $mapper;

    public function __construct(
        EventRepository $repository, 
        EventMapper $mapper
    ){
        $this -> repository = $repository;
        $this -> mapper = $mapper;
    }

    /**
     * Returns a single EventDTO or null if not found
     */
    public function getEvent(int $id): ?EventDTO
    {
        $event = $this -> repository ->findOneEventWithRelations($id);

        if (!$event) {
            return null;
        }

        return $this -> mapper ->process([$event], [])[0];
    }
}