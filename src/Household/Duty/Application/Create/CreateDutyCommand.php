<?php

declare(strict_types=1);

namespace App\Household\Duty\Application\Create;

use App\Shared\Domain\Bus\Command\Command;

final class CreateDutyCommand implements Command
{
    public function __construct(
        private string $id,
        private string $name,
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}
