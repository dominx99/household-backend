<?php

declare(strict_types=1);

namespace App\Tests\Shared\Infrastructure\Doctrine;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use function Lambdish\Phunctional\filter;
use function Lambdish\Phunctional\first;
use function Lambdish\Phunctional\map;

final class MySqlDatabaseCleaner
{
    private const EXCLUDED_TABLES = [
        'doctrine_migration_versions',
    ];

    public function __invoke(EntityManagerInterface $entityManager): void
    {
        $connection = $entityManager->getConnection();

        $tables = $this->tables($connection);

        $filteredTables = $this->filterExcludedTables($tables);
        $truncateTablesSql = $this->truncateDatabaseSql($filteredTables);

        $connection->exec($truncateTablesSql);
    }

    private function truncateDatabaseSql(array $tables): string
    {
        $truncateTables = map($this->truncateTableSql(), $tables);

        return sprintf('SET FOREIGN_KEY_CHECKS = 0; %s SET FOREIGN_KEY_CHECKS = 1;', implode(' ', $truncateTables));
    }

    private function truncateTableSql(): callable
    {
        return fn (array $table): string => sprintf('TRUNCATE TABLE `%s`;', first($table));
    }

    private function filterExcludedTables(array $tables): array
    {
        return filter(fn (array $table) => !in_array(first($table), self::EXCLUDED_TABLES), $tables);
    }

    private function tables(Connection $connection): array
    {
        return $connection->query('SHOW TABLES')->fetchAll();
    }
}
