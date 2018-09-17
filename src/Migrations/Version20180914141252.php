<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180914141252 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemons_elements (pokemon_id INT NOT NULL, element_id INT NOT NULL, INDEX IDX_E024B452FE71C3E (pokemon_id), INDEX IDX_E024B451F1F2A24 (element_id), PRIMARY KEY(pokemon_id, element_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arene (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokemons_elements ADD CONSTRAINT FK_E024B452FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokemons_elements ADD CONSTRAINT FK_E024B451F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE element_pokemon');
        $this->addSql('DROP TABLE nom');
        $this->addSql('ALTER TABLE dresseur ADD arene_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dresseur ADD CONSTRAINT FK_77EA2FC6E957F298 FOREIGN KEY (arene_id) REFERENCES arene (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_77EA2FC6E957F298 ON dresseur (arene_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dresseur DROP FOREIGN KEY FK_77EA2FC6E957F298');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element_pokemon (element_id INT NOT NULL, pokemon_id INT NOT NULL, INDEX IDX_9537D0A71F1F2A24 (element_id), INDEX IDX_9537D0A72FE71C3E (pokemon_id), PRIMARY KEY(element_id, pokemon_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nom (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, username VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, password VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE element_pokemon ADD CONSTRAINT FK_9537D0A71F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE element_pokemon ADD CONSTRAINT FK_9537D0A72FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE pokemons_elements');
        $this->addSql('DROP TABLE arene');
        $this->addSql('DROP INDEX UNIQ_77EA2FC6E957F298 ON dresseur');
        $this->addSql('ALTER TABLE dresseur DROP arene_id');
    }
}
