<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214095450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE companies ADD street_number INT DEFAULT NULL, ADD route VARCHAR(255) DEFAULT NULL, ADD locality VARCHAR(255) DEFAULT NULL, ADD country VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD street_number INT DEFAULT NULL, ADD route VARCHAR(255) DEFAULT NULL, ADD locality VARCHAR(255) DEFAULT NULL, ADD country VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE companies DROP street_number, DROP route, DROP locality, DROP country');
        $this->addSql('ALTER TABLE user DROP street_number, DROP route, DROP locality, DROP country');
    }
}
