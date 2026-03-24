<?php

namespace App\Service\AddEvent;

use App\Repository\EventRepository;
use App\Service\Events\EventPipeline\EventMapper;
use App\Entity\Event;
use App\Entity\Team;
use App\Entity\Competition;
use App\Entity\Stage;
use Doctrine\ORM\EntityManagerInterface;

class AddEventService
{
    private EventRepository $repository;
    private EventMapper $mapper;
    private EntityManagerInterface $em;

    public function __construct(
        EventRepository $repository, 
        EventMapper $mapper, 
        EntityManagerInterface $em
    ){
        $this -> repository = $repository;
        $this -> mapper = $mapper;
        $this -> em = $em;
    }

    public function createEvent(array $data): ?\App\Service\EventDTO
    {
        $homeTeam = $this -> em ->getReference(Team::class, $data['homeTeamId']);
        $awayTeam = $this -> em ->getReference(Team::class, $data['awayTeamId']);
        $competition = $this -> em ->getReference(Competition::class, $data['competitionId']);
        $stage = isset($data['stageId']) ? $this -> em ->getReference(Stage::class, $data['stageId']) : null;

        $event = new Event();
        $event ->setHomeTeam($homeTeam);
        $event ->setAwayTeam($awayTeam);
        $event ->setCompetition($competition);
        $event ->setStage($stage);
        $event ->setMatchDate(new \DateTimeImmutable($data['date']));
        $event ->setMatchTime(new \DateTimeImmutable($data['time']));
        $event ->setStatus($data['status'] ?? 'scheduled');

        $this ->em ->persist($event);
        $this ->em ->flush();

        return $this -> mapper ->process([$event], [])[0];
    }
}