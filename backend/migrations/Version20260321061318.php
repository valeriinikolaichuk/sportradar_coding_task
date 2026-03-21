<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260321061318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD message LONGTEXT DEFAULT NULL, ADD goals JSON DEFAULT NULL, ADD yellow_cards JSON DEFAULT NULL, ADD second_yellow_cards JSON DEFAULT NULL, ADD direct_red_cards JSON DEFAULT NULL, ADD score_by_periods JSON DEFAULT NULL, ADD winner_team_id INT DEFAULT NULL, DROP winner');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7C5237001 FOREIGN KEY (winner_team_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7C5237001 ON event (winner_team_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7C5237001');
        $this->addSql('DROP INDEX IDX_3BAE0AA7C5237001 ON event');
        $this->addSql('ALTER TABLE event ADD winner VARCHAR(150) DEFAULT NULL, DROP message, DROP goals, DROP yellow_cards, DROP second_yellow_cards, DROP direct_red_cards, DROP score_by_periods, DROP winner_team_id');
    }
}
