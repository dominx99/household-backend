<?php

declare(strict_types=1);

namespace App\Tests\Household\DutyVariant\Application\Create;

use App\Household\DutyVariant\Application\Create\CreateDutyVariantCommandHandler;
use App\Household\DutyVariant\Application\Create\DutyVariantCreator;
use App\Tests\Household\DutyVariant\Domain\DutyVariantCreatedDomainEventMother;
use App\Tests\Household\DutyVariant\Domain\DutyVariantMother;
use App\Tests\Household\DutyVariant\DutyVariantModuleUnitTestCase;

final class CreateDutyVariantCommandHandlerTest extends DutyVariantModuleUnitTestCase
{
    private CreateDutyVariantCommandHandler $handler;

    public function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateDutyVariantCommandHandler(new DutyVariantCreator(
            $this->repository(),
            $this->eventBus(),
        ));
    }

    /** @test */
    public function it_should_create_valid_duty_variant()
    {
        $command = CreateDutyVariantCommandMother::create();

        $dutyVariant = DutyVariantMother::fromRequest($command);
        $domainEvent = DutyVariantCreatedDomainEventMother::fromDutyVariant($dutyVariant);

        $this->shouldSave($dutyVariant);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
