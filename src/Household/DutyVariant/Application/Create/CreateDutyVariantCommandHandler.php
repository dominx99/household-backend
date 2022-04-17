<?php

declare(strict_types=1);

namespace App\Household\DutyVariant\Application\Create;

use App\Household\DutyVariant\Domain\DutyVariantId;
use App\Household\DutyVariant\Domain\DutyVariantName;
use App\Household\DutyVariant\Domain\DutyVariantPoints;
use App\Household\Task\Domain\TaskId;
use App\Shared\Domain\Bus\Command\CommandHandler;

final class CreateDutyVariantCommandHandler implements CommandHandler
{
    public function __construct(private DutyVariantCreator $creator)
    {
    }

    public function __invoke(CreateDutyVariantCommand $command): void
    {
        $this->creator->__invoke(
            new DutyVariantId($command->id()),
            new TaskId($command->dutyId()),
            new DutyVariantName($command->name()),
            new DutyVariantPoints($command->points()),
        );
    }
}
