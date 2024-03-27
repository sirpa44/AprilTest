<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240327134431 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create ProspectUpdate Table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prospect_update (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, prospect_id INT NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D8BB4085A76ED395 (user_id), INDEX IDX_D8BB4085D182060A (prospect_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prospect_update ADD CONSTRAINT FK_D8BB4085A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prospect_update ADD CONSTRAINT FK_D8BB4085D182060A FOREIGN KEY (prospect_id) REFERENCES prospect (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prospect_update DROP FOREIGN KEY FK_D8BB4085A76ED395');
        $this->addSql('ALTER TABLE prospect_update DROP FOREIGN KEY FK_D8BB4085D182060A');
        $this->addSql('DROP TABLE prospect_update');
    }
}
