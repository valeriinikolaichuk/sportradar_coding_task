<?php

namespace App\Service\Events\EventPipeline;

class DefaultEventFilter implements EventPipelineInterface
{
    public function supports(array $params): bool
    {
        return true;
    }

    public function process(array $events, array $params): array
    {
        $now = new \DateTimeImmutable('2024-01-03 04:00:00');

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

        return array_merge($past, $future);
    }
}