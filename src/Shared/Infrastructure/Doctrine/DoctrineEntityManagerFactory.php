<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Doctrine;

use App\Shared\Infrastructure\Doctrine\Dbal\DbalCustomTypesRegistrar;
use Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver;
use Doctrine\ORM\Mapping\Driver\SimplifiedYamlDriver;
use Doctrine\ORM\Tools\Setup;
use Symfony\Component\Cache\Adapter\ArrayAdapter;

final class DoctrineEntityManagerFactory
{
    private static array $sharedPrefixes = [
        __DIR__ . '/../../../Shared/Infrastructure/Persistence/Mappings' => 'App\Shared\Domain',
    ];

    public static function create(
        array $parameters,
        array $contextPrefixes,
        bool $isDevMode,
        array $dbalCustomTypesClasses
    ): EntityManager {
        DbalCustomTypesRegistrar::register($dbalCustomTypesClasses);

        return EntityManager::create($parameters, self::createConfiguration($contextPrefixes, $isDevMode));
    }

    private static function createConfiguration(array $contextPrefixes, bool $isDevMode): Configuration
    {
        $config = Setup::createConfiguration($isDevMode, null, DoctrineProvider::wrap(new ArrayAdapter()));

        $config->setMetadataDriverImpl(new SimplifiedXmlDriver(array_merge(self::$sharedPrefixes, $contextPrefixes)));

        return $config;
    }
}
