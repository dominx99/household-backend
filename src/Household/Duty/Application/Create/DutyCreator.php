<?php

declare(strict_types=1);

namespace App\Household\Duty\Application\Create;

use App\Household\Duty\Domain\Duty;
use App\Household\Duty\Domain\DutyId;
use App\Household\Duty\Domain\DutyName;
use App\Household\Duty\Domain\DutyRepository;
use App\Shared\Domain\Bus\Event\EventBus;

final class DutyCreator
{
    public function __construct(
        private DutyRepository $repository,
        private EventBus $eventBus,
    ) {
    }

    public function __invoke(DutyId $id, DutyName $name): void
    {
        $duty = Duty::create($id, $name);

        $this->repository->save($duty);
        $this->eventBus->publish(...$duty->pullDomainEvents());
    }
}
