<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230521201150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE place_story_freak (place_story_id INT NOT NULL, freak_id INT NOT NULL, INDEX IDX_2B491E1D8006A7B5 (place_story_id), INDEX IDX_2B491E1D811D1B63 (freak_id), PRIMARY KEY(place_story_id, freak_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE place_story_freak ADD CONSTRAINT FK_2B491E1D8006A7B5 FOREIGN KEY (place_story_id) REFERENCES place_story (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_story_freak ADD CONSTRAINT FK_2B491E1D811D1B63 FOREIGN KEY (freak_id) REFERENCES freak (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place_story_freak DROP FOREIGN KEY FK_2B491E1D8006A7B5');
        $this->addSql('ALTER TABLE place_story_freak DROP FOREIGN KEY FK_2B491E1D811D1B63');
        $this->addSql('DROP TABLE place_story_freak');
    }
}
