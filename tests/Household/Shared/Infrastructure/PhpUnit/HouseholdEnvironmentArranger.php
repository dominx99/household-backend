<?php

declare(strict_types=1);

namespace App\Tests\Household\Shared\Infrastructure\PhpUnit;

use App\Tests\Shared\Infrastructure\Arranger\EnvironmentArranger;
use App\Tests\Shared\Infrastructure\Doctrine\MySqlDatabaseCleaner;
use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\apply;

final class HouseholdEnvironmentArranger implements EnvironmentArranger
{
    public function __construct(private EntityManager $entityManager)
    {
    }

    public function arrange(): void
    {
        apply(new MySqlDatabaseCleaner(), [$this->entityManager]);
    }

    public function close(): void
    {
    }
}
