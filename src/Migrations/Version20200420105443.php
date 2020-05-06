<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200420105443 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE vendas_product ADD product_id INT NOT NULL');
        $this->addSql('ALTER TABLE vendas_product DROP name');
        $this->addSql('ALTER TABLE vendas_product ADD CONSTRAINT FK_C48F18324584665A FOREIGN KEY (product_id) REFERENCES compras_product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C48F18324584665A ON vendas_product (product_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE vendas_product DROP CONSTRAINT FK_C48F18324584665A');
        $this->addSql('DROP INDEX IDX_C48F18324584665A');
        $this->addSql('ALTER TABLE vendas_product ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vendas_product DROP product_id');
    }
}
