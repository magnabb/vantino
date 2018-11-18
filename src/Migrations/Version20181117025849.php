<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181117025849 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE tmsg_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE vst_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tmsg (id INT NOT NULL, cid VARCHAR(36) NOT NULL, url VARCHAR(255) NOT NULL, sid VARCHAR(36) DEFAULT NULL, uid VARCHAR(36) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE vst (id INT NOT NULL, tmsg_id INT NOT NULL, ip VARCHAR(255) NOT NULL, lg VARCHAR(5) NOT NULL, rf VARCHAR(255) NOT NULL, ua VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FC4752E0B0A27E45 ON vst (tmsg_id)');
        $this->addSql('ALTER TABLE vst ADD CONSTRAINT FK_FC4752E0B0A27E45 FOREIGN KEY (tmsg_id) REFERENCES tmsg (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE vst DROP CONSTRAINT FK_FC4752E0B0A27E45');
        $this->addSql('DROP SEQUENCE tmsg_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE vst_id_seq CASCADE');
        $this->addSql('DROP TABLE tmsg');
        $this->addSql('DROP TABLE vst');
    }
}
