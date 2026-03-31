<?php

namespace App\Service\AddEvent;

use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\UniqueEvent;

#[UniqueEvent]
class CreateEventDTO
{
    #[Assert\NotBlank]
    public ?int $homeTeamId = null;

    #[Assert\NotBlank]
    public ?int $awayTeamId = null;

    #[Assert\NotBlank]
    public ?int $competitionId = null;

    public ?int $stageId = null;

    #[Assert\NotBlank]
    #[Assert\Date]
    public ?string $date = null;

    #[Assert\NotBlank]
    public ?string $time = null;

    #[Assert\Choice(['scheduled', 'played'])]
    public string $status = 'scheduled';
}