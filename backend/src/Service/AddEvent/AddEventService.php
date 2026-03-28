<?php

namespace App\Service\AddEvent;

use Doctrine\ORM\EntityManagerInterface;

use App\Service\Events\EventPipeline\EventMapper;
use App\Entity\Event;
use App\Entity\Team;
use App\Entity\Competition;
use App\Entity\Stage;
use App\Service\DTO\EventDTO;

class AddEventService
{
    private EventMapper $mapper;
    private EntityManagerInterface $em;

    public function __construct(
        EventMapper $mapper, 
        EntityManagerInterface $em
    ){
        $this -> mapper = $mapper;
        $this -> em = $em;
    }

    public function createEvent(CreateEventDTO $dto): ?EventDTO
    {
        $homeTeam = $this ->em ->getRepository(Team::class)->find($dto -> homeTeamId);
        $awayTeam = $this ->em ->getRepository(Team::class)->find($dto -> awayTeamId);
        $competition = $this ->em ->getRepository(Competition::class)->find($dto -> competitionId);

        if (!$homeTeam || !$awayTeam || !$competition) {
            throw new NotFoundHttpException('Related entity not found');
        }

        $stage = $dto->stageId
            ? $this ->em ->getRepository(Stage::class)->find($dto -> stageId)
            : null;

        if ($dto -> stageId && !$stage) {
            throw new NotFoundHttpException('Stage not found');
        }

        $event = new Event();
        $event ->setHomeTeam($homeTeam);
        $event ->setAwayTeam($awayTeam);
        $event ->setCompetition($competition);
        $event ->setStage($stage);
        $event ->setMatchDate(new \DateTimeImmutable($dto -> date));
        $event ->setMatchTime(new \DateTimeImmutable($dto -> time));
        $event ->setStatus($dto -> status);

        $this ->em ->persist($event);
        $this ->em ->flush();

        return $this -> mapper ->process([$event], [])[0];
    }
}