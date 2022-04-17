<?php

declare(strict_types=1);

namespace App\Tests\Household\Duty\Application\Find;

use App\Household\Duty\Application\Find\DutyExistsResponse;
use App\Household\Duty\Domain\DutyExists;
use App\Tests\Household\Duty\Domain\DutyExistsMother;

final class DutyExistsResponseMother
{
    public static function create(?DutyExists $exists = null): DutyExistsResponse
    {
        return new DutyExistsResponse($exists?->value() ?? DutyExistsMother::create()->value());
    }
}
