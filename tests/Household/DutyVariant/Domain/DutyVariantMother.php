<?php

declare(strict_types=1);

namespace App\Tests\Household\DutyVariant\Domain;

use App\Household\Duty\Domain\DutyId;
use App\Household\DutyVariant\Application\Create\CreateDutyVariantCommand;
use App\Household\DutyVariant\Domain\DutyVariant;
use App\Household\DutyVariant\Domain\DutyVariantId;
use App\Household\DutyVariant\Domain\DutyVariantName;
use App\Household\DutyVariant\Domain\DutyVariantPoints;
use App\Tests\Household\Duty\Domain\DutyIdMother;

final class DutyVariantMother
{
    public static function create(
        ?DutyVariantId $id = null,
        ?DutyId $dutyId = null,
        ?DutyVariantName $name = null,
        ?DutyVariantPoints $points = null,
    ): DutyVariant {
        return new DutyVariant(
            $id ?? DutyVariantIdMother::create(),
            $dutyId ?? DutyIdMother::create(),
            $name ?? DutyVariantNameMother::create(),
            $points ?? DutyVariantPointsMother::create(),
        );
    }

    public static function fromRequest(CreateDutyVariantCommand $request): DutyVariant
    {
        return self::create(
            DutyVariantIdMother::create($request->id()),
            DutyIdMother::create($request->dutyId()),
            DutyVariantNameMother::create($request->name()),
            DutyVariantPointsMother::create($request->points()),
        );
    }
}
