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
//        $now = new \DateTimeImmutable('2024-01-03 06:00:00');

        $pastLimit = 5;
        $futureLimit = 10;

        $past = $this ->repository ->findPast($now, $pastLimit);
        $future = $this ->repository ->findFuture($now, $futureLimit);

/*
        $past = array_filter($events, fn($e) =>
            $e->getDateTime() < $now
        );

        $future = array_filter($events, fn($e) =>
            $e->getDateTime() >= $now
        );

        // past DESC
        usort($past, fn($a, $b) =>
            $b->getDateTime() <=> $a->getDateTime()
        );

        // future ASC
        usort($future, fn($a, $b) =>
            $a->getDateTime() <=> $b->getDateTime()
        );

        $past = array_slice($past, 0, 5);
        $future = array_slice($future, 0, 10);
*/
        return array_merge($past, $future);
    }
}