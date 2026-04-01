<?php

namespace App\Tests\Service\Events\EventPipeline;

use App\Repository\EventRepository;
use App\Service\Events\EventPipeline\DefaultEventFilter;
use PHPUnit\Framework\TestCase;

class DefaultEventFilterTest extends TestCase
{
    public function testProcessReturnsMergedPastAndFutureEvents(): void
    {
        $repository = $this->createMock(EventRepository::class);

        $now = new \DateTimeImmutable('2024-01-01 10:00:00');

        $pastEvents = [
            ['id' => 1],
            ['id' => 2],
        ];

        $futureEvents = [
            ['id' => 3],
            ['id' => 4],
            ['id' => 5],
        ];

        $repository->expects($this->once())
            ->method('findPast')
            ->with($now, 5)
            ->willReturn($pastEvents);

        $repository->expects($this->once())
            ->method('findFuture')
            ->with($now, 10)
            ->willReturn($futureEvents);

        $filter = new DefaultEventFilter($repository);

        $result = $filter->process([], [], $now);

        $this->assertSame(
            array_merge($pastEvents, $futureEvents),
            $result
        );
    }
}