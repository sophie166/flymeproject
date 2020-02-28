<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200228134352 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE spaceship (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, capacity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE astronaute (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depart (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) NOT NULL, descprition LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adventurer (id INT AUTO_INCREMENT NOT NULL, depart_id INT NOT NULL, spaceship_id INT NOT NULL, activity_id INT DEFAULT NULL, astronaute_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_FC286782AE02FE4B (depart_id), INDEX IDX_FC2867824AD9556B (spaceship_id), INDEX IDX_FC28678281C06096 (activity_id), INDEX IDX_FC2867829ABD184A (astronaute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot (id INT AUTO_INCREMENT NOT NULL, spaceship_id INT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D1E5F524AD9556B (spaceship_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adventurer ADD CONSTRAINT FK_FC286782AE02FE4B FOREIGN KEY (depart_id) REFERENCES depart (id)');
        $this->addSql('ALTER TABLE adventurer ADD CONSTRAINT FK_FC2867824AD9556B FOREIGN KEY (spaceship_id) REFERENCES spaceship (id)');
        $this->addSql('ALTER TABLE adventurer ADD CONSTRAINT FK_FC28678281C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE adventurer ADD CONSTRAINT FK_FC2867829ABD184A FOREIGN KEY (astronaute_id) REFERENCES astronaute (id)');
        $this->addSql('ALTER TABLE pilot ADD CONSTRAINT FK_8D1E5F524AD9556B FOREIGN KEY (spaceship_id) REFERENCES spaceship (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adventurer DROP FOREIGN KEY FK_FC2867824AD9556B');
        $this->addSql('ALTER TABLE pilot DROP FOREIGN KEY FK_8D1E5F524AD9556B');
        $this->addSql('ALTER TABLE adventurer DROP FOREIGN KEY FK_FC2867829ABD184A');
        $this->addSql('ALTER TABLE adventurer DROP FOREIGN KEY FK_FC28678281C06096');
        $this->addSql('ALTER TABLE adventurer DROP FOREIGN KEY FK_FC286782AE02FE4B');
        $this->addSql('DROP TABLE spaceship');
        $this->addSql('DROP TABLE astronaute');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE depart');
        $this->addSql('DROP TABLE adventurer');
        $this->addSql('DROP TABLE pilot');
    }
}
