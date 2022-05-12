<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512160335 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel ADD cle TINYINT(1) DEFAULT NULL, ADD ronde TINYINT(1) DEFAULT NULL, ADD lamp TINYINT(1) DEFAULT NULL, ADD contact TINYINT(1) DEFAULT NULL, DROP `keys`, DROP round_controller, DROP torch, DROP key_car');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel ADD `keys` TINYINT(1) DEFAULT NULL, ADD round_controller TINYINT(1) DEFAULT NULL, ADD torch TINYINT(1) DEFAULT NULL, ADD key_car TINYINT(1) DEFAULT NULL, DROP cle, DROP ronde, DROP lamp, DROP contact');
    }
}
