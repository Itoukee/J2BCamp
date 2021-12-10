<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211210142047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bills (id INT AUTO_INCREMENT NOT NULL, id_company_id INT DEFAULT NULL, id_training_id INT DEFAULT NULL, num_stage INT NOT NULL, bdc VARCHAR(50) NOT NULL, INDEX IDX_22775DD032119A01 (id_company_id), INDEX IDX_22775DD0A6EF5526 (id_training_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE companies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, phone_number VARCHAR(12) NOT NULL, siret VARCHAR(14) NOT NULL, adress VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permissions (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(99) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trainings (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, name_comedian VARCHAR(50) NOT NULL, price INT NOT NULL, duration INT NOT NULL, description VARCHAR(300) DEFAULT NULL, adress VARCHAR(255) NOT NULL, date_begin DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD032119A01 FOREIGN KEY (id_company_id) REFERENCES companies (id)');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0A6EF5526 FOREIGN KEY (id_training_id) REFERENCES trainings (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD032119A01');
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD0A6EF5526');
        $this->addSql('DROP TABLE bills');
        $this->addSql('DROP TABLE companies');
        $this->addSql('DROP TABLE permissions');
        $this->addSql('DROP TABLE trainings');
    }
}
