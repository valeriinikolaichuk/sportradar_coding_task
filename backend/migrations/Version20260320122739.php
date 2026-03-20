<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260320122739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, match_date DATETIME NOT NULL, status VARCHAR(20) DEFAULT NULL, home_score INT DEFAULT NULL, away_score INT DEFAULT NULL, competition_id INT DEFAULT NULL, stage_id INT DEFAULT NULL, INDEX IDX_3BAE0AA77B39D312 (competition_id), INDEX IDX_3BAE0AA72298D193 (stage_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA77B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA72298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA77B39D312');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA72298D193');
        $this->addSql('DROP TABLE event');
    }
}
