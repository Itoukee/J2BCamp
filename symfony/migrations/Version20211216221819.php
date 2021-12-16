<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211216221819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bills ADD case_number VARCHAR(50) NOT NULL, CHANGE bdc bdc VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE comedian_documents ADD image_name VARCHAR(255) DEFAULT NULL, ADD image_size INT DEFAULT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE companies ADD lat DOUBLE PRECISION NOT NULL, ADD lng DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE user ADD phone_number VARCHAR(180) NOT NULL, ADD lat DOUBLE PRECISION DEFAULT NULL, ADD lng DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6496B01BC5B ON user (phone_number)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bills DROP case_number, CHANGE bdc bdc VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE comedian_documents DROP image_name, DROP image_size, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE companies DROP lat, DROP lng');
        $this->addSql('DROP INDEX UNIQ_8D93D6496B01BC5B ON user');
        $this->addSql('ALTER TABLE user DROP phone_number, DROP lat, DROP lng');
    }
}
