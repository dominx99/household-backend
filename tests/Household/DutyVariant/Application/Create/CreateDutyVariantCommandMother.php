<?php

declare(strict_types=1);

namespace App\Tests\Household\DutyVariant\Application\Create;

use App\Household\DutyVariant\Application\Create\CreateDutyVariantCommand;
use App\Household\DutyVariant\Domain\DutyVariantId;
use App\Household\DutyVariant\Domain\DutyVariantName;
use App\Household\DutyVariant\Domain\DutyVariantPoints;
use App\Household\Task\Domain\TaskId;
use App\Tests\Household\DutyVariant\Domain\DutyVariantIdMother;
use App\Tests\Household\DutyVariant\Domain\DutyVariantNameMother;
use App\Tests\Household\DutyVariant\Domain\DutyVariantPointsMother;
use App\Tests\Household\Task\Domain\TaskIdMother;

final class CreateDutyVariantCommandMother
{
    public static function create(
        ?DutyVariantId $id = null,
        ?TaskId $taskId = null,
        ?DutyVariantName $name = null,
        ?DutyVariantPoints $points = null,
    ): CreateDutyVariantCommand {
        return new CreateDutyVariantCommand(
            $id?->value() ?? DutyVariantIdMother::create()->value(),
            $taskId?->value() ?? TaskIdMother::create()->value(),
            $name?->value() ?? DutyVariantNameMother::create()->value(),
            $points?->value() ?? DutyVariantPointsMother::create()->value(),
        );
    }
}
