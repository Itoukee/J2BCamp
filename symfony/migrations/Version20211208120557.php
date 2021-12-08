<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211208120557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bills (id INT AUTO_INCREMENT NOT NULL, id_company_id INT DEFAULT NULL, id_training_id INT DEFAULT NULL, num_stage INT NOT NULL, bdc VARCHAR(50) NOT NULL, INDEX IDX_22775DD032119A01 (id_company_id), INDEX IDX_22775DD0A6EF5526 (id_training_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD032119A01 FOREIGN KEY (id_company_id) REFERENCES companies (id)');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0A6EF5526 FOREIGN KEY (id_training_id) REFERENCES trainings (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bills');
    }
}
