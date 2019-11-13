<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191014164645 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE optionn_property (optionn_id INT NOT NULL, property_id INT NOT NULL, INDEX IDX_F398A03898A88AB3 (optionn_id), INDEX IDX_F398A038549213EC (property_id), PRIMARY KEY(optionn_id, property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE optionn_property ADD CONSTRAINT FK_F398A03898A88AB3 FOREIGN KEY (optionn_id) REFERENCES optionn (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE optionn_property ADD CONSTRAINT FK_F398A038549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE optionn_property');
    }
}
