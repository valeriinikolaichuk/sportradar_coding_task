<?php

namespace App\Service\Events\EventPipeline;

use App\Repository\EventRepository;

class DefaultEventFilter implements EventPipelineInterface
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

    public function process(array $events, array $params, \DateTimeImmutable $now): array
    {
        $pastLimit = 5;
        $futureLimit = 10;

        $sport = $params['sport'] ?? null;
        $competition = $params['competition'] ?? null;

        $dateFrom = isset($params['dateFrom']) ? new \DateTimeImmutable($params['dateFrom']) : null;
        $dateTo = isset($params['dateTo']) ? new \DateTimeImmutable($params['dateTo']) : null;

        $past = $this ->repository ->findPast(
            $now, 
            $pastLimit, 
            $sport,
            $competition,
            $dateFrom,
            $dateTo
        );
        
        $future = $this ->repository ->findFuture(
            $now, 
            $futureLimit, 
            $sport,
            $competition,
            $dateFrom,
            $dateTo
        );

        return array_merge($past, $future);
    }
}