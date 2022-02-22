<?php

declare(strict_types=1);

namespace App\Household\DutyVariant\Domain;

use App\Household\Duty\Domain\DutyId;
use App\Shared\Domain\Aggregate\AggregateRoot;

final class DutyVariant extends AggregateRoot
{
    public function __construct(
        private DutyVariantId $id,
        private DutyId $dutyId,
        private DutyVariantName $name,
        private DutyVariantPoints $points,
    ) {
    }

    public static function create(
        DutyVariantId $id,
        DutyId $dutyId,
        DutyVariantName $name,
        DutyVariantPoints $points,
    ): self {
        $duty = new self($id, $dutyId, $name, $points);

        $duty->record(new DutyVariantCreatedDomainEvent(
            $id->value(),
            $dutyId->value(),
            $name->value(),
            $points->value(),
        ));

        return $duty;
    }

    public function id(): DutyVariantId
    {
        return $this->id;
    }

    public function dutyId(): DutyId
    {
        return $this->dutyId;
    }

    public function name(): DutyVariantName
    {
        return $this->name;
    }

    public function points(): DutyVariantPoints
    {
        return $this->points;
    }
}
