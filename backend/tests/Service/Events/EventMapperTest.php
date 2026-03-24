<?php

namespace App\Tests\Service\Events;

use PHPUnit\Framework\TestCase;
use App\Service\Events\EventMapper;
use App\Entity\Event;

class EventMapperTest extends TestCase
{
    public function testProcessReturnsDTOArray(): void
    {
        $event = $this->createMock(Event::class);

        $event->method('getMatchDate')
            ->willReturn(new \DateTime('2024-01-01'));

        $event->method('getMatchTime')
            ->willReturn(new \DateTime('12:00:00'));

        $event->method('getCompetition')
            ->willReturn(null);

        $event->method('getHomeTeam')
            ->willReturn(null);

        $event->method('getAwayTeam')
            ->willReturn(null);

        $event->method('getHomeScore')->willReturn(1);
        $event->method('getAwayScore')->willReturn(2);

        $mapper = new EventMapper();

        $result = $mapper->process([$event], []);

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertInstanceOf(\App\Service\EventDTO::class, $result[0]);
    }
}