<?php

namespace App\Service\AddEvent;

use Symfony\Component\Validator\Constraints as Assert;

class CreateEventDTO
{
    #[Assert\NotBlank]
    #[Assert\Type('integer')]
    public ?int $homeTeamId = null;

    #[Assert\NotBlank]
    #[Assert\Type('integer')]
    public ?int $awayTeamId = null;

    #[Assert\NotBlank]
    #[Assert\Type('integer')]
    public ?int $competitionId = null;

    #[Assert\Type('integer')]
    public ?int $stageId = null;

    #[Assert\NotBlank]
    #[Assert\Date]
    public ?string $date = null;

    #[Assert\NotBlank]
    #[Assert\Time]
    public ?string $time = null;

    #[Assert\Choice(['scheduled', 'live', 'finished'])]
    public string $status = 'scheduled';
}