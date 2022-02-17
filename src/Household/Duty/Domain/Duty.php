<?php

declare(strict_types=1);

namespace App\Household\Duty\Domain;

use App\Shared\Domain\Aggregate\AggregateRoot;

final class Duty extends AggregateRoot
{
    public function __construct(
        private DutyId $id,
        private DutyName $name,
    ) {
    }

    public static function create(DutyId $id, DutyName $name): self
    {
        $duty = new self($id, $name);

        $duty->record(new DutyCreatedDomainEvent($id->value(), $name->value()));

        return $duty;
    }

    public function id(): DutyId
    {
        return $this->id;
    }

    public function name(): DutyName
    {
        return $this->name;
    }
}
