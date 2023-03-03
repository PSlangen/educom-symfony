<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230303160101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE optreden ADD poppodium_id INT NOT NULL, DROP artiest');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DA2EEBB18 FOREIGN KEY (poppodium_id) REFERENCES poppodium (id)');
        $this->addSql('CREATE INDEX IDX_6286F65DA2EEBB18 ON optreden (poppodium_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE optreden DROP FOREIGN KEY FK_6286F65DA2EEBB18');
        $this->addSql('DROP INDEX IDX_6286F65DA2EEBB18 ON optreden');
        $this->addSql('ALTER TABLE optreden ADD artiest VARCHAR(255) NOT NULL, DROP poppodium_id');
    }
}
