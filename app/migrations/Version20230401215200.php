<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230401215200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE perso ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE perso ADD CONSTRAINT FK_BD62FA21A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BD62FA21A76ED395 ON perso (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE perso DROP FOREIGN KEY FK_BD62FA21A76ED395');
        $this->addSql('DROP INDEX IDX_BD62FA21A76ED395 ON perso');
        $this->addSql('ALTER TABLE perso DROP user_id');
    }
}
