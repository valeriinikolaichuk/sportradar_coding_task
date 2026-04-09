<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260409000100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Move season from competition to event';
    }

    public function up(Schema $schema): void
    {
        // 1. add column to event (same type as competition)
        $this->addSql('ALTER TABLE event ADD season VARCHAR(20) DEFAULT NULL');

        // 2. backfill data from competition
        $this->addSql('
            UPDATE event e
            INNER JOIN competition c ON e.competition_id = c.id
            SET e.season = c.season
        ');

        // 3. (optional) enforce NOT NULL if needed
        $this->addSql('ALTER TABLE event MODIFY season VARCHAR(20) NOT NULL');

        // 4. remove from competition (ONLY if you're sure)
        $this->addSql('ALTER TABLE competition DROP COLUMN season');
    }

    public function down(Schema $schema): void
    {
        // rollback: add back to competition
        $this->addSql('ALTER TABLE competition ADD season VARCHAR(20) DEFAULT NULL');

        // restore data (best-effort rollback)
        $this->addSql('
            UPDATE competition c
            INNER JOIN event e ON e.competition_id = c.id
            SET c.season = e.season
        ');

        $this->addSql('ALTER TABLE event DROP COLUMN season');
    }
}