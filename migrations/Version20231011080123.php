<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231011080123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE camera_roll_paper_size (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE camera_roll ADD paper_size_id INT NOT NULL');
        $this->addSql('ALTER TABLE camera_roll ADD CONSTRAINT FK_A45E4E824929FAC6 FOREIGN KEY (paper_size_id) REFERENCES camera_roll_paper_size (id)');
        $this->addSql('CREATE INDEX IDX_A45E4E824929FAC6 ON camera_roll (paper_size_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE camera_roll DROP FOREIGN KEY FK_A45E4E824929FAC6');
        $this->addSql('DROP TABLE camera_roll_paper_size');
        $this->addSql('DROP INDEX IDX_A45E4E824929FAC6 ON camera_roll');
        $this->addSql('ALTER TABLE camera_roll DROP paper_size_id');
    }
}
