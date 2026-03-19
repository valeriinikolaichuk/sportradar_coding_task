<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260319184524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, season VARCHAR(20) NOT NULL, external_id_sportradar VARCHAR(50) DEFAULT NULL, external_id_anotherapi VARCHAR(50) DEFAULT NULL, sport_id INT NOT NULL, UNIQUE INDEX UNIQ_B50A2CB1ACFA9935 (external_id_sportradar), UNIQUE INDEX UNIQ_B50A2CB1B37C3D2D (external_id_anotherapi), INDEX IDX_B50A2CB1AC78BCF8 (sport_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sports (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB1AC78BCF8');
        $this->addSql('DROP TABLE competition');
    }
}
