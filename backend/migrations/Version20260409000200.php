<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260409000200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Cleanup competition season + add timestamps';
    }

    public function up(Schema $schema): void
    {
        // 1. remove season from competition
        $this->addSql('ALTER TABLE competition DROP COLUMN season');

        // 2. add timestamps to event
        $this->addSql('ALTER TABLE event 
            ADD created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            ADD updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ');

        // 3. add timestamps to stage
        $this->addSql('ALTER TABLE stage 
            ADD created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            ADD updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ');

        // 4. add timestamps to groups
        $this->addSql('ALTER TABLE groups 
            ADD created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            ADD updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ');
    }

    public function down(Schema $schema): void
    {
        // rollback competition
        $this->addSql('ALTER TABLE competition ADD season VARCHAR(20) DEFAULT NULL');

        // remove timestamps
        $this->addSql('ALTER TABLE event DROP COLUMN created_at, DROP COLUMN updated_at');
        $this->addSql('ALTER TABLE stage DROP COLUMN created_at, DROP COLUMN updated_at');
        $this->addSql('ALTER TABLE groups DROP COLUMN created_at, DROP COLUMN updated_at');
    }
}