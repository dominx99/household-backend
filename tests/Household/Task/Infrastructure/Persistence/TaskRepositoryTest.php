<?php

declare(strict_types=1);

namespace App\Tests\Household\Task\Infrastructure\Persistence;

use App\Tests\Household\Task\Domain\TaskMother;
use App\Tests\Household\Task\TaskModuleInfrastructureTestCase;

final class TaskRepositoryTest extends TaskModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_duty(): void
    {
        $duty = TaskMother::create();

        $this->repository()->save($duty);
    }

    /** @test */
    public function is_should_return_existing_duty(): void
    {
        $duty = TaskMother::create();

        $this->repository()->save($duty);

        $this->assertEquals($duty, $this->repository()->search($duty->id()));
    }
}
