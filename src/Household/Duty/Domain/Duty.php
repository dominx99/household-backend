<?php

declare(strict_types=1);

namespace App\Household\Duty\Domain;

use App\Shared\Domain\AggregateRoot;

final class Duty extends AggregateRoot
{
    public function __construct(
        private DutyId $id,
        private DutyName $name,
    ) {}

    public function id(): DutyId
    {
        return $this->id;
    }

    public function name(): DutyName
    {
        return $this->name;
    }
}
