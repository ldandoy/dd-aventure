<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413203426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE place_test (id INT AUTO_INCREMENT NOT NULL, place_id INT DEFAULT NULL, description LONGTEXT NOT NULL, difficulty INT NOT NULL, skill VARCHAR(255) NOT NULL, text_successed LONGTEXT NOT NULL, text_failed LONGTEXT NOT NULL, xp INT NOT NULL, INDEX IDX_12CA0EE0DA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE place_test ADD CONSTRAINT FK_12CA0EE0DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE perso ADD xp INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place_test DROP FOREIGN KEY FK_12CA0EE0DA6A219');
        $this->addSql('DROP TABLE place_test');
        $this->addSql('ALTER TABLE perso DROP xp');
    }
}
