<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260320144316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (code VARCHAR(5) NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY (code)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE `groups` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, stage_id INT NOT NULL, INDEX IDX_F06D39702298D193 (stage_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE stadium (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, city VARCHAR(100) DEFAULT NULL, event_group VARCHAR(255) NOT NULL, country_code VARCHAR(5) DEFAULT NULL, INDEX IDX_E604044FF026BB7C (country_code), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE `groups` ADD CONSTRAINT FK_F06D39702298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE stadium ADD CONSTRAINT FK_E604044FF026BB7C FOREIGN KEY (country_code) REFERENCES country (code)');
        $this->addSql('ALTER TABLE event ADD group_table_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7E5CF6423 FOREIGN KEY (group_table_id) REFERENCES `groups` (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7E5CF6423 ON event (group_table_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `groups` DROP FOREIGN KEY FK_F06D39702298D193');
        $this->addSql('ALTER TABLE stadium DROP FOREIGN KEY FK_E604044FF026BB7C');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE `groups`');
        $this->addSql('DROP TABLE stadium');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7E5CF6423');
        $this->addSql('DROP INDEX IDX_3BAE0AA7E5CF6423 ON event');
        $this->addSql('ALTER TABLE event DROP group_table_id');
    }
}
