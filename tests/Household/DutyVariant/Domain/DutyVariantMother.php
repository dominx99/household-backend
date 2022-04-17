<?php

declare(strict_types=1);

namespace App\Tests\Household\DutyVariant\Domain;

use App\Household\DutyVariant\Application\Create\CreateDutyVariantCommand;
use App\Household\DutyVariant\Domain\DutyVariant;
use App\Household\DutyVariant\Domain\DutyVariantId;
use App\Household\DutyVariant\Domain\DutyVariantName;
use App\Household\DutyVariant\Domain\DutyVariantPoints;
use App\Household\Task\Domain\TaskId;
use App\Tests\Household\Task\Domain\TaskIdMother;

final class DutyVariantMother
{
    public static function create(
        ?DutyVariantId $id = null,
        ?TaskId $taskId = null,
        ?DutyVariantName $name = null,
        ?DutyVariantPoints $points = null,
    ): DutyVariant {
        return new DutyVariant(
            $id ?? DutyVariantIdMother::create(),
            $taskId ?? TaskIdMother::create(),
            $name ?? DutyVariantNameMother::create(),
            $points ?? DutyVariantPointsMother::create(),
        );
    }

    public static function fromRequest(CreateDutyVariantCommand $request): DutyVariant
    {
        return self::create(
            DutyVariantIdMother::create($request->id()),
            TaskIdMother::create($request->taskId()),
            DutyVariantNameMother::create($request->name()),
            DutyVariantPointsMother::create($request->points()),
        );
    }
}
