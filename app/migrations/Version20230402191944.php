<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230402191944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pnj ADD place_id INT NOT NULL');
        $this->addSql('ALTER TABLE pnj ADD CONSTRAINT FK_FDA97F2DDA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('CREATE INDEX IDX_FDA97F2DDA6A219 ON pnj (place_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pnj DROP FOREIGN KEY FK_FDA97F2DDA6A219');
        $this->addSql('DROP INDEX IDX_FDA97F2DDA6A219 ON pnj');
        $this->addSql('ALTER TABLE pnj DROP place_id');
    }
}
