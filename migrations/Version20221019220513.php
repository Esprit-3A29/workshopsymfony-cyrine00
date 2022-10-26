<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221019220513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classroom CHANGE name name VARCHAR(20) NOT NULL, CHANGE description description VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE club CHANGE name name VARCHAR(20) NOT NULL, CHANGE description description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF336278D5A8');
        $this->addSql('ALTER TABLE student CHANGE username username VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF336278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classroom CHANGE name name VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE club CHANGE name name VARCHAR(50) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF336278D5A8');
        $this->addSql('ALTER TABLE student CHANGE username username VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF336278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id) ON DELETE CASCADE');
    }
}
