<?php

declare(strict_types=1);

namespace App\Household\Task\Application\Create;

use App\Household\Task\Domain\Task;
use App\Household\Task\Domain\TaskId;
use App\Household\Task\Domain\TaskName;
use App\Household\Task\Domain\TaskRepository;
use App\Shared\Domain\Bus\Event\EventBus;

final class TaskCreator
{
    public function __construct(
        private TaskRepository $repository,
        private EventBus $eventBus,
    ) {
    }

    public function __invoke(TaskId $id, TaskName $name): void
    {
        $duty = Task::create($id, $name);

        $this->repository->save($duty);
        $this->eventBus->publish(...$duty->pullDomainEvents());
    }
}
