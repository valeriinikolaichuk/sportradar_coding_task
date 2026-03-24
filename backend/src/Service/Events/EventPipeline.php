<?php

namespace App\Service\Events;

use App\Service\Events\EventPipeline\EventPipelineInterface;

class EventPipeline
{
    /** @var iterable<EventPipelineInterface> */
    private iterable $steps;

    public function __construct(iterable $steps)
    {
        $this -> steps = $steps;
    }

    public function handle(array $params): array
    {
        $data = [];

        foreach ($this -> steps as $step) {
            if (!$step ->supports($params)) {
                continue;
            }

            $data = $step ->process($data, $params);
        }

        return $data;
    }
}