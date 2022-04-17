<?php

declare(strict_types=1);

namespace App\Household\Duty\Application\Find;

use App\Shared\Domain\Bus\Query\Query;

final class FindDutyExistsQuery implements Query
{
    public function __construct(private string $dutyId)
    {
        $this->dutyId;
    }

    public function dutyId(): string
    {
        return $this->dutyId;
    }
}
