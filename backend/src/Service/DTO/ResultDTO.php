<?php

namespace App\Service\DTO;

class ResultDTO
{
    public function __construct(
        public int $homeGoals,
        public int $awayGoals,
        public ?string $winner,
        public ?string $message,
        public array $goals = [],
        public array $yellowCards = [],
        public array $secondYellowCards = [],
        public array $directRedCards = [],
        public ?array $scoreByPeriods = null
    ) {}
}