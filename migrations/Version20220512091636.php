<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512091636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agents (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, phone_number VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE la_ronde (id INT AUTO_INCREMENT NOT NULL, agent_id INT NOT NULL, site_id INT NOT NULL, materiel_id INT NOT NULL, date_fin DATETIME NOT NULL, date_debut DATETIME NOT NULL, observation LONGTEXT NOT NULL, detail LONGTEXT NOT NULL, INDEX IDX_AC281E4A3414710B (agent_id), INDEX IDX_AC281E4AF6BD1646 (site_id), INDEX IDX_AC281E4A16880AAF (materiel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, `keys` TINYINT(1) DEFAULT NULL, radio TINYINT(1) NOT NULL, phone TINYINT(1) DEFAULT NULL, round_controller TINYINT(1) DEFAULT NULL, torch TINYINT(1) DEFAULT NULL, key_car TINYINT(1) DEFAULT NULL, ivvadr TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE la_ronde ADD CONSTRAINT FK_AC281E4A3414710B FOREIGN KEY (agent_id) REFERENCES agents (id)');
        $this->addSql('ALTER TABLE la_ronde ADD CONSTRAINT FK_AC281E4AF6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE la_ronde ADD CONSTRAINT FK_AC281E4A16880AAF FOREIGN KEY (materiel_id) REFERENCES materiel (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE la_ronde DROP FOREIGN KEY FK_AC281E4A3414710B');
        $this->addSql('ALTER TABLE la_ronde DROP FOREIGN KEY FK_AC281E4A16880AAF');
        $this->addSql('ALTER TABLE la_ronde DROP FOREIGN KEY FK_AC281E4AF6BD1646');
        $this->addSql('DROP TABLE agents');
        $this->addSql('DROP TABLE la_ronde');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
