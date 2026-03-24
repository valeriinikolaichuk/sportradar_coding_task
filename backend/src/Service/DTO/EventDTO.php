<?php

namespace App\Service\DTO;

class EventDTO
{
    public function __construct(
        public int $season,
        public string $status,
        public string $timeVenueUTC,
        public string $dateVenue,
//        public string $stadium,
        public ?TeamDTO $homeTeam,
        public ?TeamDTO $awayTeam,
        public ?ResultDTO $result,  
        public ?StageDTO $stage,
//        public ?string $group,
        public ?string $originCompetitionId,
        public ?string $originCompetitionName,
    ) {}
}