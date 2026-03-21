<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260321053501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE group_standing (id INT AUTO_INCREMENT NOT NULL, position INT DEFAULT NULL, team_id INT DEFAULT NULL, group_id_id INT NOT NULL, INDEX IDX_68AAC6A7296CD8AE (team_id), INDEX IDX_68AAC6A72F68B530 (group_id_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE group_standing ADD CONSTRAINT FK_68AAC6A7296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE group_standing ADD CONSTRAINT FK_68AAC6A72F68B530 FOREIGN KEY (group_id_id) REFERENCES `groups` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE group_standing DROP FOREIGN KEY FK_68AAC6A7296CD8AE');
        $this->addSql('ALTER TABLE group_standing DROP FOREIGN KEY FK_68AAC6A72F68B530');
        $this->addSql('DROP TABLE group_standing');
    }
}
