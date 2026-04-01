<?php

namespace App\Service\Events\EventPipeline;

use App\Entity\Event;
use App\Service\DTO\EventDTO;
use App\Service\DTO\TeamDTO;
use App\Service\DTO\ResultDTO;
use App\Service\DTO\StageDTO;

class EventMapper
{
    public function supports(array $params): bool
    {
        return true;
    }

    public function process(array $events, array $params, \DateTimeImmutable $now): array
    {
        return array_map(function (Event $event) {
            $competition = $event->getCompetition();

            return new EventDTO(
                $competition ? (int) $competition->getSeason() : 0,
                $event->getStatus(),
                $event->getMatchTime()?->format('H:i:s') ?? '00:00:00',
                $event->getMatchDate()?->format('Y-m-d') ?? '1970-01-01',
                $this->mapTeam($event->getHomeTeam()),
                $this->mapTeam($event->getAwayTeam()),
                $this->mapResult($event),
                $this->mapStage($event->getStage()),
                $competition?->getExternalId(),
                $competition?->getName()
            );
        }, $events);
    }

    private function mapTeam(?\App\Entity\Team $team): ?TeamDTO
    {
        if (!$team) return null;

        return new TeamDTO(
            $team->getName(),
            $team->getOfficialName(),
            $team->getSlug(),
            $team->getAbbreviation(),
            $team->getCountryCode()
        );
    }

    private function mapResult(Event $event): ?ResultDTO
    {
        if ($event->getHomeScore() === null && $event->getAwayScore() === null) {
            return null;
        }

        return new ResultDTO(
            $event->getHomeScore(),
            $event->getAwayScore(),
            $event->getWinnerTeam()?->getName(),
            $event->getMessage(),
            $event->getGoals() ?? [],
            $event->getYellowCards() ?? [],
            $event->getSecondYellowCards() ?? [],
            $event->getDirectRedCards() ?? [],
            $event->getScoreByPeriods()
        );
    }

    private function mapStage(?\App\Entity\Stage $stage): ?StageDTO
    {
        if (!$stage) return null;

        return new StageDTO(
            $stage->getName(),
            $stage->getName(),
            $stage->getOrdering()
        );
    }
}