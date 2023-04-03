<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230402192528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE perso ADD place_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE perso ADD CONSTRAINT FK_BD62FA21DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('CREATE INDEX IDX_BD62FA21DA6A219 ON perso (place_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE perso DROP FOREIGN KEY FK_BD62FA21DA6A219');
        $this->addSql('DROP INDEX IDX_BD62FA21DA6A219 ON perso');
        $this->addSql('ALTER TABLE perso DROP place_id');
    }
}
