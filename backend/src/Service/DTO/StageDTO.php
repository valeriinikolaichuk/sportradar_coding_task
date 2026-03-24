<?php

namespace App\Service\DTO;

class StageDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public int $ordering
    ) {}
}