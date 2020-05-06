<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200420104347 extends AbstractMigration
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
        $this->addSql('CREATE SEQUENCE functionaries_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE suppliers_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE vendas_product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE compras_product (id INT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, qte INT NOT NULL, supplier VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE config_hours (id INT NOT NULL, start_morning_time TIME(0) WITHOUT TIME ZONE NOT NULL, end_morning_time TIME(0) WITHOUT TIME ZONE NOT NULL, start_afternoon_time TIME(0) WITHOUT TIME ZONE NOT NULL, end_afternoon_time TIME(0) WITHOUT TIME ZONE NOT NULL, tolerance TIME(0) WITHOUT TIME ZONE NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE departments (id INT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone INT NOT NULL, where_it_is VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE functionaries (id INT NOT NULL, department_id INT NOT NULL, schedule_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, salary DOUBLE PRECISION NOT NULL, address VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FBF6B5E6AE80F5DF ON functionaries (department_id)');
        $this->addSql('CREATE INDEX IDX_FBF6B5E6A40BC2D5 ON functionaries (schedule_id)');
        $this->addSql('CREATE TABLE suppliers (id INT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, fax VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE suppliers_compras_product (suppliers_id INT NOT NULL, compras_product_id INT NOT NULL, PRIMARY KEY(suppliers_id, compras_product_id))');
        $this->addSql('CREATE INDEX IDX_31486611355AF43 ON suppliers_compras_product (suppliers_id)');
        $this->addSql('CREATE INDEX IDX_314866112F9EAB2F ON suppliers_compras_product (compras_product_id)');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
        $this->addSql('CREATE TABLE vendas_product (id INT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, qte INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE functionaries ADD CONSTRAINT FK_FBF6B5E6AE80F5DF FOREIGN KEY (department_id) REFERENCES departments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE functionaries ADD CONSTRAINT FK_FBF6B5E6A40BC2D5 FOREIGN KEY (schedule_id) REFERENCES config_hours (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE suppliers_compras_product ADD CONSTRAINT FK_31486611355AF43 FOREIGN KEY (suppliers_id) REFERENCES suppliers (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE suppliers_compras_product ADD CONSTRAINT FK_314866112F9EAB2F FOREIGN KEY (compras_product_id) REFERENCES compras_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE suppliers_compras_product DROP CONSTRAINT FK_314866112F9EAB2F');
        $this->addSql('ALTER TABLE functionaries DROP CONSTRAINT FK_FBF6B5E6A40BC2D5');
        $this->addSql('ALTER TABLE functionaries DROP CONSTRAINT FK_FBF6B5E6AE80F5DF');
        $this->addSql('ALTER TABLE suppliers_compras_product DROP CONSTRAINT FK_31486611355AF43');
        $this->addSql('DROP SEQUENCE compras_product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE config_hours_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE departments_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE functionaries_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE suppliers_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE vendas_product_id_seq CASCADE');
        $this->addSql('DROP TABLE compras_product');
        $this->addSql('DROP TABLE config_hours');
        $this->addSql('DROP TABLE departments');
        $this->addSql('DROP TABLE functionaries');
        $this->addSql('DROP TABLE suppliers');
        $this->addSql('DROP TABLE suppliers_compras_product');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE vendas_product');
    }
}
