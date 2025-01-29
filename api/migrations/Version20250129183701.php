<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250129183701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brands (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE cars (id INT NOT NULL, brand_id INT DEFAULT NULL, model_id INT DEFAULT NULL, photo VARCHAR(255) NOT NULL, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_95C71D1444F5D008 ON cars (brand_id)');
        $this->addSql('CREATE INDEX IDX_95C71D147975B7E7 ON cars (model_id)');
        $this->addSql('CREATE TABLE models (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D1444F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D147975B7E7 FOREIGN KEY (model_id) REFERENCES models (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql("INSERT INTO brands (id, name) 
                            VALUES (1,'brand1'),(2,'brand2'),(3,'brand3'),(4,'brand4')");
        $this->addSql("INSERT INTO models (id, name) 
                            VALUES (1,'model1'),(2,'model2'),(3,'model3'),(4,'model4')");
        $this->addSql("INSERT INTO cars (id, brand_id, photo, model_id, price) 
                            VALUES 
                                (1,1,'photo1',1,100),
                                (2,2,'photo2',2,200),
                                (3,3,'photo3',3,300),
                                (4,4,'photo4',4,400)");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE cars DROP CONSTRAINT FK_95C71D1444F5D008');
        $this->addSql('ALTER TABLE cars DROP CONSTRAINT FK_95C71D147975B7E7');
        $this->addSql('DROP TABLE brands');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE models');
    }
}
