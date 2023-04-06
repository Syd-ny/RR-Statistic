<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230405155038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, statuses_id INT DEFAULT NULL, countries_id INT DEFAULT NULL, firstname VARCHAR(32) NOT NULL, lastname VARCHAR(32) NOT NULL, ability DOUBLE PRECISION DEFAULT NULL, strenght DOUBLE PRECISION DEFAULT NULL, serve DOUBLE PRECISION DEFAULT NULL, speed DOUBLE PRECISION DEFAULT NULL, mentality DOUBLE PRECISION DEFAULT NULL, doubles DOUBLE PRECISION DEFAULT NULL, talent DOUBLE PRECISION DEFAULT NULL, hard INT DEFAULT NULL, clay INT DEFAULT NULL, grass INT DEFAULT NULL, indoor INT DEFAULT NULL, age INT NOT NULL, global_age_factor INT NOT NULL, actual_age_factor INT NOT NULL, best_ranking_single INT DEFAULT NULL, best_ranking_double INT DEFAULT NULL, weeks_n1_single INT DEFAULT NULL, weeks_n1_double INT DEFAULT NULL, atp_single_low INT DEFAULT NULL, atp_double_low INT DEFAULT NULL, atp_single_mid INT DEFAULT NULL, atp_double_mid INT DEFAULT NULL, atp_single_high INT DEFAULT NULL, atp_double_high INT DEFAULT NULL, tmc_single INT DEFAULT NULL, tmc_double INT DEFAULT NULL, gs_single INT DEFAULT NULL, gs_double INT DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_98197A651259C1FF (statuses_id), INDEX IDX_98197A65AEBAE514 (countries_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A651259C1FF FOREIGN KEY (statuses_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65AEBAE514 FOREIGN KEY (countries_id) REFERENCES country (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A651259C1FF');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65AEBAE514');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE status');
    }
}
