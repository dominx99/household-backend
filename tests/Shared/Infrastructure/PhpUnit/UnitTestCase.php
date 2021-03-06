<?php

declare(strict_types=1);

namespace App\Tests\Shared\Infrastructure\PhpUnit;

use App\Shared\Domain\Bus\Command\Command;
use App\Shared\Domain\Bus\Event\DomainEvent;
use App\Shared\Domain\Bus\Event\EventBus;
use App\Shared\Domain\Bus\Query\Query;
use App\Shared\Domain\Bus\Query\Response;
use App\Tests\Shared\Domain\TestUtils;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\Matcher\MatcherAbstract;
use Mockery\MockInterface;

abstract class UnitTestCase extends MockeryTestCase
{
    private EventBus|MockInterface|null $eventBus;

    protected function mock(string $className): MockInterface
    {
        return Mockery::mock($className);
    }

    protected function eventBus(): EventBus|MockInterface
    {
        return $this->eventBus = $this->eventBus ?? $this->mock(EventBus::class);
    }

    protected function dispatch(Command $command, callable $commandHandler): void
    {
        $commandHandler($command);
    }

    protected function shouldPublishDomainEvent(DomainEvent $domainEvent): void
    {
        $this->eventBus()
            ->shouldReceive('publish')
            ->with($this->similarTo($domainEvent))
            ->andReturnNull();
    }

    protected function similarTo($value, $delta = 0.0): MatcherAbstract
    {
        return TestUtils::similarTo($value, $delta);
    }

    protected function assertAskResponse(Response $expected, Query $query, callable $queryHandler): void
    {
        $actual = $queryHandler($query);

        $this->assertEquals($expected, $actual);
    }
}
