<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260321093612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE external_api CHANGE competition_id competition_id_key VARCHAR(50) NOT NULL, CHANGE competition_name competition_name_key VARCHAR(150) DEFAULT NULL, CHANGE winner winner_key VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE external_api CHANGE competition_id_key competition_id VARCHAR(50) NOT NULL, CHANGE competition_name_key competition_name VARCHAR(150) DEFAULT NULL, CHANGE winner_key winner VARCHAR(50) DEFAULT NULL');
    }
}
