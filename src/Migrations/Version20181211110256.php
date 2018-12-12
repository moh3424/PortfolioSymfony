<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181211110256 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE back CHANGE avatar photo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE cms CHANGE avatar photo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE experience CHANGE annee_debut annee_debut DATETIME NOT NULL, CHANGE date_fin date_fin DATETIME NOT NULL');
        $this->addSql('ALTER TABLE formation CHANGE annee_scolaire annee_scolaire DATETIME NOT NULL');
        $this->addSql('ALTER TABLE framework CHANGE avatar photo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE front CHANGE avatar photo VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE back CHANGE photo avatar VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE cms CHANGE photo avatar VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE experience CHANGE annee_debut annee_debut DATETIME NOT NULL, CHANGE date_fin date_fin DATETIME NOT NULL');
        $this->addSql('ALTER TABLE formation CHANGE annee_scolaire annee_scolaire DATETIME NOT NULL');
        $this->addSql('ALTER TABLE framework CHANGE photo avatar VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE front CHANGE photo avatar VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
