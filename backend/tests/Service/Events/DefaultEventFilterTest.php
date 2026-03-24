<?php

namespace App\Tests\Service\Events;

use PHPUnit\Framework\TestCase;
use App\Service\Events\EventPipeline\DefaultEventFilter;

class DefaultEventFilterTest extends TestCase
{
    public function testProcessReturnsFilteredArray(): void
    {
        $filter = new DefaultEventFilter();

        $event1 = new class {
            public function getDateTime() {
                return new \DateTimeImmutable('2024-01-01');
            }
        };

        $event2 = new class {
            public function getDateTime() {
                return new \DateTimeImmutable('2025-01-01');
            }
        };

        $events = [$event1, $event2];

        $result = $filter->process($events, []);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}