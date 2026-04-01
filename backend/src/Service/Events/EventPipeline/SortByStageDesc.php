<?php

namespace App\Service\Events\EventPipeline;

class SortByStageDesc implements EventPipelineInterface
{
    public function supports(array $params): bool
    {
        return ($params['sort'] ?? null) === 'stage_down';
    }

    public function process(array $events, array $params, \DateTimeImmutable $now): array
    {
        usort($events, fn($a, $b) =>
            $b->getStage()->getOrdering() <=> $a->getStage()->getOrdering()
        );

        return $events;
    }
}