<?php

declare(strict_types=1);

namespace App\Household\Duty\Application\Create;

use App\Household\Duty\DutyModuleUnitTestCase;
use App\Tests\Household\Duty\Application\Create\CreateDutyCommandMother;
use App\Tests\Household\Duty\Domain\DutyCreatedDomainEventMother;
use App\Tests\Household\Duty\Domain\DutyMother;

final class CreateDutyCommandHandlerTest extends DutyModuleUnitTestCase
{
    private CreateDutyCommandHandler|null $handler;

    public function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateDutyCommandHandler(DutyCreator($this->repository(), $this->eventBus()));
    }

    /** @test */
    public function it_shout_create_valid_course(): void
    {
        $command = CreateDutyCommandMother::create();

        $duty = DutyMother::fromRequest($command);
        $domainEvent = DutyCreatedDomainEventMother::fromDuty($duty);

        $this->shouldSave($duty);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}