<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230407213115 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE perso_item (id INT AUTO_INCREMENT NOT NULL, perso_id INT DEFAULT NULL, item_id INT DEFAULT NULL, qte INT NOT NULL, INDEX IDX_4D7C6AC91221E019 (perso_id), INDEX IDX_4D7C6AC9126F525E (item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE perso_item ADD CONSTRAINT FK_4D7C6AC91221E019 FOREIGN KEY (perso_id) REFERENCES perso (id)');
        $this->addSql('ALTER TABLE perso_item ADD CONSTRAINT FK_4D7C6AC9126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE perso_item DROP FOREIGN KEY FK_4D7C6AC91221E019');
        $this->addSql('ALTER TABLE perso_item DROP FOREIGN KEY FK_4D7C6AC9126F525E');
        $this->addSql('DROP TABLE perso_item');
    }
}
