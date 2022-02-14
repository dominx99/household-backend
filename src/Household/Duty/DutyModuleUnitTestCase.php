<?php

declare(strict_types=1);

namespace App\Household\Duty;

use App\Household\Duty\Domain\Duty;
use App\Household\Duty\Domain\DutyRepository;
use App\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class DutyModuleUnitTestCase extends UnitTestCase
{
    private DutyRepository|MockInterface|null $repository;

    protected function repository(): DutyRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(DutyRepository::class);
    }

    protected function shouldSave(Duty $course): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($course))
            ->once()
            ->andReturnNull();
    }
}
