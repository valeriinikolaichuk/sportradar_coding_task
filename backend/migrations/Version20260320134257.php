<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260320134257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, official_name VARCHAR(150) NOT NULL, slug VARCHAR(100) NOT NULL, abbreviation VARCHAR(10) DEFAULT NULL, country_code VARCHAR(5) NOT NULL, home_team_id INT NOT NULL, away_team_id INT NOT NULL, competition_id INT NOT NULL, stage_id INT NOT NULL, INDEX IDX_C4E0A61F9C4C13F6 (home_team_id), INDEX IDX_C4E0A61F45185D02 (away_team_id), INDEX IDX_C4E0A61F7B39D312 (competition_id), INDEX IDX_C4E0A61F2298D193 (stage_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F9C4C13F6 FOREIGN KEY (home_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F45185D02 FOREIGN KEY (away_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F9C4C13F6');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F45185D02');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F7B39D312');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F2298D193');
        $this->addSql('DROP TABLE team');
    }
}
