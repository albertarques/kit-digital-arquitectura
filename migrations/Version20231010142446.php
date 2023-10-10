<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231010142446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE camera_roll (id INT AUTO_INCREMENT NOT NULL, client_id_id INT NOT NULL, INDEX IDX_A45E4E82DC2902E0 (client_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE postal_adress (id INT AUTO_INCREMENT NOT NULL, client_id_id INT NOT NULL, street_adress VARCHAR(255) NOT NULL, town VARCHAR(255) NOT NULL, postal_code VARCHAR(20) NOT NULL, province VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_83CB073FDC2902E0 (client_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE camera_roll ADD CONSTRAINT FK_A45E4E82DC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE postal_adress ADD CONSTRAINT FK_83CB073FDC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE camera_roll DROP FOREIGN KEY FK_A45E4E82DC2902E0');
        $this->addSql('ALTER TABLE postal_adress DROP FOREIGN KEY FK_83CB073FDC2902E0');
        $this->addSql('DROP TABLE camera_roll');
        $this->addSql('DROP TABLE postal_adress');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
