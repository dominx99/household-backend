<?php

declare(strict_types=1);

namespace App\Tests\Household\Task;

use App\Household\Task\Domain\TaskRepository;
use App\Tests\Household\Shared\Infrastructure\PhpUnit\HouseholdContextInfrastructureTestCase;

abstract class TaskModuleInfrastructureTestCase extends HouseholdContextInfrastructureTestCase
{
    protected function repository(): TaskRepository
    {
        return $this->service(TaskRepository::class);
    }
}
