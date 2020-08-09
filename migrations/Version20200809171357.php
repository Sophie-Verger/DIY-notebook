<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200809171357 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE domain (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, owned TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, types_id INT NOT NULL, measures_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, quantity INT NOT NULL, owned TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_6BAF78708EB23357 (types_id), INDEX IDX_6BAF7870E72C1E58 (measures_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE measure (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe (id INT AUTO_INCREMENT NOT NULL, domain_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, recipe LONGTEXT NOT NULL, completion_time INT DEFAULT NULL, conservation_time INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, test_opinion LONGTEXT DEFAULT NULL, fire TINYINT(1) DEFAULT NULL, INDEX IDX_DA88B137115F0EE5 (domain_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_equipment (recipe_id INT NOT NULL, equipment_id INT NOT NULL, INDEX IDX_C4F9FB6559D8A214 (recipe_id), INDEX IDX_C4F9FB65517FE9FE (equipment_id), PRIMARY KEY(recipe_id, equipment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_measure (recipe_id INT NOT NULL, measure_id INT NOT NULL, INDEX IDX_CCE3176559D8A214 (recipe_id), INDEX IDX_CCE317655DA37D00 (measure_id), PRIMARY KEY(recipe_id, measure_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF78708EB23357 FOREIGN KEY (types_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870E72C1E58 FOREIGN KEY (measures_id) REFERENCES measure (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id)');
        $this->addSql('ALTER TABLE recipe_equipment ADD CONSTRAINT FK_C4F9FB6559D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_equipment ADD CONSTRAINT FK_C4F9FB65517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_measure ADD CONSTRAINT FK_CCE3176559D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_measure ADD CONSTRAINT FK_CCE317655DA37D00 FOREIGN KEY (measure_id) REFERENCES measure (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137115F0EE5');
        $this->addSql('ALTER TABLE recipe_equipment DROP FOREIGN KEY FK_C4F9FB65517FE9FE');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870E72C1E58');
        $this->addSql('ALTER TABLE recipe_measure DROP FOREIGN KEY FK_CCE317655DA37D00');
        $this->addSql('ALTER TABLE recipe_equipment DROP FOREIGN KEY FK_C4F9FB6559D8A214');
        $this->addSql('ALTER TABLE recipe_measure DROP FOREIGN KEY FK_CCE3176559D8A214');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF78708EB23357');
        $this->addSql('DROP TABLE domain');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE measure');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE recipe_equipment');
        $this->addSql('DROP TABLE recipe_measure');
        $this->addSql('DROP TABLE type');
    }
}
