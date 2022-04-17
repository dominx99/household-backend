<?php

declare(strict_types=1);

namespace App\Tests\Household\DutyVariant\Domain;

use App\Household\DutyVariant\Domain\DutyVariant;
use App\Household\DutyVariant\Domain\DutyVariantCreatedDomainEvent;
use App\Household\DutyVariant\Domain\DutyVariantId;
use App\Household\DutyVariant\Domain\DutyVariantName;
use App\Household\DutyVariant\Domain\DutyVariantPoints;
use App\Household\Task\Domain\TaskId;
use App\Tests\Household\Task\Domain\TaskIdMother;

final class DutyVariantCreatedDomainEventMother
{
    public static function create(
        ?DutyVariantId $id = null,
        ?TaskId $taskId = null,
        ?DutyVariantName $name = null,
        ?DutyVariantPoints $points = null,
    ): DutyVariantCreatedDomainEvent {
        return new DutyVariantCreatedDomainEvent(
            $id?->value() ?? DutyVariantIdMother::create()->value(),
            $taskId?->value() ?? TaskIdMother::create()->value(),
            $name?->value() ?? DutyVariantNameMother::create()->value(),
            $points?->value() ?? DutyVariantPointsMother::create()->value(),
        );
    }

    public static function fromDutyVariant(DutyVariant $dutyVariant): DutyVariantCreatedDomainEvent
    {
        return self::create(
            $dutyVariant->id(),
            $dutyVariant->taskId(),
            $dutyVariant->name(),
            $dutyVariant->points(),
        );
    }
}
