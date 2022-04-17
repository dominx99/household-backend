<?php

declare(strict_types=1);

namespace App\Tests\Household\Task\Application\Find;

use App\Household\Task\Application\Find\FindTaskExistsQuery;
use App\Household\Task\Application\Find\FindTaskExistsQueryHandler;
use App\Household\Task\Domain\TaskExists;
use App\Shared\Domain\ValueObject\Uuid;
use App\Tests\Household\Task\Domain\TaskMother;
use App\Tests\Household\Task\TaskModuleUnitTestCase;

final class FindTaskExistsQueryHandlerTest extends TaskModuleUnitTestCase
{
    private FindTaskExistsQueryHandler $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new FindTaskExistsQueryHandler($this->repository());
    }

    /** @test */
    public function it_should_return_true_if_duty_exists(): void
    {
        $duty = TaskMother::create();
        $query = new FindTaskExistsQuery($duty->id()->value());
        $response = TaskExistsResponseMother::create(new TaskExists(true));

        $this->shouldSearch($duty);

        $this->assertAskResponse($response, $query, $this->handler);
    }

    /** @test */
    public function it_should_return_false_if_duty_not_exists(): void
    {
        $query = new FindTaskExistsQuery(Uuid::random()->value());
        $response = TaskExistsResponseMother::create(new TaskExists(false));

        $this->shouldSearch(null);

        $this->assertAskResponse($response, $query, $this->handler);
    }
}
