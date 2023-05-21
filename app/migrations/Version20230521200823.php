<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230521200823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE freak_place (freak_id INT NOT NULL, place_id INT NOT NULL, INDEX IDX_EDB9DA11811D1B63 (freak_id), INDEX IDX_EDB9DA11DA6A219 (place_id), PRIMARY KEY(freak_id, place_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE freak_place ADD CONSTRAINT FK_EDB9DA11811D1B63 FOREIGN KEY (freak_id) REFERENCES freak (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE freak_place ADD CONSTRAINT FK_EDB9DA11DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE freak_place DROP FOREIGN KEY FK_EDB9DA11811D1B63');
        $this->addSql('ALTER TABLE freak_place DROP FOREIGN KEY FK_EDB9DA11DA6A219');
        $this->addSql('DROP TABLE freak_place');
    }
}
