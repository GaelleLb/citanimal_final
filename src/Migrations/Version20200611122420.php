<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200611122420 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, espece_id INT NOT NULL, nom VARCHAR(255) NOT NULL, sexe VARCHAR(7) NOT NULL, date_naissance DATE NOT NULL, caractere LONGTEXT DEFAULT NULL, histoire LONGTEXT DEFAULT NULL, compatibilite_chien TINYINT(1) NOT NULL, compatibilite_chat TINYINT(1) NOT NULL, compatibilite_enfant TINYINT(1) NOT NULL, photo VARCHAR(255) NOT NULL, disponible TINYINT(1) NOT NULL, couleur_pelage VARCHAR(255) NOT NULL, longueur_pelage VARCHAR(255) NOT NULL, fiv TINYINT(1) NOT NULL, felv TINYINT(1) NOT NULL, sterilisation TINYINT(1) NOT NULL, vaccin TINYINT(1) NOT NULL, details LONGTEXT DEFAULT NULL, INDEX IDX_6AAB231F6E59D40D (race_id), INDEX IDX_6AAB231F2D191E7A (espece_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, soustitre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE espece (id INT AUTO_INCREMENT NOT NULL, nom_espece VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, nom_race VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F6E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F2D191E7A FOREIGN KEY (espece_id) REFERENCES espece (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F2D191E7A');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F6E59D40D');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE espece');
        $this->addSql('DROP TABLE race');
    }
}
