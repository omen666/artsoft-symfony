<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250130062642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE loans (id SERIAL NOT NULL, car_id INT DEFAULT NULL, program_id INT DEFAULT NULL, initial_payment INT NOT NULL, loan_term INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_82C24DBCC3C6F69F ON loans (car_id)');
        $this->addSql('CREATE INDEX IDX_82C24DBC3EB8070A ON loans (program_id)');
        $this->addSql('ALTER TABLE loans ADD CONSTRAINT FK_82C24DBCC3C6F69F FOREIGN KEY (car_id) REFERENCES cars (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loans ADD CONSTRAINT FK_82C24DBC3EB8070A FOREIGN KEY (program_id) REFERENCES credits (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loans DROP CONSTRAINT FK_82C24DBCC3C6F69F');
        $this->addSql('ALTER TABLE loans DROP CONSTRAINT FK_82C24DBC3EB8070A');
        $this->addSql('DROP TABLE loans');
    }
}
