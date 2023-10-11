<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231011074444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE shipment (id INT AUTO_INCREMENT NOT NULL, camera_roll_id_id INT NOT NULL, state VARCHAR(255) DEFAULT NULL, price INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_2CB20DCB464AC1D (camera_roll_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shipment ADD CONSTRAINT FK_2CB20DCB464AC1D FOREIGN KEY (camera_roll_id_id) REFERENCES camera_roll (id)');
        $this->addSql('ALTER TABLE camera_roll ADD shipment_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shipment DROP FOREIGN KEY FK_2CB20DCB464AC1D');
        $this->addSql('DROP TABLE shipment');
        $this->addSql('ALTER TABLE camera_roll DROP shipment_id');
    }
}
