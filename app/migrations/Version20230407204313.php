<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230407204313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item_place (item_id INT NOT NULL, place_id INT NOT NULL, INDEX IDX_5EBA481D126F525E (item_id), INDEX IDX_5EBA481DDA6A219 (place_id), PRIMARY KEY(item_id, place_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item_place ADD CONSTRAINT FK_5EBA481D126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_place ADD CONSTRAINT FK_5EBA481DDA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item_place DROP FOREIGN KEY FK_5EBA481D126F525E');
        $this->addSql('ALTER TABLE item_place DROP FOREIGN KEY FK_5EBA481DDA6A219');
        $this->addSql('DROP TABLE item_place');
    }
}
