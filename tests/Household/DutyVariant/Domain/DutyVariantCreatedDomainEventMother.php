<?php

declare(strict_types=1);

namespace App\Tests\Household\DutyVariant\Domain;

use App\Household\Duty\Domain\DutyId;
use App\Household\DutyVariant\Domain\DutyVariant;
use App\Household\DutyVariant\Domain\DutyVariantCreatedDomainEvent;
use App\Household\DutyVariant\Domain\DutyVariantId;
use App\Household\DutyVariant\Domain\DutyVariantName;
use App\Household\DutyVariant\Domain\DutyVariantPoints;
use App\Tests\Household\Duty\Domain\DutyIdMother;

final class DutyVariantCreatedDomainEventMother
{
    public static function create(
        ?DutyVariantId $id = null,
        ?DutyId $dutyId = null,
        ?DutyVariantName $name = null,
        ?DutyVariantPoints $points = null,
    ): DutyVariantCreatedDomainEvent {
        return new DutyVariantCreatedDomainEvent(
            $id?->value() ?? DutyVariantIdMother::create()->value(),
            $dutyId?->value() ?? DutyIdMother::create()->value(),
            $name?->value() ?? DutyVariantNameMother::create()->value(),
            $points?->value() ?? DutyVariantPointsMother::create()->value(),
        );
    }

    public static function fromDutyVariant(DutyVariant $dutyVariant): DutyVariantCreatedDomainEvent
    {
        return self::create(
            $dutyVariant->id(),
            $dutyVariant->dutyId(),
            $dutyVariant->name(),
            $dutyVariant->points(),
        );
    }
}
