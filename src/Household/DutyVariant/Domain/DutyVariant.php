<?php

declare(strict_types=1);

namespace App\Household\DutyVariant\Domain;

use App\Household\Task\Domain\TaskId;
use App\Shared\Domain\Aggregate\AggregateRoot;

final class DutyVariant extends AggregateRoot
{
    public function __construct(
        private DutyVariantId $id,
        private TaskId $dutyId,
        private DutyVariantName $name,
        private DutyVariantPoints $points,
    ) {
    }

    public static function create(
        DutyVariantId $id,
        TaskId $dutyId,
        DutyVariantName $name,
        DutyVariantPoints $points,
    ): self {
        $dutyVariant = new self($id, $dutyId, $name, $points);

        $dutyVariant->record(new DutyVariantCreatedDomainEvent(
            $id->value(),
            $dutyId->value(),
            $name->value(),
            $points->value(),
        ));

        return $dutyVariant;
    }

    public function id(): DutyVariantId
    {
        return $this->id;
    }

    public function dutyId(): TaskId
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
