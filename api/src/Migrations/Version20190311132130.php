<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190311132130 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gpio DROP FOREIGN KEY FK_BA76D4D1655664B9');
        $this->addSql('CREATE TABLE division (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP INDEX IDX_BA76D4D1655664B9 ON gpio');
        $this->addSql('ALTER TABLE gpio CHANGE gpio_group_id division_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gpio ADD CONSTRAINT FK_BA76D4D141859289 FOREIGN KEY (division_id) REFERENCES division (id)');
        $this->addSql('CREATE INDEX IDX_BA76D4D141859289 ON gpio (division_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gpio DROP FOREIGN KEY FK_BA76D4D141859289');
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE division');
        $this->addSql('DROP INDEX IDX_BA76D4D141859289 ON gpio');
        $this->addSql('ALTER TABLE gpio CHANGE division_id gpio_group_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gpio ADD CONSTRAINT FK_BA76D4D1655664B9 FOREIGN KEY (gpio_group_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_BA76D4D1655664B9 ON gpio (gpio_group_id)');
    }
}
