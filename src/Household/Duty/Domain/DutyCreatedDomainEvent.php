<?php

declare(strict_types=1);

namespace App\Household\Duty\Domain;

use App\Shared\Domain\Bus\Event\DomainEvent;

final class DutyCreatedDomainEvent extends DomainEvent
{
    public function __construct(
        string $id,
        private string $name,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);
    }
}
