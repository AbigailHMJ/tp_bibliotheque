<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260206140154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book_book (book_source INT NOT NULL, book_target INT NOT NULL, INDEX IDX_D278E839765D74FE (book_source), INDEX IDX_D278E8396FB82471 (book_target), PRIMARY KEY (book_source, book_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE reservation_book (reservation_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_DDDC6E59B83297E7 (reservation_id), INDEX IDX_DDDC6E5916A2B381 (book_id), PRIMARY KEY (reservation_id, book_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE book_book ADD CONSTRAINT FK_D278E839765D74FE FOREIGN KEY (book_source) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_book ADD CONSTRAINT FK_D278E8396FB82471 FOREIGN KEY (book_target) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_book ADD CONSTRAINT FK_DDDC6E59B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_book ADD CONSTRAINT FK_DDDC6E5916A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation CHANGE email email VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book_book DROP FOREIGN KEY FK_D278E839765D74FE');
        $this->addSql('ALTER TABLE book_book DROP FOREIGN KEY FK_D278E8396FB82471');
        $this->addSql('ALTER TABLE reservation_book DROP FOREIGN KEY FK_DDDC6E59B83297E7');
        $this->addSql('ALTER TABLE reservation_book DROP FOREIGN KEY FK_DDDC6E5916A2B381');
        $this->addSql('DROP TABLE book_book');
        $this->addSql('DROP TABLE reservation_book');
        $this->addSql('ALTER TABLE reservation CHANGE email email VARCHAR(150) NOT NULL');
    }
}
