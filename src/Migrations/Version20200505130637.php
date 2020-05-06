<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200505130637 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE vendas_product_id_seq CASCADE');
        $this->addSql('DROP TABLE vendas_product');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE vendas_product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE vendas_product (id INT NOT NULL, product_id INT NOT NULL, price DOUBLE PRECISION NOT NULL, qte INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_c48f18324584665a ON vendas_product (product_id)');
        $this->addSql('ALTER TABLE vendas_product ADD CONSTRAINT fk_c48f18324584665a FOREIGN KEY (product_id) REFERENCES compras_product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
