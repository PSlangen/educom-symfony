<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230306141041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE optreden DROP FOREIGN KEY FK_6286F65DE017CE10');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DE017CE10 FOREIGN KEY (voorprogramma_id) REFERENCES artiest (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE optreden DROP FOREIGN KEY FK_6286F65DE017CE10');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DE017CE10 FOREIGN KEY (voorprogramma_id) REFERENCES voorprogramma (id)');
    }
}
