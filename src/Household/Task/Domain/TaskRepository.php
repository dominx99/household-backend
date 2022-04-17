<?php

declare(strict_types=1);

namespace App\Household\Task\Domain;

interface TaskRepository
{
    public function save(Task $duty): void;

    public function search(TaskId $id): ?Task;
}
