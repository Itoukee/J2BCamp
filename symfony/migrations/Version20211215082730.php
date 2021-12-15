<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211215082730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD0161BA2FF');
        $this->addSql('DROP INDEX IDX_22775DD0161BA2FF ON bills');
        $this->addSql('ALTER TABLE bills CHANGE num_stage num_stage VARCHAR(50) NOT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE trainings_id training_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0BEFD98D1 FOREIGN KEY (training_id) REFERENCES trainings (id)');
        $this->addSql('CREATE INDEX IDX_22775DD0BEFD98D1 ON bills (training_id)');
        $this->addSql('ALTER TABLE companies ADD street_number INT NOT NULL, ADD route VARCHAR(255) NOT NULL, ADD locality VARCHAR(255) NOT NULL, ADD country VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD street_number INT DEFAULT NULL, ADD route VARCHAR(255) DEFAULT NULL, ADD locality VARCHAR(255) DEFAULT NULL, ADD country VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD0BEFD98D1');
        $this->addSql('DROP INDEX IDX_22775DD0BEFD98D1 ON bills');
        $this->addSql('ALTER TABLE bills CHANGE num_stage num_stage INT NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL, CHANGE training_id trainings_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0161BA2FF FOREIGN KEY (trainings_id) REFERENCES trainings (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_22775DD0161BA2FF ON bills (trainings_id)');
        $this->addSql('ALTER TABLE companies DROP street_number, DROP route, DROP locality, DROP country');
        $this->addSql('ALTER TABLE user DROP street_number, DROP route, DROP locality, DROP country');
    }
}
