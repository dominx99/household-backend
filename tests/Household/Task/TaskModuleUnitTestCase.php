<?php

declare(strict_types=1);

namespace App\Tests\Household\Task;

use App\Household\Task\Domain\Task;
use App\Household\Task\Domain\TaskRepository;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class TaskModuleUnitTestCase extends UnitTestCase
{
    private TaskRepository|MockInterface|null $repository;

    protected function repository(): TaskRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(TaskRepository::class);
    }

    protected function shouldSave(Task $duty): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($duty))
            ->once()
            ->andReturnNull()
        ;
    }

    protected function shouldSearch(?Task $duty): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->once()
            ->andReturn($duty);
    }
}
