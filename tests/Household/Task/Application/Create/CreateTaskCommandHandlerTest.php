<?php

declare(strict_types=1);

namespace App\Tests\Household\Task\Application\Create;

use App\Household\Task\Application\Create\CreateTaskCommandHandler;
use App\Household\Task\Application\Create\TaskCreator;
use App\Tests\Household\Task\Domain\TaskCreatedDomainEventMother;
use App\Tests\Household\Task\Domain\TaskMother;
use App\Tests\Household\Task\TaskModuleUnitTestCase;

final class CreateTaskCommandHandlerTest extends TaskModuleUnitTestCase
{
    private CreateTaskCommandHandler|null $handler;

    public function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateTaskCommandHandler(new TaskCreator($this->repository(), $this->eventBus()));
    }

    /** @test */
    public function it_should_create_valid_duty(): void
    {
        $command = CreateTaskCommandMother::create();

        $duty = TaskMother::fromRequest($command);
        $domainEvent = TaskCreatedDomainEventMother::fromDuty($duty);

        $this->shouldSave($duty);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
