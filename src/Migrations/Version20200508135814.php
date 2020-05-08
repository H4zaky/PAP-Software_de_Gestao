<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200508135814 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE compras_product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE config_hours_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE departments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE funcionarios_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE suppliers_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE compras_product (id INT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, qte INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE compras_product_suppliers (compras_product_id INT NOT NULL, suppliers_id INT NOT NULL, PRIMARY KEY(compras_product_id, suppliers_id))');
        $this->addSql('CREATE INDEX IDX_AF6565732F9EAB2F ON compras_product_suppliers (compras_product_id)');
        $this->addSql('CREATE INDEX IDX_AF656573355AF43 ON compras_product_suppliers (suppliers_id)');
        $this->addSql('CREATE TABLE config_hours (id INT NOT NULL, start_morning_time TIME(0) WITHOUT TIME ZONE NOT NULL, end_morning_time TIME(0) WITHOUT TIME ZONE NOT NULL, start_afternoon_time TIME(0) WITHOUT TIME ZONE NOT NULL, end_afternoon_time TIME(0) WITHOUT TIME ZONE NOT NULL, tolerance TIME(0) WITHOUT TIME ZONE NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE departments (id INT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone INT NOT NULL, where_it_is VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE funcionarios (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_10A00089E7927C74 ON funcionarios (email)');
        $this->addSql('CREATE TABLE suppliers (id INT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, fax VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE suppliers_compras_product (suppliers_id INT NOT NULL, compras_product_id INT NOT NULL, PRIMARY KEY(suppliers_id, compras_product_id))');
        $this->addSql('CREATE INDEX IDX_31486611355AF43 ON suppliers_compras_product (suppliers_id)');
        $this->addSql('CREATE INDEX IDX_314866112F9EAB2F ON suppliers_compras_product (compras_product_id)');
        $this->addSql('ALTER TABLE compras_product_suppliers ADD CONSTRAINT FK_AF6565732F9EAB2F FOREIGN KEY (compras_product_id) REFERENCES compras_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE compras_product_suppliers ADD CONSTRAINT FK_AF656573355AF43 FOREIGN KEY (suppliers_id) REFERENCES suppliers (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE suppliers_compras_product ADD CONSTRAINT FK_31486611355AF43 FOREIGN KEY (suppliers_id) REFERENCES suppliers (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE suppliers_compras_product ADD CONSTRAINT FK_314866112F9EAB2F FOREIGN KEY (compras_product_id) REFERENCES compras_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE compras_product_suppliers DROP CONSTRAINT FK_AF6565732F9EAB2F');
        $this->addSql('ALTER TABLE suppliers_compras_product DROP CONSTRAINT FK_314866112F9EAB2F');
        $this->addSql('ALTER TABLE compras_product_suppliers DROP CONSTRAINT FK_AF656573355AF43');
        $this->addSql('ALTER TABLE suppliers_compras_product DROP CONSTRAINT FK_31486611355AF43');
        $this->addSql('DROP SEQUENCE compras_product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE config_hours_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE departments_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE funcionarios_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE suppliers_id_seq CASCADE');
        $this->addSql('DROP TABLE compras_product');
        $this->addSql('DROP TABLE compras_product_suppliers');
        $this->addSql('DROP TABLE config_hours');
        $this->addSql('DROP TABLE departments');
        $this->addSql('DROP TABLE funcionarios');
        $this->addSql('DROP TABLE suppliers');
        $this->addSql('DROP TABLE suppliers_compras_product');
    }
}
