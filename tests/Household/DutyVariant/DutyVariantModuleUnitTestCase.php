<?php

declare(strict_types=1);

namespace App\Tests\Household\DutyVariant;

use App\Household\DutyVariant\Domain\DutyVariant;
use App\Household\DutyVariant\Domain\DutyVariantRepository;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class DutyVariantModuleUnitTestCase extends UnitTestCase
{
    private DutyVariantRepository|MockInterface|null $repository;

    protected function repository(): DutyVariantRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(DutyVariantRepository::class);
    }

    protected function shouldSave(DutyVariant $dutyVariant): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($dutyVariant))
            ->once()
            ->andReturnNull()
        ;
    }
}
