<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211216105254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bills (id INT AUTO_INCREMENT NOT NULL, training_id INT DEFAULT NULL, company_id INT NOT NULL, comedian_id INT NOT NULL, case_number VARCHAR(50) NOT NULL, num_stage VARCHAR(50) NOT NULL, bdc VARCHAR(50) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL, paid TINYINT(1) NOT NULL, inter_date DATE NOT NULL, INDEX IDX_22775DD0BEFD98D1 (training_id), INDEX IDX_22775DD0979B1AD6 (company_id), INDEX IDX_22775DD01D3228F (comedian_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comedian_documents (id INT AUTO_INCREMENT NOT NULL, comedian_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE companies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, phone_number VARCHAR(12) NOT NULL, siret VARCHAR(14) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', street_number INT NOT NULL, route VARCHAR(255) NOT NULL, locality VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, lat DOUBLE PRECISION NOT NULL, lng DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permissions (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(99) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_has_permission (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, permission_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, user_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trainings (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, price INT NOT NULL, duration INT NOT NULL, description VARCHAR(300) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, phone_number VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, street_number INT DEFAULT NULL, route VARCHAR(255) DEFAULT NULL, locality VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, lat DOUBLE PRECISION DEFAULT NULL, lng DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D6496B01BC5B (phone_number), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0BEFD98D1 FOREIGN KEY (training_id) REFERENCES trainings (id)');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0979B1AD6 FOREIGN KEY (company_id) REFERENCES companies (id)');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD01D3228F FOREIGN KEY (comedian_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD0979B1AD6');
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD0BEFD98D1');
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD01D3228F');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE bills');
        $this->addSql('DROP TABLE comedian_documents');
        $this->addSql('DROP TABLE companies');
        $this->addSql('DROP TABLE permissions');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE role_has_permission');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE trainings');
        $this->addSql('DROP TABLE user');
    }
}
