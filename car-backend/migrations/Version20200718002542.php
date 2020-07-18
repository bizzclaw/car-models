<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200718002542 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE make (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_1ACC766EC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, make_id INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_D79572D9C54C8C93 (type_id), INDEX IDX_D79572D9CFBF73EB (make_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE search_log (id INT AUTO_INCREMENT NOT NULL, vehicle_type_id INT DEFAULT NULL, make_abbr VARCHAR(255) DEFAULT NULL, request_time INT DEFAULT NULL, ip_address VARCHAR(255) DEFAULT NULL, user_agent VARCHAR(255) DEFAULT NULL, INDEX IDX_4B841C7ADA3FD1FC (vehicle_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_type (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE make ADD CONSTRAINT FK_1ACC766EC54C8C93 FOREIGN KEY (type_id) REFERENCES vehicle_type (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9C54C8C93 FOREIGN KEY (type_id) REFERENCES vehicle_type (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9CFBF73EB FOREIGN KEY (make_id) REFERENCES make (id)');
        $this->addSql('ALTER TABLE search_log ADD CONSTRAINT FK_4B841C7ADA3FD1FC FOREIGN KEY (vehicle_type_id) REFERENCES vehicle_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9CFBF73EB');
        $this->addSql('ALTER TABLE make DROP FOREIGN KEY FK_1ACC766EC54C8C93');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9C54C8C93');
        $this->addSql('ALTER TABLE search_log DROP FOREIGN KEY FK_4B841C7ADA3FD1FC');
        $this->addSql('DROP TABLE make');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE search_log');
        $this->addSql('DROP TABLE vehicle_type');
    }
}
