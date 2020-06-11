<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200610132654 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F592AF3BA');
        $this->addSql('DROP TABLE medical');
        $this->addSql('DROP INDEX IDX_6AAB231F592AF3BA ON animal');
        $this->addSql('ALTER TABLE animal DROP medical_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE medical (id INT AUTO_INCREMENT NOT NULL, fiv TINYINT(1) NOT NULL, felv TINYINT(1) NOT NULL, sterilisation TINYINT(1) NOT NULL, vaccin TINYINT(1) NOT NULL, details LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE animal ADD medical_id INT NOT NULL');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F592AF3BA FOREIGN KEY (medical_id) REFERENCES medical (id)');
        $this->addSql('CREATE INDEX IDX_6AAB231F592AF3BA ON animal (medical_id)');
    }
}
