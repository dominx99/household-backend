<?php

declare(strict_types=1);

namespace App\Household\Task\Infrastructure\Persistence;

use App\Household\Task\Domain\Task;
use App\Household\Task\Domain\TaskId;
use App\Household\Task\Domain\TaskRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class MySqlTaskRepository extends DoctrineRepository implements TaskRepository
{
    public function save(Task $task): void
    {
        $this->persist($task);
    }

    public function search(TaskId $id): ?Task
    {
        return $this->repository(Task::class)->find($id);
    }
}
