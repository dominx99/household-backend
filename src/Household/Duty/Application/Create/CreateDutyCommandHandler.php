<?php

declare(strict_types=1);

namespace App\Household\Duty\Application\Create;

use App\Household\Duty\Domain\DutyId;
use App\Household\Duty\Domain\DutyName;

final class CreateDutyCommandHandler
{
    public function __construct(private DutyCreator $creator)
    {
    }

    public function __invoke(CreateDutyCommand $command): void
    {
        $id = new DutyId($command->id());
        $name = new DutyName($command->name());

        $this->creator->__invoke($id, $name);
    }
}