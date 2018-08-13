<?php
namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs! This block will be used as the migration description if getDescription() is not used.
 */
class Version20180720200636 extends AbstractMigration
{

    /**
     * @return string
     */
    public function getDescription()
    {
        return '';
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');

        $this->addSql('CREATE TABLE sandstorm_neosh5p_domain_model_cachedasset (persistence_object_identifier VARCHAR(40) NOT NULL, resource VARCHAR(40) DEFAULT NULL, hashkey VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7712B6E1BC91F416 (resource), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sandstorm_neosh5p_domain_model_configsetting (configkey VARCHAR(255) NOT NULL, configvalue LONGTEXT NOT NULL, PRIMARY KEY(configkey)) DEFAULT CHARACTER SET utf8 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sandstorm_neosh5p_domain_model_contentdependency (content VARCHAR(40) NOT NULL, library VARCHAR(40) NOT NULL, dependencytype VARCHAR(255) NOT NULL, weight INT NOT NULL, dropcss TINYINT(1) NOT NULL, INDEX IDX_65007AE0FEC530A9 (content), INDEX IDX_65007AE0A18098BC (library), PRIMARY KEY(content, library, dependencytype)) DEFAULT CHARACTER SET utf8 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sandstorm_neosh5p_domain_model_contentresult (persistence_object_identifier VARCHAR(40) NOT NULL, content VARCHAR(40) DEFAULT NULL, account VARCHAR(40) DEFAULT NULL, score INT NOT NULL, maxscore INT NOT NULL, opened INT NOT NULL, finished INT NOT NULL, time INT NOT NULL, INDEX IDX_51C3A35AFEC530A9 (content), INDEX IDX_51C3A35A7D3656A4 (account), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sandstorm_neosh5p_domain_model_contenttypecacheentry (persistence_object_identifier VARCHAR(40) NOT NULL, entryid INT AUTO_INCREMENT UNIQUE, machinename VARCHAR(255) NOT NULL, majorversion INT NOT NULL, minorversion INT NOT NULL, patchversion INT NOT NULL, h5pmajorversion INT NOT NULL, h5pminorversion INT NOT NULL, title VARCHAR(255) NOT NULL, summary LONGTEXT NOT NULL, description LONGTEXT NOT NULL, icon LONGTEXT NOT NULL, createdat DATETIME NOT NULL, updatedat DATETIME NOT NULL, isrecommended TINYINT(1) NOT NULL, popularity INT NOT NULL, screenshots LONGTEXT DEFAULT NULL, license LONGTEXT DEFAULT NULL, example LONGTEXT NOT NULL, tutorial LONGTEXT DEFAULT NULL, keywords LONGTEXT DEFAULT NULL, categories LONGTEXT DEFAULT NULL, owner LONGTEXT DEFAULT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sandstorm_neosh5p_domain_model_contentuserdata (content VARCHAR(40) NOT NULL, account VARCHAR(40) NOT NULL, dataid VARCHAR(255) NOT NULL, subcontent VARCHAR(40) DEFAULT NULL, data LONGTEXT NOT NULL, preload TINYINT(1) NOT NULL, invalidate TINYINT(1) NOT NULL, updatedat DATETIME NOT NULL, INDEX IDX_89893D83FEC530A9 (content), INDEX IDX_89893D837D3656A4 (account), INDEX IDX_89893D83B5A79866 (subcontent), PRIMARY KEY(content, account, dataid)) DEFAULT CHARACTER SET utf8 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sandstorm_neosh5p_domain_model_librarydependency (library VARCHAR(40) NOT NULL, requiredlibrary VARCHAR(40) NOT NULL, dependencytype VARCHAR(255) NOT NULL, INDEX IDX_4F1B456FA18098BC (library), INDEX IDX_4F1B456FD600A0B (requiredlibrary), PRIMARY KEY(library, requiredlibrary)) DEFAULT CHARACTER SET utf8 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sandstorm_neosh5p_domain_model_librarytranslation (library VARCHAR(40) NOT NULL, languagecode VARCHAR(255) NOT NULL, translation LONGTEXT NOT NULL, INDEX IDX_196E8E39A18098BC (library), PRIMARY KEY(library, languagecode)) DEFAULT CHARACTER SET utf8 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sandstorm_neosh5p_domain_model_editortempfile (persistence_object_identifier VARCHAR(40) NOT NULL, resource VARCHAR(40) DEFAULT NULL, createdat DATETIME NOT NULL, temporaryfilename VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9D86C51BBC91F416 (resource), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sandstorm_neosh5p_domain_model_content (persistence_object_identifier VARCHAR(40) NOT NULL, library VARCHAR(40) DEFAULT NULL, account VARCHAR(40) DEFAULT NULL, zippedcontentfile VARCHAR(40) DEFAULT NULL, exportfile VARCHAR(40) DEFAULT NULL, contentid INT AUTO_INCREMENT UNIQUE, createdat DATETIME NOT NULL, updatedat DATETIME NOT NULL, title VARCHAR(255) NOT NULL, parameters LONGTEXT NOT NULL, filtered LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, embedtype VARCHAR(255) NOT NULL, disable INT NOT NULL, contenttype VARCHAR(255) DEFAULT NULL, author VARCHAR(255) DEFAULT NULL, license VARCHAR(255) DEFAULT NULL, keywords LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_1727B66FA18098BC (library), INDEX IDX_1727B66F7D3656A4 (account), UNIQUE INDEX UNIQ_1727B66FB06EFCEE (zippedcontentfile), UNIQUE INDEX UNIQ_1727B66FA9F268DA (exportfile), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sandstorm_neosh5p_domain_model_library (persistence_object_identifier VARCHAR(40) NOT NULL, zippedlibraryfile VARCHAR(40) DEFAULT NULL, libraryid INT AUTO_INCREMENT UNIQUE, createdat DATETIME NOT NULL, updatedat DATETIME NOT NULL, name VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, majorversion INT NOT NULL, minorversion INT NOT NULL, patchversion INT NOT NULL, runnable TINYINT(1) NOT NULL, restricted TINYINT(1) NOT NULL, fullscreen TINYINT(1) NOT NULL, embedtypes VARCHAR(255) NOT NULL, preloadedjs LONGTEXT NOT NULL, preloadedcss LONGTEXT NOT NULL, droplibrarycss LONGTEXT NOT NULL, semantics LONGTEXT NOT NULL, tutorialurl LONGTEXT NOT NULL, hasicon TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_48621E7A7618A0BE (zippedlibraryfile), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sandstorm_neosh5p_domain_model_library_cachedassets_join (neosh5p_library VARCHAR(40) NOT NULL, neosh5p_cachedasset VARCHAR(40) NOT NULL, INDEX IDX_ABAE0A662E33B826 (neosh5p_library), INDEX IDX_ABAE0A662C4D8F51 (neosh5p_cachedasset), PRIMARY KEY(neosh5p_library, neosh5p_cachedasset)) DEFAULT CHARACTER SET utf8 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_cachedasset ADD CONSTRAINT FK_7712B6E1BC91F416 FOREIGN KEY (resource) REFERENCES neos_flow_resourcemanagement_persistentresource (persistence_object_identifier) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_contentdependency ADD CONSTRAINT FK_65007AE0FEC530A9 FOREIGN KEY (content) REFERENCES sandstorm_neosh5p_domain_model_content (persistence_object_identifier)');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_contentdependency ADD CONSTRAINT FK_65007AE0A18098BC FOREIGN KEY (library) REFERENCES sandstorm_neosh5p_domain_model_library (persistence_object_identifier)');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_contentresult ADD CONSTRAINT FK_51C3A35AFEC530A9 FOREIGN KEY (content) REFERENCES sandstorm_neosh5p_domain_model_content (persistence_object_identifier)');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_contentresult ADD CONSTRAINT FK_51C3A35A7D3656A4 FOREIGN KEY (account) REFERENCES neos_flow_security_account (persistence_object_identifier) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_contentuserdata ADD CONSTRAINT FK_89893D83FEC530A9 FOREIGN KEY (content) REFERENCES sandstorm_neosh5p_domain_model_content (persistence_object_identifier)');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_contentuserdata ADD CONSTRAINT FK_89893D837D3656A4 FOREIGN KEY (account) REFERENCES neos_flow_security_account (persistence_object_identifier) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_contentuserdata ADD CONSTRAINT FK_89893D83B5A79866 FOREIGN KEY (subcontent) REFERENCES sandstorm_neosh5p_domain_model_content (persistence_object_identifier)');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_librarydependency ADD CONSTRAINT FK_4F1B456FA18098BC FOREIGN KEY (library) REFERENCES sandstorm_neosh5p_domain_model_library (persistence_object_identifier)');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_librarydependency ADD CONSTRAINT FK_4F1B456FD600A0B FOREIGN KEY (requiredlibrary) REFERENCES sandstorm_neosh5p_domain_model_library (persistence_object_identifier)');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_librarytranslation ADD CONSTRAINT FK_196E8E39A18098BC FOREIGN KEY (library) REFERENCES sandstorm_neosh5p_domain_model_library (persistence_object_identifier)');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_editortempfile ADD CONSTRAINT FK_9D86C51BBC91F416 FOREIGN KEY (resource) REFERENCES neos_flow_resourcemanagement_persistentresource (persistence_object_identifier) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_content ADD CONSTRAINT FK_1727B66FA18098BC FOREIGN KEY (library) REFERENCES sandstorm_neosh5p_domain_model_library (persistence_object_identifier) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_content ADD CONSTRAINT FK_1727B66F7D3656A4 FOREIGN KEY (account) REFERENCES neos_flow_security_account (persistence_object_identifier) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_content ADD CONSTRAINT FK_1727B66FB06EFCEE FOREIGN KEY (zippedcontentfile) REFERENCES neos_flow_resourcemanagement_persistentresource (persistence_object_identifier)');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_content ADD CONSTRAINT FK_1727B66FA9F268DA FOREIGN KEY (exportfile) REFERENCES neos_flow_resourcemanagement_persistentresource (persistence_object_identifier)');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_library ADD CONSTRAINT FK_48621E7A7618A0BE FOREIGN KEY (zippedlibraryfile) REFERENCES neos_flow_resourcemanagement_persistentresource (persistence_object_identifier)');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_library_cachedassets_join ADD CONSTRAINT FK_ABAE0A662E33B826 FOREIGN KEY (neosh5p_library) REFERENCES sandstorm_neosh5p_domain_model_library (persistence_object_identifier)');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_library_cachedassets_join ADD CONSTRAINT FK_ABAE0A662C4D8F51 FOREIGN KEY (neosh5p_cachedasset) REFERENCES sandstorm_neosh5p_domain_model_cachedasset (persistence_object_identifier)');
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');

        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_library_cachedassets_join DROP FOREIGN KEY FK_ABAE0A662C4D8F51');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_contentdependency DROP FOREIGN KEY FK_65007AE0FEC530A9');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_contentresult DROP FOREIGN KEY FK_51C3A35AFEC530A9');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_contentuserdata DROP FOREIGN KEY FK_89893D83FEC530A9');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_contentuserdata DROP FOREIGN KEY FK_89893D83B5A79866');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_contentdependency DROP FOREIGN KEY FK_65007AE0A18098BC');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_librarydependency DROP FOREIGN KEY FK_4F1B456FA18098BC');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_librarydependency DROP FOREIGN KEY FK_4F1B456FD600A0B');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_librarytranslation DROP FOREIGN KEY FK_196E8E39A18098BC');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_content DROP FOREIGN KEY FK_1727B66FA18098BC');
        $this->addSql('ALTER TABLE sandstorm_neosh5p_domain_model_library_cachedassets_join DROP FOREIGN KEY FK_ABAE0A662E33B826');
        $this->addSql('DROP TABLE sandstorm_neosh5p_domain_model_cachedasset');
        $this->addSql('DROP TABLE sandstorm_neosh5p_domain_model_configsetting');
        $this->addSql('DROP TABLE sandstorm_neosh5p_domain_model_contentdependency');
        $this->addSql('DROP TABLE sandstorm_neosh5p_domain_model_contentresult');
        $this->addSql('DROP TABLE sandstorm_neosh5p_domain_model_contenttypecacheentry');
        $this->addSql('DROP TABLE sandstorm_neosh5p_domain_model_contentuserdata');
        $this->addSql('DROP TABLE sandstorm_neosh5p_domain_model_librarydependency');
        $this->addSql('DROP TABLE sandstorm_neosh5p_domain_model_librarytranslation');
        $this->addSql('DROP TABLE sandstorm_neosh5p_domain_model_editortempfile');
        $this->addSql('DROP TABLE sandstorm_neosh5p_domain_model_content');
        $this->addSql('DROP TABLE sandstorm_neosh5p_domain_model_library');
        $this->addSql('DROP TABLE sandstorm_neosh5p_domain_model_library_cachedassets_join');
    }
}
