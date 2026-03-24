<?php

namespace App\Service\Events\EventPipeline;

class SortDescScenario implements EventPipelineInterface
{
    public function supports(array $params): bool
    {
        return ($params['sort'] ?? null) === 'desc';
    }

    public function process(array $events, array $params): array
    {
        usort($events, fn($a, $b) =>
            $b->getDateTime() <=> $a->getDateTime()
        );

        return $events;
    }
}