<?php

declare(strict_types=1);

namespace App\Household\Task\Application\Find;

use App\Household\Task\Domain\TaskId;
use App\Household\Task\Domain\TaskRepository;
use App\Shared\Domain\Bus\Query\QueryHandler;

final class FindTaskExistsQueryHandler implements QueryHandler
{
    public function __construct(private TaskRepository $repository)
    {
    }

    public function __invoke(FindTaskExistsQuery $query): TaskExistsResponse
    {
        if (!$this->repository->search(new TaskId($query->taskId()))) {
            return new TaskExistsResponse(false);
        }

        return new TaskExistsResponse(true);
    }
}
