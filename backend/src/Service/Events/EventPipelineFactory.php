<?php

namespace App\Service\Events;

use App\Service\Events\EventPipeline\EventProvider;
use App\Service\Events\EventPipeline\DefaultEventFilter;
use App\Service\Events\EventPipeline\SortAscScenario;
use App\Service\Events\EventPipeline\SortDescScenario;
use App\Service\Events\EventPipeline\EventMapper;

class EventPipelineFactory
{
    public function __construct(
        private EventProvider $provider,
        private DefaultEventFilter $filter,
        private SortAscScenario $sortAsc,
        private SortDescScenario $sortDesc,
        private EventMapper $mapper
    ) {}

    public function create(): EventPipeline
    {
        return new EventPipeline([
            $this ->provider,
            $this ->filter,
            $this ->sortAsc,
            $this ->sortDesc,
            $this ->mapper,
        ]);
    }
}