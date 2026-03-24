<?php

namespace App\Tests\Service\Events;

use PHPUnit\Framework\TestCase;
use App\Service\Events\EventPipeline\EventProvider;
use App\Repository\EventRepository;

class EventProviderTest extends TestCase
{
    public function testProcessReturnsEventsFromRepository(): void
    {
        $expectedEvents = ['event1', 'event2'];

        $repository = $this->createMock(EventRepository::class);
        $repository
            ->expects($this->once())
            ->method('findAllEvents')
            ->willReturn($expectedEvents);

        $provider = new EventProvider($repository);

        $result = $provider->process([], []);

        $this->assertSame($expectedEvents, $result);
    }
}