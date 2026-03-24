<?php

namespace App\Service\DTO;

class TeamDTO
{
    public function __construct(
        public string $name,
        public string $officialName,
        public string $slug,
        public string $abbreviation,
        public string $teamCountryCode,
        public ?int $stagePosition = null
    ) {}
}