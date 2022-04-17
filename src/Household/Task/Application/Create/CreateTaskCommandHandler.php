<?php

declare(strict_types=1);

namespace App\Household\Task\Application\Create;

use App\Household\Task\Domain\TaskId;
use App\Household\Task\Domain\TaskName;
use App\Shared\Domain\Bus\Command\CommandHandler;

final class CreateTaskCommandHandler implements CommandHandler
{
    public function __construct(private TaskCreator $creator)
    {
    }

    public function __invoke(CreateTaskCommand $command): void
    {
        $id = new TaskId($command->id());
        $name = new TaskName($command->name());

        $this->creator->__invoke($id, $name);
    }
}
