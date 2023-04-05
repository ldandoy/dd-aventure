<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230405124447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quest (id INT AUTO_INCREMENT NOT NULL, pnj_id INT DEFAULT NULL, place_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, xp INT NOT NULL, INDEX IDX_4317F81751796E0B (pnj_id), INDEX IDX_4317F817DA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quest_step (id INT AUTO_INCREMENT NOT NULL, quest_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_4DB352CE209E9EF4 (quest_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quest ADD CONSTRAINT FK_4317F81751796E0B FOREIGN KEY (pnj_id) REFERENCES pnj (id)');
        $this->addSql('ALTER TABLE quest ADD CONSTRAINT FK_4317F817DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE quest_step ADD CONSTRAINT FK_4DB352CE209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quest DROP FOREIGN KEY FK_4317F81751796E0B');
        $this->addSql('ALTER TABLE quest DROP FOREIGN KEY FK_4317F817DA6A219');
        $this->addSql('ALTER TABLE quest_step DROP FOREIGN KEY FK_4DB352CE209E9EF4');
        $this->addSql('DROP TABLE quest');
        $this->addSql('DROP TABLE quest_step');
    }
}
