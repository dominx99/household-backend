<?php

declare(strict_types=1);

namespace App\Household\Shared\Infrastructure\Doctrine;

use App\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;
use Doctrine\ORM\EntityManagerInterface;

final class HouseholdEntityManagerFactory
{
    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Household', 'App\Household'),
        );

        $dbalCustomTypesClasses = DbalTypesSearcher::inPath(__DIR__ . '/../../../../Household', 'Household');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            $dbalCustomTypesClasses
        );
    }
}
