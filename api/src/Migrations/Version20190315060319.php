<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190315060319 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE gpio (id INT AUTO_INCREMENT NOT NULL, division_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, port INT NOT NULL, state INT NOT NULL, last_update DATETIME NOT NULL, turn_on_icon VARCHAR(255) NOT NULL, turn_off_icon VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BA76D4D143915DCC (port), INDEX IDX_BA76D4D141859289 (division_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE division (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gpio ADD CONSTRAINT FK_BA76D4D141859289 FOREIGN KEY (division_id) REFERENCES division (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gpio DROP FOREIGN KEY FK_BA76D4D141859289');
        $this->addSql('DROP TABLE gpio');
        $this->addSql('DROP TABLE division');
    }
}
