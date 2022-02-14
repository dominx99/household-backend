<?php

declare(strict_types=1);

namespace App\Tests\Household\Duty\Domain;

use App\Household\Duty\Domain\Duty;
use App\Household\Duty\Domain\DutyCreatedDomainEvent;
use App\Household\Duty\Domain\DutyId;
use App\Household\Duty\Domain\DutyName;

final class DutyCreatedDomainEventMother
{
    public static function create(
        ?DutyId $id = null,
        ?DutyName $name = null,
    ): DutyCreatedDomainEvent {
        return new DutyCreatedDomainEvent(
            $id?->value() ?? DutyIdMother::create()->value(),
            $name?->value() ?? DutyNameMother::create()->value(),
        );
    }

    public static function fromDuty(Duty $duty): DutyCreatedDomainEvent
    {
        return self::create($duty->id(), $duty->name());
    }
}
