<?php

declare(strict_types=1);

namespace App\Household\DutyVariant\Domain;

use App\Shared\Domain\Bus\Event\DomainEvent;

final class DutyVariantCreatedDomainEvent extends DomainEvent
{
    public function __construct(
        string $id,
        private string $taskId,
        private string $name,
        private int $points,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);
    }
}
