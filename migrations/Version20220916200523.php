<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220916200523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auth_assignment (id INT AUTO_INCREMENT NOT NULL, item_name_id INT NOT NULL, user_id_id INT NOT NULL, created_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_2EC0490E7A4ABA82 (item_name_id), UNIQUE INDEX UNIQ_2EC0490E9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auth_item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, type SMALLINT NOT NULL, description LONGTEXT DEFAULT NULL, data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auth_item_child (id INT AUTO_INCREMENT NOT NULL, parent_id INT NOT NULL, child_id INT NOT NULL, UNIQUE INDEX UNIQ_1611424D727ACA70 (parent_id), UNIQUE INDEX UNIQ_1611424DDD62C21B (child_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auth_rule (id INT AUTO_INCREMENT NOT NULL, auth_item_id INT DEFAULT NULL, name VARCHAR(64) NOT NULL, data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_68FE4C785C4B72AD (auth_item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(256) NOT NULL, password VARCHAR(60) NOT NULL, token VARCHAR(60) NOT NULL, status INT DEFAULT NULL, last_name VARCHAR(128) NOT NULL, first_name VARCHAR(128) NOT NULL, middle_name VARCHAR(128) NOT NULL, phone VARCHAR(16) NOT NULL, region_id INT DEFAULT NULL, city_id INT DEFAULT NULL, geoname_id VARCHAR(32) DEFAULT NULL, gender INT DEFAULT NULL, position VARCHAR(255) NOT NULL, about LONGTEXT DEFAULT NULL, birth_date DATE DEFAULT NULL, pseudonym VARCHAR(256) DEFAULT NULL, student_projects SMALLINT DEFAULT NULL, main_media_id INT DEFAULT NULL, moderator_comments LONGTEXT DEFAULT NULL, registration_date DATETIME NOT NULL, status_changed DATETIME NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), UNIQUE INDEX UNIQ_1483A5E95F37A13B (token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE auth_assignment ADD CONSTRAINT FK_2EC0490E7A4ABA82 FOREIGN KEY (item_name_id) REFERENCES auth_item (id)');
        $this->addSql('ALTER TABLE auth_assignment ADD CONSTRAINT FK_2EC0490E9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE auth_item_child ADD CONSTRAINT FK_1611424D727ACA70 FOREIGN KEY (parent_id) REFERENCES auth_item (id)');
        $this->addSql('ALTER TABLE auth_item_child ADD CONSTRAINT FK_1611424DDD62C21B FOREIGN KEY (child_id) REFERENCES auth_item (id)');
        $this->addSql('ALTER TABLE auth_rule ADD CONSTRAINT FK_68FE4C785C4B72AD FOREIGN KEY (auth_item_id) REFERENCES auth_item (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE auth_assignment DROP FOREIGN KEY FK_2EC0490E7A4ABA82');
        $this->addSql('ALTER TABLE auth_assignment DROP FOREIGN KEY FK_2EC0490E9D86650F');
        $this->addSql('ALTER TABLE auth_item_child DROP FOREIGN KEY FK_1611424D727ACA70');
        $this->addSql('ALTER TABLE auth_item_child DROP FOREIGN KEY FK_1611424DDD62C21B');
        $this->addSql('ALTER TABLE auth_rule DROP FOREIGN KEY FK_68FE4C785C4B72AD');
        $this->addSql('DROP TABLE auth_assignment');
        $this->addSql('DROP TABLE auth_item');
        $this->addSql('DROP TABLE auth_item_child');
        $this->addSql('DROP TABLE auth_rule');
        $this->addSql('DROP TABLE users');
    }
}
