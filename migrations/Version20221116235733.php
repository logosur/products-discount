<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221116235733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discount_rule (id INT AUTO_INCREMENT NOT NULL, rule VARCHAR(30) NOT NULL, object_id VARCHAR(255) NOT NULL, amount DECIMAL(10,2) NOT NULL, discount_type VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, sku VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, UNIQUE INDEX UNIQ_D34A04ADF9038C4 (sku), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');

        $this->addSql("INSERT INTO `category` (`id`, `name`) VALUES (1, 'Boots')");
        $this->addSql("INSERT INTO `category` (`id`, `name`) VALUES (2, 'Sandals')");
        $this->addSql("INSERT INTO `category` (`id`, `name`) VALUES (3, 'Sneakers')");

        $this->addSql("INSERT INTO `product` (`sku`, `name`, `category_id`, `price`) VALUES ('000001', 'BV Lean leather ankle boots', 1, 89000)");
        $this->addSql("INSERT INTO `product` (`sku`, `name`, `category_id`, `price`) VALUES ('000002', 'BV Lean leather ankle boots', 1, 99000)");
        $this->addSql("INSERT INTO `product` (`sku`, `name`, `category_id`, `price`) VALUES ('000003', 'Ashlington leather ankle boots', 1, 71000)");
        $this->addSql("INSERT INTO `product` (`sku`, `name`, `category_id`, `price`) VALUES ('000004', 'Naima embellished suede sandals', 2, 79500)");
        $this->addSql("INSERT INTO `product` (`sku`, `name`, `category_id`, `price`) VALUES ('000005', 'Nathane leather sneakers', 3, 59000)");

        $this->addSql("INSERT INTO `discount_rule` (`id`, `rule`, `object_id`, `amount`, `discount_type`) VALUES (1, 'category', '1', 30.00, 'percentage')");
        $this->addSql("INSERT INTO `discount_rule` (`id`, `rule`, `object_id`, `amount`, `discount_type`) VALUES (2, 'sku', '000003', 15.00, 'percentage')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE discount_rule');
        $this->addSql('DROP TABLE product');
    }
}
