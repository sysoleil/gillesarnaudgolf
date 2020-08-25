<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200824120925 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, user_course_id INT DEFAULT NULL, course_type_id INT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, name VARCHAR(150) NOT NULL, description VARCHAR(255) DEFAULT NULL, min_person INT DEFAULT NULL, max_person INT DEFAULT NULL, price_ce DOUBLE PRECISION DEFAULT NULL, duration DOUBLE PRECISION NOT NULL, photo VARCHAR(255) NOT NULL, alt VARCHAR(100) NOT NULL, ticket TINYINT(1) NOT NULL, INDEX IDX_169E6FB959FC4476 (user_course_id), INDEX IDX_169E6FB9CD8F897F (course_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_media (course_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_8387A6E4591CC992 (course_id), INDEX IDX_8387A6E4EA9FDD75 (media_id), PRIMARY KEY(course_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(35) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(150) NOT NULL, name VARCHAR(150) NOT NULL, description VARCHAR(1000) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket_book (id INT AUTO_INCREMENT NOT NULL, user_ticket_book_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, duration DOUBLE PRECISION NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_F93EB60971EB358A (user_ticket_book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_type_id INT NOT NULL, firt_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, level DOUBLE PRECISION DEFAULT NULL, sexe VARCHAR(1) NOT NULL, email VARCHAR(30) NOT NULL, club VARCHAR(40) DEFAULT NULL, date_birth DATE DEFAULT NULL, phone INT NOT NULL, password VARCHAR(20) NOT NULL, pseudo VARCHAR(25) DEFAULT NULL, credit_duration DOUBLE PRECISION DEFAULT NULL, INDEX IDX_8D93D6499D419299 (user_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_course (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date_course DATE NOT NULL, date_purchase DATE NOT NULL, price DOUBLE PRECISION NOT NULL, hour_start DOUBLE PRECISION NOT NULL, hour_end DOUBLE PRECISION NOT NULL, INDEX IDX_73CC7484A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_ticket_book (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date_purchase DATE DEFAULT NULL, INDEX IDX_50257F9CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB959FC4476 FOREIGN KEY (user_course_id) REFERENCES user_course (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9CD8F897F FOREIGN KEY (course_type_id) REFERENCES course_type (id)');
        $this->addSql('ALTER TABLE course_media ADD CONSTRAINT FK_8387A6E4591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_media ADD CONSTRAINT FK_8387A6E4EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ticket_book ADD CONSTRAINT FK_F93EB60971EB358A FOREIGN KEY (user_ticket_book_id) REFERENCES user_ticket_book (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499D419299 FOREIGN KEY (user_type_id) REFERENCES user_type (id)');
        $this->addSql('ALTER TABLE user_course ADD CONSTRAINT FK_73CC7484A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_ticket_book ADD CONSTRAINT FK_50257F9CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course_media DROP FOREIGN KEY FK_8387A6E4591CC992');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9CD8F897F');
        $this->addSql('ALTER TABLE course_media DROP FOREIGN KEY FK_8387A6E4EA9FDD75');
        $this->addSql('ALTER TABLE user_course DROP FOREIGN KEY FK_73CC7484A76ED395');
        $this->addSql('ALTER TABLE user_ticket_book DROP FOREIGN KEY FK_50257F9CA76ED395');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB959FC4476');
        $this->addSql('ALTER TABLE ticket_book DROP FOREIGN KEY FK_F93EB60971EB358A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499D419299');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_media');
        $this->addSql('DROP TABLE course_type');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE ticket_book');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_course');
        $this->addSql('DROP TABLE user_ticket_book');
        $this->addSql('DROP TABLE user_type');
    }
}
