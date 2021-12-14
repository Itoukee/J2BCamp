<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213145838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bills ADD company_id INT NOT NULL, ADD comedian_id INT NOT NULL');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0979B1AD6 FOREIGN KEY (company_id) REFERENCES companies (id)');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD01D3228F FOREIGN KEY (comedian_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_22775DD0979B1AD6 ON bills (company_id)');
        $this->addSql('CREATE INDEX IDX_22775DD01D3228F ON bills (comedian_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD0979B1AD6');
        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD01D3228F');
        $this->addSql('DROP INDEX IDX_22775DD0979B1AD6 ON bills');
        $this->addSql('DROP INDEX IDX_22775DD01D3228F ON bills');
        $this->addSql('ALTER TABLE bills DROP company_id, DROP comedian_id');
    }
}
