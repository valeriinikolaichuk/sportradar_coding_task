<?php

namespace App\Service\Events;

use App\Entity\Event;
use App\Service\EventDTO;

class EventMapper
{
    public function supports(array $params): bool
    {
        return true;
    }

    public function process(array $events, array $params): array
    {
        return array_map(function (Event $event) {

            $homeTeam = $event ->getHomeTeam()?->getName();
            $awayTeam = $event ->getAwayTeam()?->getName();

            $result = null;
            if ($event ->getHomeScore() !== null && $event ->getAwayScore() !== null) {
                $result = $event ->getHomeScore() . ':' . $event ->getAwayScore();
            }

            $date = $event ->getMatchDate()?->format('Y-m-d') ?? '-';
            $time = $event ->getMatchTime()?->format('H:i:s') ?? '-';

            return new EventDTO(
                $date,
                $time,
                $event ->getCompetition()?->getName() ?? '-',
                $homeTeam,
                $awayTeam,
                $result
            );

        }, $events);
    }
}