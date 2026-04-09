<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260409000300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Drop allowed_external_id table and rename external_api to external_api_mapping';
    }

    public function up(Schema $schema): void
    {
        // 1. drop old table
        $this->addSql('DROP TABLE allowed_external_id');

        // 2. rename table
        $this->addSql('RENAME TABLE external_api TO external_api_mapping');
    }

    public function down(Schema $schema): void
    {
        // rollback rename
        $this->addSql('RENAME TABLE external_api_mapping TO external_api');

        // recreate allowed_external_id (minimal rollback)
        $this->addSql('
            CREATE TABLE allowed_external_id (
                id INT AUTO_INCREMENT NOT NULL,
                competition_id VARCHAR(255) NOT NULL,
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ');
    }
}