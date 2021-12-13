<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213143549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD0161BA2FF');
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD0979B1AD6');
        $this->addSql('DROP INDEX IDX_22775DD0161BA2FF ON bills');
        $this->addSql('DROP INDEX IDX_22775DD0979B1AD6 ON bills');
        $this->addSql('ALTER TABLE bills DROP company_id, DROP trainings_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bills ADD company_id INT DEFAULT NULL, ADD trainings_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0161BA2FF FOREIGN KEY (trainings_id) REFERENCES trainings (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0979B1AD6 FOREIGN KEY (company_id) REFERENCES companies (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_22775DD0161BA2FF ON bills (trainings_id)');
        $this->addSql('CREATE INDEX IDX_22775DD0979B1AD6 ON bills (company_id)');
    }
}
