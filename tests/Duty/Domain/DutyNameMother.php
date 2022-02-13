<?php

declare(strict_types=1);

namespace App\Tests\Duty\Domain;

use App\Household\Duty\Domain\DutyName;
use App\Tests\Shared\Domain\WordMother;

final class DutyNameMother
{
    public static function create(?string $value = null): DutyName
    {
        return new DutyName($value ?? WordMother::create());
    }
}
