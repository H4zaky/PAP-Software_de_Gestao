<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200420105820 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE compras_product_suppliers (compras_product_id INT NOT NULL, suppliers_id INT NOT NULL, PRIMARY KEY(compras_product_id, suppliers_id))');
        $this->addSql('CREATE INDEX IDX_AF6565732F9EAB2F ON compras_product_suppliers (compras_product_id)');
        $this->addSql('CREATE INDEX IDX_AF656573355AF43 ON compras_product_suppliers (suppliers_id)');
        $this->addSql('ALTER TABLE compras_product_suppliers ADD CONSTRAINT FK_AF6565732F9EAB2F FOREIGN KEY (compras_product_id) REFERENCES compras_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE compras_product_suppliers ADD CONSTRAINT FK_AF656573355AF43 FOREIGN KEY (suppliers_id) REFERENCES suppliers (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE compras_product DROP supplier');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE compras_product_suppliers');
        $this->addSql('ALTER TABLE compras_product ADD supplier VARCHAR(255) NOT NULL');
    }
}
