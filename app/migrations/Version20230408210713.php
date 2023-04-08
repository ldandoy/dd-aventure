<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230408210713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE perso_quest (perso_id INT NOT NULL, quest_id INT NOT NULL, INDEX IDX_5BF2D82F1221E019 (perso_id), INDEX IDX_5BF2D82F209E9EF4 (quest_id), PRIMARY KEY(perso_id, quest_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE perso_quest ADD CONSTRAINT FK_5BF2D82F1221E019 FOREIGN KEY (perso_id) REFERENCES perso (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE perso_quest ADD CONSTRAINT FK_5BF2D82F209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE perso_quest DROP FOREIGN KEY FK_5BF2D82F1221E019');
        $this->addSql('ALTER TABLE perso_quest DROP FOREIGN KEY FK_5BF2D82F209E9EF4');
        $this->addSql('DROP TABLE perso_quest');
    }
}
