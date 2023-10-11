<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231011083310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE camera_roll (id INT AUTO_INCREMENT NOT NULL, client_id_id INT NOT NULL, size_id INT NOT NULL, paper_size_id INT NOT NULL, type_id INT NOT NULL, shipment_id INT NOT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, INDEX IDX_A45E4E82DC2902E0 (client_id_id), INDEX IDX_A45E4E82498DA827 (size_id), INDEX IDX_A45E4E824929FAC6 (paper_size_id), INDEX IDX_A45E4E82C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE camera_roll_paper_size (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE camera_roll_size (id INT AUTO_INCREMENT NOT NULL, size INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE camera_roll_type (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, active SMALLINT NOT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, camera_roll_id INT NOT NULL, image_name VARCHAR(255) DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, INDEX IDX_14B7841866D91402 (camera_roll_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE postal_adress (id INT AUTO_INCREMENT NOT NULL, client_id_id INT NOT NULL, street_adress VARCHAR(255) NOT NULL, town VARCHAR(255) NOT NULL, postal_code VARCHAR(20) NOT NULL, province VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, INDEX IDX_83CB073FDC2902E0 (client_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shipment (id INT AUTO_INCREMENT NOT NULL, camera_roll_id_id INT NOT NULL, state VARCHAR(255) DEFAULT NULL, price INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_2CB20DCB464AC1D (camera_roll_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE camera_roll ADD CONSTRAINT FK_A45E4E82DC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE camera_roll ADD CONSTRAINT FK_A45E4E82498DA827 FOREIGN KEY (size_id) REFERENCES camera_roll_size (id)');
        $this->addSql('ALTER TABLE camera_roll ADD CONSTRAINT FK_A45E4E824929FAC6 FOREIGN KEY (paper_size_id) REFERENCES camera_roll_paper_size (id)');
        $this->addSql('ALTER TABLE camera_roll ADD CONSTRAINT FK_A45E4E82C54C8C93 FOREIGN KEY (type_id) REFERENCES camera_roll_type (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841866D91402 FOREIGN KEY (camera_roll_id) REFERENCES camera_roll (id)');
        $this->addSql('ALTER TABLE postal_adress ADD CONSTRAINT FK_83CB073FDC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE shipment ADD CONSTRAINT FK_2CB20DCB464AC1D FOREIGN KEY (camera_roll_id_id) REFERENCES camera_roll (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE camera_roll DROP FOREIGN KEY FK_A45E4E82DC2902E0');
        $this->addSql('ALTER TABLE camera_roll DROP FOREIGN KEY FK_A45E4E82498DA827');
        $this->addSql('ALTER TABLE camera_roll DROP FOREIGN KEY FK_A45E4E824929FAC6');
        $this->addSql('ALTER TABLE camera_roll DROP FOREIGN KEY FK_A45E4E82C54C8C93');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B7841866D91402');
        $this->addSql('ALTER TABLE postal_adress DROP FOREIGN KEY FK_83CB073FDC2902E0');
        $this->addSql('ALTER TABLE shipment DROP FOREIGN KEY FK_2CB20DCB464AC1D');
        $this->addSql('DROP TABLE camera_roll');
        $this->addSql('DROP TABLE camera_roll_paper_size');
        $this->addSql('DROP TABLE camera_roll_size');
        $this->addSql('DROP TABLE camera_roll_type');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE postal_adress');
        $this->addSql('DROP TABLE shipment');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
