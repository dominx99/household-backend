<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220416153810 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create duty variant table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE duty_variants (id VARCHAR(36) NOT NULL, name VARCHAR(255) NOT NULL, points VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE duty_variants');
    }
}
