<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200610101938 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE animal ADD fiv VARCHAR(255) NOT NULL, ADD felv VARCHAR(255) NOT NULL, ADD sterilisation VARCHAR(255) NOT NULL, ADD vaccin VARCHAR(255) NOT NULL, ADD details LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE race DROP couleur_pelage, DROP longueur_pelage');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE animal DROP fiv, DROP felv, DROP sterilisation, DROP vaccin, DROP details');
        $this->addSql('ALTER TABLE race ADD couleur_pelage VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD longueur_pelage VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
