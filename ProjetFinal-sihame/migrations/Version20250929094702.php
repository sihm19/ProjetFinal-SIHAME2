<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250929094702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etablissement DROP FOREIGN KEY FK_20FD592CC68BE09C');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE localisation');
        $this->addSql('DROP INDEX IDX_20FD592CC68BE09C ON etablissement');
        $this->addSql('ALTER TABLE etablissement DROP localisation_id, DROP menu, CHANGE type_etablissement type_etablissement VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93FF631228');
        $this->addSql('DROP INDEX IDX_7D053A93FF631228 ON menu');
        $this->addSql('ALTER TABLE menu DROP etablissement_id, CHANGE image_menu plat VARCHAR(500) DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD statut JSON NOT NULL COMMENT \'(DC2Type:json)\', DROP nombre_personne, CHANGE date date_heure DATETIME NOT NULL');
        $this->addSql('ALTER TABLE `table` ADD nb_place INT NOT NULL, DROP nb_de_place, DROP nombre_table, CHANGE est_reserve est_reservee TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE localisation (id INT AUTO_INCREMENT NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE etablissement ADD localisation_id INT DEFAULT NULL, ADD menu VARCHAR(500) NOT NULL, CHANGE type_etablissement type_etablissement LONGTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\'');
        $this->addSql('ALTER TABLE etablissement ADD CONSTRAINT FK_20FD592CC68BE09C FOREIGN KEY (localisation_id) REFERENCES localisation (id)');
        $this->addSql('CREATE INDEX IDX_20FD592CC68BE09C ON etablissement (localisation_id)');
        $this->addSql('ALTER TABLE menu ADD etablissement_id INT NOT NULL, CHANGE plat image_menu VARCHAR(500) DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93FF631228 ON menu (etablissement_id)');
        $this->addSql('ALTER TABLE reservation ADD nombre_personne INT NOT NULL, DROP statut, CHANGE date_heure date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE `table` ADD nombre_table INT NOT NULL, CHANGE nb_place nb_de_place INT NOT NULL, CHANGE est_reservee est_reserve TINYINT(1) NOT NULL');
    }
}
