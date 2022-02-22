<?php

declare(strict_types=1);

namespace App\Tests\Household\DutyVariant\Application\Create;

use App\Household\Duty\Domain\DutyId;
use App\Household\DutyVariant\Application\Create\CreateDutyVariantCommand;
use App\Tests\Household\Duty\Domain\DutyIdMother;
use App\Tests\Household\DutyVariant\Domain\DutyVariantIdMother;
use App\Tests\Household\DutyVariant\Domain\DutyVariantNameMother;
use App\Tests\Household\DutyVariant\Domain\DutyVariantPointsMother;

final class CreateDutyVariantCommandMother
{
    public static function create(
        ?DutyVariantId $id = null,
        ?DutyId $dutyId = null,
        ?DutyVariantName $name = null,
        ?DutyVariantPoints $points = null,
    ): CreateDutyVariantCommand {
        return new CreateDutyVariantCommand(
            $id?->value() ?? DutyVariantIdMother::create()->value(),
            $dutyId?->value() ?? DutyIdMother::create()->value(),
            $name?->value() ?? DutyVariantNameMother::create()->value(),
            $points?->value() ?? DutyVariantPointsMother::create()->value(),
        );
    }
}
