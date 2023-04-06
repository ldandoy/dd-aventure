<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230406210522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place_story ADD place_id INT NOT NULL');
        $this->addSql('ALTER TABLE place_story ADD CONSTRAINT FK_42201F1BDA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('CREATE INDEX IDX_42201F1BDA6A219 ON place_story (place_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place_story DROP FOREIGN KEY FK_42201F1BDA6A219');
        $this->addSql('DROP INDEX IDX_42201F1BDA6A219 ON place_story');
        $this->addSql('ALTER TABLE place_story DROP place_id');
    }
}
