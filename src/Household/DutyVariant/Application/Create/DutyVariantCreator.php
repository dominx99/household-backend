<?php

declare(strict_types=1);

namespace App\Household\DutyVariant\Application\Create;

use App\Household\DutyVariant\Domain\DutyVariant;
use App\Household\DutyVariant\Domain\DutyVariantId;
use App\Household\DutyVariant\Domain\DutyVariantName;
use App\Household\DutyVariant\Domain\DutyVariantPoints;
use App\Household\DutyVariant\Domain\DutyVariantRepository;
use App\Household\Task\Domain\TaskId;
use App\Shared\Domain\Bus\Event\EventBus;

final class DutyVariantCreator
{
    public function __construct(private DutyVariantRepository $repository, private EventBus $eventBus)
    {
    }

    public function __invoke(
        DutyVariantId $id,
        TaskId $taskId,
        DutyVariantName $name,
        DutyVariantPoints $points,
    ): void {
        $dutyVariant = DutyVariant::create($id, $taskId, $name, $points);

        $this->repository->save($dutyVariant);
        $this->eventBus->publish(...$dutyVariant->pullDomainEvents());
    }
}
