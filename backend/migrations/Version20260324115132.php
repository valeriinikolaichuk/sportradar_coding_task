<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260324115132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event CHANGE status status ENUM(\'scheduled\', \'played\') NOT NULL, CHANGE home_score home_score INT DEFAULT 0 NOT NULL, CHANGE away_score away_score INT DEFAULT 0 NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event CHANGE status status ENUM(\'scheduled\', \'played\') NOT NULL, CHANGE home_score home_score INT DEFAULT NULL, CHANGE away_score away_score INT DEFAULT NULL');
    }
}
