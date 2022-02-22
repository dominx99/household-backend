<?php

declare(strict_types=1);

namespace App\Household\DutyVariant\Application\Create;

use App\Shared\Domain\Bus\Command\Command;

final class CreateDutyVariantCommand implements Command
{
    public function __construct(
        private string $id,
        private string $dutyId,
        private string $name,
        private int $points,
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function dutyId(): string
    {
        return $this->dutyId;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function points(): int
    {
        return $this->points;
    }
}
