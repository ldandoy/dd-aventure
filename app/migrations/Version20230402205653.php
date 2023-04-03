<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230402205653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pnj ADD job_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pnj ADD CONSTRAINT FK_FDA97F2DBE04EA9 FOREIGN KEY (job_id) REFERENCES job (id)');
        $this->addSql('CREATE INDEX IDX_FDA97F2DBE04EA9 ON pnj (job_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pnj DROP FOREIGN KEY FK_FDA97F2DBE04EA9');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP INDEX IDX_FDA97F2DBE04EA9 ON pnj');
        $this->addSql('ALTER TABLE pnj DROP job_id');
    }
}
