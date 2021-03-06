<?php

declare(strict_types=1);

namespace App\Household\Task\Application\Find;

use App\Shared\Domain\Bus\Query\Query;

final class FindTaskExistsQuery implements Query
{
    public function __construct(private string $taskId)
    {
        $this->taskId;
    }

    public function taskId(): string
    {
        return $this->taskId;
    }
}
