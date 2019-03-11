<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190311131837 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gpio DROP FOREIGN KEY FK_BA76D4D1B3BB53C');
        $this->addSql('DROP INDEX IDX_BA76D4D1B3BB53C ON gpio');
        $this->addSql('ALTER TABLE gpio CHANGE groupid_id gpio_group_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gpio ADD CONSTRAINT FK_BA76D4D1655664B9 FOREIGN KEY (gpio_group_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_BA76D4D1655664B9 ON gpio (gpio_group_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gpio DROP FOREIGN KEY FK_BA76D4D1655664B9');
        $this->addSql('DROP INDEX IDX_BA76D4D1655664B9 ON gpio');
        $this->addSql('ALTER TABLE gpio CHANGE gpio_group_id groupid_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gpio ADD CONSTRAINT FK_BA76D4D1B3BB53C FOREIGN KEY (groupid_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_BA76D4D1B3BB53C ON gpio (groupid_id)');
    }
}
