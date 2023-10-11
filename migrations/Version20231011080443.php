<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231011080443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE camera_roll_type (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE camera_roll ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE camera_roll ADD CONSTRAINT FK_A45E4E82C54C8C93 FOREIGN KEY (type_id) REFERENCES camera_roll_type (id)');
        $this->addSql('CREATE INDEX IDX_A45E4E82C54C8C93 ON camera_roll (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE camera_roll DROP FOREIGN KEY FK_A45E4E82C54C8C93');
        $this->addSql('DROP TABLE camera_roll_type');
        $this->addSql('DROP INDEX IDX_A45E4E82C54C8C93 ON camera_roll');
        $this->addSql('ALTER TABLE camera_roll DROP type_id');
    }
}
