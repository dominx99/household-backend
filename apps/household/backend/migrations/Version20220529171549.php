<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220529171549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add membership table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE membership (id VARCHAR(36) NOT NULL, member_id VARCHAR(255) NOT NULL, member_type VARCHAR(255) NOT NULL, resource_id VARCHAR(255) NOT NULL, resource_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE membership');
    }
}
