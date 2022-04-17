<?php

declare(strict_types=1);

namespace App\Tests\Household\Duty\Domain;

use App\Household\Duty\Domain\DutyExists;
use App\Tests\Shared\Domain\BooleanMother;

final class DutyExistsMother
{
    public static function create(?bool $value = null): DutyExists
    {
        return new DutyExists($value ?? BooleanMother::create());
    }
}
