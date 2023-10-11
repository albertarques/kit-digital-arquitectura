<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231011075418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE camera_roll_size (id INT AUTO_INCREMENT NOT NULL, size INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE camera_roll ADD size_id INT NOT NULL');
        $this->addSql('ALTER TABLE camera_roll ADD CONSTRAINT FK_A45E4E82498DA827 FOREIGN KEY (size_id) REFERENCES camera_roll_size (id)');
        $this->addSql('CREATE INDEX IDX_A45E4E82498DA827 ON camera_roll (size_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE camera_roll DROP FOREIGN KEY FK_A45E4E82498DA827');
        $this->addSql('DROP TABLE camera_roll_size');
        $this->addSql('DROP INDEX IDX_A45E4E82498DA827 ON camera_roll');
        $this->addSql('ALTER TABLE camera_roll DROP size_id');
    }
}
