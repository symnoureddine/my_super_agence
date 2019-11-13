<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191015004452 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE option_property DROP FOREIGN KEY FK_AB856D7AA7C41D6F');
        $this->addSql('CREATE TABLE property_optionn (property_id INT NOT NULL, optionn_id INT NOT NULL, INDEX IDX_EAFEDC26549213EC (property_id), INDEX IDX_EAFEDC2698A88AB3 (optionn_id), PRIMARY KEY(property_id, optionn_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE property_optionn ADD CONSTRAINT FK_EAFEDC26549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE property_optionn ADD CONSTRAINT FK_EAFEDC2698A88AB3 FOREIGN KEY (optionn_id) REFERENCES optionn (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE option_property');
        $this->addSql('DROP TABLE optionn_property');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE option_property (option_id INT NOT NULL, property_id INT NOT NULL, INDEX IDX_AB856D7A549213EC (property_id), INDEX IDX_AB856D7AA7C41D6F (option_id), PRIMARY KEY(option_id, property_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE optionn_property (optionn_id INT NOT NULL, property_id INT NOT NULL, INDEX IDX_F398A038549213EC (property_id), INDEX IDX_F398A03898A88AB3 (optionn_id), PRIMARY KEY(optionn_id, property_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE option_property ADD CONSTRAINT FK_AB856D7A549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE option_property ADD CONSTRAINT FK_AB856D7AA7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE optionn_property ADD CONSTRAINT FK_F398A038549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE optionn_property ADD CONSTRAINT FK_F398A03898A88AB3 FOREIGN KEY (optionn_id) REFERENCES optionn (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE property_optionn');
    }
}
