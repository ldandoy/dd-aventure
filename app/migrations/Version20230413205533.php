<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413205533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place_test DROP FOREIGN KEY FK_12CA0EE0DA6A219');
        $this->addSql('DROP INDEX IDX_12CA0EE0DA6A219 ON place_test');
        $this->addSql('ALTER TABLE place_test ADD place_story_id INT NOT NULL, DROP place_id');
        $this->addSql('ALTER TABLE place_test ADD CONSTRAINT FK_12CA0EE08006A7B5 FOREIGN KEY (place_story_id) REFERENCES place_story (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_12CA0EE08006A7B5 ON place_test (place_story_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place_test DROP FOREIGN KEY FK_12CA0EE08006A7B5');
        $this->addSql('DROP INDEX UNIQ_12CA0EE08006A7B5 ON place_test');
        $this->addSql('ALTER TABLE place_test ADD place_id INT DEFAULT NULL, DROP place_story_id');
        $this->addSql('ALTER TABLE place_test ADD CONSTRAINT FK_12CA0EE0DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_12CA0EE0DA6A219 ON place_test (place_id)');
    }
}
