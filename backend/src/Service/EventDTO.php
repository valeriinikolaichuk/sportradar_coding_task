<?php

namespace App\Service;

class EventDTO
{
    public function __construct(
        public string $date,
        public string $time,
        public string $competition,
        public ?string $homeTeam,
        public ?string $awayTeam,
        public ?string $result
    ) {}
}