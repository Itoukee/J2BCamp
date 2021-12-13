<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213124500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD032119A01');
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD0A6EF5526');
        $this->addSql('DROP INDEX IDX_22775DD032119A01 ON bills');
        $this->addSql('DROP INDEX IDX_22775DD0A6EF5526 ON bills');
        $this->addSql('ALTER TABLE bills ADD company_id INT DEFAULT NULL, ADD training_id INT DEFAULT NULL, DROP id_company_id, DROP id_training_id');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0979B1AD6 FOREIGN KEY (company_id) REFERENCES companies (id)');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0BEFD98D1 FOREIGN KEY (training_id) REFERENCES trainings (id)');
        $this->addSql('CREATE INDEX IDX_22775DD0979B1AD6 ON bills (company_id)');
        $this->addSql('CREATE INDEX IDX_22775DD0BEFD98D1 ON bills (training_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD0979B1AD6');
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD0BEFD98D1');
        $this->addSql('DROP INDEX IDX_22775DD0979B1AD6 ON bills');
        $this->addSql('DROP INDEX IDX_22775DD0BEFD98D1 ON bills');
        $this->addSql('ALTER TABLE bills ADD id_company_id INT DEFAULT NULL, ADD id_training_id INT DEFAULT NULL, DROP company_id, DROP training_id');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD032119A01 FOREIGN KEY (id_company_id) REFERENCES companies (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0A6EF5526 FOREIGN KEY (id_training_id) REFERENCES trainings (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_22775DD032119A01 ON bills (id_company_id)');
        $this->addSql('CREATE INDEX IDX_22775DD0A6EF5526 ON bills (id_training_id)');
    }
}
