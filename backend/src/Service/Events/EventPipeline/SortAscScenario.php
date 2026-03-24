<?php

namespace App\Service\Events\EventPipeline;

class SortAscScenario implements EventPipelineInterface
{
    public function supports(array $params): bool
    {
        return ($params['sort'] ?? null) === 'asc';
    }

    public function process(array $events, array $params): array
    {
        usort($events, fn($a, $b) =>
            $a->getDateTime() <=> $b->getDateTime()
        );

        return $events;
    }
}