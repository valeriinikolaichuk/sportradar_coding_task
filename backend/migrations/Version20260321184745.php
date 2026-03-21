<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260321184745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY `FK_B50A2CB1AC78BCF8`');
        $this->addSql('DROP INDEX IDX_B50A2CB1AC78BCF8 ON competition');
        $this->addSql('ALTER TABLE competition CHANGE sport_id _sport_id INT NOT NULL');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB182B8F998 FOREIGN KEY (_sport_id) REFERENCES sports (id)');
        $this->addSql('CREATE INDEX IDX_B50A2CB182B8F998 ON competition (_sport_id)');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY `FK_3BAE0AA72298D193`');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY `FK_3BAE0AA745185D02`');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY `FK_3BAE0AA77B39D312`');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY `FK_3BAE0AA77E860E36`');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY `FK_3BAE0AA79C4C13F6`');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY `FK_3BAE0AA7C5237001`');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY `FK_3BAE0AA7E5CF6423`');
        $this->addSql('DROP INDEX IDX_3BAE0AA7C5237001 ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA745185D02 ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA79C4C13F6 ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA77E860E36 ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA7E5CF6423 ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA72298D193 ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA77B39D312 ON event');
        $this->addSql('ALTER TABLE event ADD _stage_id INT DEFAULT NULL, ADD _group_id INT DEFAULT NULL, ADD _stadium_id INT DEFAULT NULL, ADD _home_team_id INT DEFAULT NULL, ADD _away_team_id INT DEFAULT NULL, ADD _winner_team_id INT DEFAULT NULL, DROP stage_id, DROP group_table_id, DROP stadium_id, DROP home_team_id, DROP away_team_id, DROP winner_team_id, CHANGE competition_id _competition_id INT NOT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7A7408E9D FOREIGN KEY (_competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7C5894F3 FOREIGN KEY (_stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7D0949C27 FOREIGN KEY (_group_id) REFERENCES `groups` (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA71DCDFE4E FOREIGN KEY (_stadium_id) REFERENCES stadium (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7C617715F FOREIGN KEY (_home_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA71F433FAB FOREIGN KEY (_away_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7195A2D8E FOREIGN KEY (_winner_team_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7A7408E9D ON event (_competition_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7C5894F3 ON event (_stage_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7D0949C27 ON event (_group_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA71DCDFE4E ON event (_stadium_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7C617715F ON event (_home_team_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA71F433FAB ON event (_away_team_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7195A2D8E ON event (_winner_team_id)');
        $this->addSql('ALTER TABLE group_standing DROP FOREIGN KEY `FK_68AAC6A7296CD8AE`');
        $this->addSql('ALTER TABLE group_standing DROP FOREIGN KEY `FK_68AAC6A72F68B530`');
        $this->addSql('DROP INDEX IDX_68AAC6A72F68B530 ON group_standing');
        $this->addSql('DROP INDEX IDX_68AAC6A7296CD8AE ON group_standing');
        $this->addSql('ALTER TABLE group_standing ADD _group_id INT NOT NULL, DROP team_id, CHANGE group_id_id _team_id INT NOT NULL');
        $this->addSql('ALTER TABLE group_standing ADD CONSTRAINT FK_68AAC6A75D2439D3 FOREIGN KEY (_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE group_standing ADD CONSTRAINT FK_68AAC6A7D0949C27 FOREIGN KEY (_group_id) REFERENCES `groups` (id)');
        $this->addSql('CREATE INDEX IDX_68AAC6A75D2439D3 ON group_standing (_team_id)');
        $this->addSql('CREATE INDEX IDX_68AAC6A7D0949C27 ON group_standing (_group_id)');
        $this->addSql('ALTER TABLE `groups` DROP FOREIGN KEY `FK_F06D39702298D193`');
        $this->addSql('DROP INDEX IDX_F06D39702298D193 ON `groups`');
        $this->addSql('ALTER TABLE `groups` CHANGE stage_id _stage_id INT NOT NULL');
        $this->addSql('ALTER TABLE `groups` ADD CONSTRAINT FK_F06D3970C5894F3 FOREIGN KEY (_stage_id) REFERENCES stage (id)');
        $this->addSql('CREATE INDEX IDX_F06D3970C5894F3 ON `groups` (_stage_id)');
        $this->addSql('ALTER TABLE stadium DROP FOREIGN KEY `FK_E604044FF026BB7C`');
        $this->addSql('DROP INDEX IDX_E604044FF026BB7C ON stadium');
        $this->addSql('ALTER TABLE stadium CHANGE country_code _country_code VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE stadium ADD CONSTRAINT FK_E604044FAA7DD9D5 FOREIGN KEY (_country_code) REFERENCES country (code)');
        $this->addSql('CREATE INDEX IDX_E604044FAA7DD9D5 ON stadium (_country_code)');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY `FK_C4E0A61FF026BB7C`');
        $this->addSql('DROP INDEX IDX_C4E0A61FF026BB7C ON team');
        $this->addSql('ALTER TABLE team CHANGE country_code _country_code VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FAA7DD9D5 FOREIGN KEY (_country_code) REFERENCES country (code)');
        $this->addSql('CREATE INDEX IDX_C4E0A61FAA7DD9D5 ON team (_country_code)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB182B8F998');
        $this->addSql('DROP INDEX IDX_B50A2CB182B8F998 ON competition');
        $this->addSql('ALTER TABLE competition CHANGE _sport_id sport_id INT NOT NULL');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT `FK_B50A2CB1AC78BCF8` FOREIGN KEY (sport_id) REFERENCES sports (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_B50A2CB1AC78BCF8 ON competition (sport_id)');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7A7408E9D');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7C5894F3');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7D0949C27');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA71DCDFE4E');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7C617715F');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA71F433FAB');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7195A2D8E');
        $this->addSql('DROP INDEX IDX_3BAE0AA7A7408E9D ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA7C5894F3 ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA7D0949C27 ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA71DCDFE4E ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA7C617715F ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA71F433FAB ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA7195A2D8E ON event');
        $this->addSql('ALTER TABLE event ADD stage_id INT DEFAULT NULL, ADD group_table_id INT DEFAULT NULL, ADD stadium_id INT DEFAULT NULL, ADD home_team_id INT DEFAULT NULL, ADD away_team_id INT DEFAULT NULL, ADD winner_team_id INT DEFAULT NULL, DROP _stage_id, DROP _group_id, DROP _stadium_id, DROP _home_team_id, DROP _away_team_id, DROP _winner_team_id, CHANGE _competition_id competition_id INT NOT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT `FK_3BAE0AA72298D193` FOREIGN KEY (stage_id) REFERENCES stage (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT `FK_3BAE0AA745185D02` FOREIGN KEY (away_team_id) REFERENCES team (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT `FK_3BAE0AA77B39D312` FOREIGN KEY (competition_id) REFERENCES competition (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT `FK_3BAE0AA77E860E36` FOREIGN KEY (stadium_id) REFERENCES stadium (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT `FK_3BAE0AA79C4C13F6` FOREIGN KEY (home_team_id) REFERENCES team (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT `FK_3BAE0AA7C5237001` FOREIGN KEY (winner_team_id) REFERENCES team (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT `FK_3BAE0AA7E5CF6423` FOREIGN KEY (group_table_id) REFERENCES `groups` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7C5237001 ON event (winner_team_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA745185D02 ON event (away_team_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA79C4C13F6 ON event (home_team_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA77E860E36 ON event (stadium_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7E5CF6423 ON event (group_table_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA72298D193 ON event (stage_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA77B39D312 ON event (competition_id)');
        $this->addSql('ALTER TABLE group_standing DROP FOREIGN KEY FK_68AAC6A75D2439D3');
        $this->addSql('ALTER TABLE group_standing DROP FOREIGN KEY FK_68AAC6A7D0949C27');
        $this->addSql('DROP INDEX IDX_68AAC6A75D2439D3 ON group_standing');
        $this->addSql('DROP INDEX IDX_68AAC6A7D0949C27 ON group_standing');
        $this->addSql('ALTER TABLE group_standing ADD team_id INT DEFAULT NULL, ADD group_id_id INT NOT NULL, DROP _team_id, DROP _group_id');
        $this->addSql('ALTER TABLE group_standing ADD CONSTRAINT `FK_68AAC6A7296CD8AE` FOREIGN KEY (team_id) REFERENCES team (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE group_standing ADD CONSTRAINT `FK_68AAC6A72F68B530` FOREIGN KEY (group_id_id) REFERENCES `groups` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_68AAC6A72F68B530 ON group_standing (group_id_id)');
        $this->addSql('CREATE INDEX IDX_68AAC6A7296CD8AE ON group_standing (team_id)');
        $this->addSql('ALTER TABLE `groups` DROP FOREIGN KEY FK_F06D3970C5894F3');
        $this->addSql('DROP INDEX IDX_F06D3970C5894F3 ON `groups`');
        $this->addSql('ALTER TABLE `groups` CHANGE _stage_id stage_id INT NOT NULL');
        $this->addSql('ALTER TABLE `groups` ADD CONSTRAINT `FK_F06D39702298D193` FOREIGN KEY (stage_id) REFERENCES stage (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F06D39702298D193 ON `groups` (stage_id)');
        $this->addSql('ALTER TABLE stadium DROP FOREIGN KEY FK_E604044FAA7DD9D5');
        $this->addSql('DROP INDEX IDX_E604044FAA7DD9D5 ON stadium');
        $this->addSql('ALTER TABLE stadium CHANGE _country_code country_code VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE stadium ADD CONSTRAINT `FK_E604044FF026BB7C` FOREIGN KEY (country_code) REFERENCES country (code) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E604044FF026BB7C ON stadium (country_code)');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FAA7DD9D5');
        $this->addSql('DROP INDEX IDX_C4E0A61FAA7DD9D5 ON team');
        $this->addSql('ALTER TABLE team CHANGE _country_code country_code VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT `FK_C4E0A61FF026BB7C` FOREIGN KEY (country_code) REFERENCES country (code) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C4E0A61FF026BB7C ON team (country_code)');
    }
}
