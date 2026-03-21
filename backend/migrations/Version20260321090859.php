<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260321090859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allowed_external_id (id INT AUTO_INCREMENT NOT NULL, competition_id VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE external_api (id INT AUTO_INCREMENT NOT NULL, api_name VARCHAR(50) NOT NULL, competition_id VARCHAR(50) NOT NULL, competition_name VARCHAR(150) DEFAULT NULL, winner VARCHAR(50) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('DROP INDEX UNIQ_B50A2CB1ACFA9935 ON competition');
        $this->addSql('DROP INDEX UNIQ_B50A2CB1B37C3D2D ON competition');
        $this->addSql('ALTER TABLE competition ADD external_id VARCHAR(50) NOT NULL, DROP external_id_sportradar, DROP external_id_anotherapi');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B50A2CB19F75D7B0 ON competition (external_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE allowed_external_id');
        $this->addSql('DROP TABLE external_api');
        $this->addSql('DROP INDEX UNIQ_B50A2CB19F75D7B0 ON competition');
        $this->addSql('ALTER TABLE competition ADD external_id_sportradar VARCHAR(50) DEFAULT NULL, ADD external_id_anotherapi VARCHAR(50) DEFAULT NULL, DROP external_id');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B50A2CB1ACFA9935 ON competition (external_id_sportradar)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B50A2CB1B37C3D2D ON competition (external_id_anotherapi)');
    }
}
