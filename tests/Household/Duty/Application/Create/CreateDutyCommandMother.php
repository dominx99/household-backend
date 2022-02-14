<?php

declare(strict_types=1);

namespace App\Tests\Household\Duty\Application\Create;

use App\Household\Duty\Domain\DutyId;
use App\Household\Duty\Domain\DutyName;
use App\Tests\Household\Duty\Domain\DutyIdMother;
use App\Tests\Household\Duty\Domain\DutyNameMother;

final class CreateDutyCommandMother
{
    public static function create(
        ?DutyId $id = null,
        ?DutyName $name = null,
    ): CreateDutyCommand {
        return new CreateDutyCommand(
            $id?->value() ?? DutyIdMother::create()->value(),
            $name?->value() ?? DutyNameMother::create()->value(),
        );
    }
}
