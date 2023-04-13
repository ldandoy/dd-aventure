<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413200023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, puissance INT NOT NULL, vitesse INT NOT NULL, dexterite INT NOT NULL, charisme INT NOT NULL, intelligence INT NOT NULL, constitution INT NOT NULL, sagesse INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE perso ADD race_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE perso ADD CONSTRAINT FK_BD62FA216E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('CREATE INDEX IDX_BD62FA216E59D40D ON perso (race_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE perso DROP FOREIGN KEY FK_BD62FA216E59D40D');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP INDEX IDX_BD62FA216E59D40D ON perso');
        $this->addSql('ALTER TABLE perso DROP race_id');
    }
}
