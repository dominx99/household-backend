<?php

declare(strict_types=1);

namespace App\Household\DutyVariant\Domain;

use App\Household\Task\Domain\TaskId;
use App\Shared\Domain\Aggregate\AggregateRoot;

final class DutyVariant extends AggregateRoot
{
    public function __construct(
        private DutyVariantId $id,
        private TaskId $taskId,
        private DutyVariantName $name,
        private DutyVariantPoints $points,
    ) {
    }

    public static function create(
        DutyVariantId $id,
        TaskId $taskId,
        DutyVariantName $name,
        DutyVariantPoints $points,
    ): self {
        $dutyVariant = new self($id, $taskId, $name, $points);

        $dutyVariant->record(new DutyVariantCreatedDomainEvent(
            $id->value(),
            $taskId->value(),
            $name->value(),
            $points->value(),
        ));

        return $dutyVariant;
    }

    public function id(): DutyVariantId
    {
        return $this->id;
    }

    public function taskId(): TaskId
    {
        return $this->taskId;
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
