<?php

declare(strict_types=1);

namespace App\Household\DutyVariant\Infrastructure\Persistence;

use App\Household\DutyVariant\Domain\DutyVariant;
use App\Household\DutyVariant\Domain\DutyVariantRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class MySqlDutyVariantRepository extends DoctrineRepository implements DutyVariantRepository
{
    public function save(DutyVariant $dutyVariant): void
    {
        $this->persist($dutyVariant);
    }
}
