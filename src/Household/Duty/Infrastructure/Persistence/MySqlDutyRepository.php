<?php

declare(strict_types=1);

namespace App\Household\Duty\Infrastructure\Persistence;

use App\Household\Duty\Domain\Duty;
use App\Household\Duty\Domain\DutyRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class MySqlDutyRepository extends DoctrineRepository implements DutyRepository
{
    public function save(Duty $duty): void
    {
        $this->persist($duty);
    }
}
