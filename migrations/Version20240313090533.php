<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313090533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE deplacement ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE deplacement ADD CONSTRAINT FK_1296FAC2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1296FAC2A76ED395 ON deplacement (user_id)');
        $this->addSql('ALTER TABLE partie ADD user_id INT NOT NULL, ADD resultat_id INT NOT NULL');
        $this->addSql('ALTER TABLE partie ADD CONSTRAINT FK_59B1F3DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE partie ADD CONSTRAINT FK_59B1F3DD233E95C FOREIGN KEY (resultat_id) REFERENCES resultat (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_59B1F3DA76ED395 ON partie (user_id)');
        $this->addSql('CREATE INDEX IDX_59B1F3DD233E95C ON partie (resultat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE deplacement DROP FOREIGN KEY FK_1296FAC2A76ED395');
        $this->addSql('DROP INDEX IDX_1296FAC2A76ED395 ON deplacement');
        $this->addSql('ALTER TABLE deplacement DROP user_id');
        $this->addSql('ALTER TABLE partie DROP FOREIGN KEY FK_59B1F3DA76ED395');
        $this->addSql('ALTER TABLE partie DROP FOREIGN KEY FK_59B1F3DD233E95C');
        $this->addSql('DROP INDEX UNIQ_59B1F3DA76ED395 ON partie');
        $this->addSql('DROP INDEX IDX_59B1F3DD233E95C ON partie');
        $this->addSql('ALTER TABLE partie DROP user_id, DROP resultat_id');
    }
}
