<?php

namespace App\Service\Events\EventPipeline;

class SortByStageAsc implements EventPipelineInterface
{
    public function supports(array $params): bool
    {
        return ($params['sort'] ?? null) === 'stage_up';
    }

    public function process(array $events, array $params, \DateTimeImmutable $now): array
    {
        usort($events, fn($a, $b) =>
            $a->getStage()->getOrdering() <=> $b->getStage()->getOrdering()
        );

        return $events;
    }
}