<?php

declare(strict_types=1);

namespace App\Tests\Household\Duty\Infrastructure\Persistence;

use App\Tests\Household\Duty\Domain\DutyMother;
use App\Tests\Household\Duty\DutyModuleInfrastructureTestCase;

final class DutyRepositoryTest extends DutyModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_duty(): void
    {
        $duty = DutyMother::create();

        $this->repository()->save($duty);
    }

    /** @test */
    public function is_should_return_existing_duty(): void
    {
        $duty = DutyMother::create();

        $this->repository()->save($duty);

        $this->assertEquals($duty, $this->repository()->search($duty->id()));
    }
}
