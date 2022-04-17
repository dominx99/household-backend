<?php

declare(strict_types=1);

namespace App\Tests\Household\Duty\Application\Find;

use App\Household\Duty\Application\Find\FindDutyExistsQuery;
use App\Household\Duty\Application\Find\FindDutyExistsQueryHandler;
use App\Household\Duty\Domain\DutyExists;
use App\Shared\Domain\ValueObject\Uuid;
use App\Tests\Household\Duty\Domain\DutyMother;
use App\Tests\Household\Duty\DutyModuleUnitTestCase;

final class FindDutyExistsQueryHandlerTest extends DutyModuleUnitTestCase
{
    private FindDutyExistsQueryHandler $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new FindDutyExistsQueryHandler($this->repository());
    }

    /** @test */
    public function it_should_return_true_if_duty_exists(): void
    {
        $duty = DutyMother::create();
        $query = new FindDutyExistsQuery($duty->id()->value());
        $response = DutyExistsResponseMother::create(new DutyExists(true));

        $this->shouldSearch($duty);

        $this->assertAskResponse($response, $query, $this->handler);
    }

    /** @test */
    public function it_should_return_false_if_duty_not_exists(): void
    {
        $query = new FindDutyExistsQuery(Uuid::random()->value());
        $response = DutyExistsResponseMother::create(new DutyExists(false));

        $this->shouldSearch(null);

        $this->assertAskResponse($response, $query, $this->handler);
    }
}
