<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260320164357 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD match_time TIME DEFAULT NULL, ADD winner VARCHAR(150) DEFAULT NULL, ADD stadium_id INT DEFAULT NULL, ADD home_team_id INT NOT NULL, ADD away_team_id INT NOT NULL, CHANGE match_date match_date DATE NOT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA77E860E36 FOREIGN KEY (stadium_id) REFERENCES stadium (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA79C4C13F6 FOREIGN KEY (home_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA745185D02 FOREIGN KEY (away_team_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA77E860E36 ON event (stadium_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA79C4C13F6 ON event (home_team_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA745185D02 ON event (away_team_id)');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY `FK_C4E0A61F2298D193`');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY `FK_C4E0A61F45185D02`');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY `FK_C4E0A61F7B39D312`');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY `FK_C4E0A61F9C4C13F6`');
        $this->addSql('DROP INDEX IDX_C4E0A61F2298D193 ON team');
        $this->addSql('DROP INDEX IDX_C4E0A61F45185D02 ON team');
        $this->addSql('DROP INDEX IDX_C4E0A61F7B39D312 ON team');
        $this->addSql('DROP INDEX IDX_C4E0A61F9C4C13F6 ON team');
        $this->addSql('ALTER TABLE team DROP home_team_id, DROP away_team_id, DROP competition_id, DROP stage_id, CHANGE country_code country_code VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FF026BB7C FOREIGN KEY (country_code) REFERENCES country (code)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C4E0A61F989D9B62 ON team (slug)');
        $this->addSql('CREATE INDEX IDX_C4E0A61FF026BB7C ON team (country_code)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA77E860E36');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA79C4C13F6');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA745185D02');
        $this->addSql('DROP INDEX IDX_3BAE0AA77E860E36 ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA79C4C13F6 ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA745185D02 ON event');
        $this->addSql('ALTER TABLE event DROP match_time, DROP winner, DROP stadium_id, DROP home_team_id, DROP away_team_id, CHANGE match_date match_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FF026BB7C');
        $this->addSql('DROP INDEX UNIQ_C4E0A61F989D9B62 ON team');
        $this->addSql('DROP INDEX IDX_C4E0A61FF026BB7C ON team');
        $this->addSql('ALTER TABLE team ADD home_team_id INT NOT NULL, ADD away_team_id INT NOT NULL, ADD competition_id INT NOT NULL, ADD stage_id INT NOT NULL, CHANGE country_code country_code VARCHAR(5) NOT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT `FK_C4E0A61F2298D193` FOREIGN KEY (stage_id) REFERENCES stage (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT `FK_C4E0A61F45185D02` FOREIGN KEY (away_team_id) REFERENCES team (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT `FK_C4E0A61F7B39D312` FOREIGN KEY (competition_id) REFERENCES competition (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT `FK_C4E0A61F9C4C13F6` FOREIGN KEY (home_team_id) REFERENCES team (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C4E0A61F2298D193 ON team (stage_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F45185D02 ON team (away_team_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F7B39D312 ON team (competition_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F9C4C13F6 ON team (home_team_id)');
    }
}
