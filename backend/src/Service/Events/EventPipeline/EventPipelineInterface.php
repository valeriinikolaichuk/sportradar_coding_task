<?php

namespace App\Service\Events\EventPipeline;

interface EventPipelineInterface
{
    public function supports(array $params): bool;

    public function process(array $data, array $params, \DateTimeImmutable $now): array;
}