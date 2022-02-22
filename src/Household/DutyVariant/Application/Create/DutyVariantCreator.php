<?php

declare(strict_types=1);

namespace App\Household\DutyVariant\Application\Create;

use App\Household\Duty\Domain\DutyId;
use App\Household\DutyVariant\Domain\DutyVariant;
use App\Household\DutyVariant\Domain\DutyVariantId;
use App\Household\DutyVariant\Domain\DutyVariantName;
use App\Household\DutyVariant\Domain\DutyVariantPoints;
use App\Household\DutyVariant\Domain\DutyVariantRepository;
use App\Shared\Domain\Bus\Event\EventBus;

final class DutyVariantCreator
{
    public function __construct(private DutyVariantRepository $repository, private EventBus $eventBus)
    {
    }

    public function __invoke(
        DutyVariantId $id,
        DutyId $dutyId,
        DutyVariantName $name,
        DutyVariantPoints $points,
    ): void {
        $dutyVariant = DutyVariant::create($id, $dutyId, $name, $points);

        $this->repository->save($dutyVariant);
        $this->eventBus->publish(...$dutyVariant->pullDomainEvents());
    }
}
