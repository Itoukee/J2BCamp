<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213191929 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE addresses DROP FOREIGN KEY FK_6FCA75169D86650F');
        $this->addSql('DROP INDEX IDX_6FCA75169D86650F ON addresses');
        $this->addSql('ALTER TABLE addresses ADD company_id INT DEFAULT NULL, ADD type VARCHAR(255) NOT NULL, CHANGE user_id_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE addresses ADD CONSTRAINT FK_6FCA7516A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE addresses ADD CONSTRAINT FK_6FCA7516979B1AD6 FOREIGN KEY (company_id) REFERENCES companies (id)');
        $this->addSql('CREATE INDEX IDX_6FCA7516A76ED395 ON addresses (user_id)');
        $this->addSql('CREATE INDEX IDX_6FCA7516979B1AD6 ON addresses (company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE addresses DROP FOREIGN KEY FK_6FCA7516A76ED395');
        $this->addSql('ALTER TABLE addresses DROP FOREIGN KEY FK_6FCA7516979B1AD6');
        $this->addSql('DROP INDEX IDX_6FCA7516A76ED395 ON addresses');
        $this->addSql('DROP INDEX IDX_6FCA7516979B1AD6 ON addresses');
        $this->addSql('ALTER TABLE addresses DROP company_id, DROP type, CHANGE user_id user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE addresses ADD CONSTRAINT FK_6FCA75169D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_6FCA75169D86650F ON addresses (user_id_id)');
    }
}
