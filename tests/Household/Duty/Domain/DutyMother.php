<?php

declare(strict_types=1);

namespace App\Tests\Household\Duty\Domain;

use App\Household\Duty\Domain\Duty;
use App\Household\Duty\Domain\DutyId;
use App\Household\Duty\Domain\DutyName;

final class DutyMother
{
    public static function create(
        ?DutyId $id = null,
        ?DutyName $name = null,
    ): Duty {
        return new Duty(
            $id ?? DutyIdMother::create(),
            $name ?? DutyNameMother::create(),
        );
    }

    public static function fromRequest(CreateDutyCommand $request): Duty
    {
        return self::create(
            DutyIdMother::create($request->id()),
            DutyNameMother::create($request->name()),
        );
    }
}
