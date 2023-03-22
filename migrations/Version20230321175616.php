<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321175616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ant_heredofamiliares ADD consulta_id INT');
        $this->addSql('ALTER TABLE ant_heredofamiliares ADD CONSTRAINT FK_1300864FE38D288B FOREIGN KEY (consulta_id) REFERENCES consulta (id)');
        $this->addSql('CREATE INDEX IDX_1300864FE38D288B ON ant_heredofamiliares (consulta_id)');
        $this->addSql('ALTER TABLE ant_laborales ADD consulta_id INT');
        $this->addSql('ALTER TABLE ant_laborales ADD CONSTRAINT FK_C8C89AC4E38D288B FOREIGN KEY (consulta_id) REFERENCES consulta (id)');
        $this->addSql('CREATE INDEX IDX_C8C89AC4E38D288B ON ant_laborales (consulta_id)');
        $this->addSql('ALTER TABLE ant_no_patologicos ADD consulta_id INT');
        $this->addSql('ALTER TABLE ant_no_patologicos ADD CONSTRAINT FK_71DC61C4E38D288B FOREIGN KEY (consulta_id) REFERENCES consulta (id)');
        $this->addSql('CREATE INDEX IDX_71DC61C4E38D288B ON ant_no_patologicos (consulta_id)');
        $this->addSql('ALTER TABLE ant_patologicos ADD consulta_id INT');
        $this->addSql('ALTER TABLE ant_patologicos ADD CONSTRAINT FK_82012304E38D288B FOREIGN KEY (consulta_id) REFERENCES consulta (id)');
        $this->addSql('CREATE INDEX IDX_82012304E38D288B ON ant_patologicos (consulta_id)');
        $this->addSql('ALTER TABLE ant_quirugicos ADD consulta_id INT');
        $this->addSql('ALTER TABLE ant_quirugicos ADD CONSTRAINT FK_B8B1ED80E38D288B FOREIGN KEY (consulta_id) REFERENCES consulta (id)');
        $this->addSql('CREATE INDEX IDX_B8B1ED80E38D288B ON ant_quirugicos (consulta_id)');
        $this->addSql('ALTER TABLE ant_reproductivos ADD consulta_id INT');
        $this->addSql('ALTER TABLE ant_reproductivos ADD CONSTRAINT FK_6935DC3FE38D288B FOREIGN KEY (consulta_id) REFERENCES consulta (id)');
        $this->addSql('CREATE INDEX IDX_6935DC3FE38D288B ON ant_reproductivos (consulta_id)');
        $this->addSql('ALTER TABLE medicamentos ALTER COLUMN codigo INT');
        $this->addSql('ALTER TABLE otros_antecedentes ADD consulta_id INT');
        $this->addSql('ALTER TABLE otros_antecedentes ADD CONSTRAINT FK_D34EDCF4E38D288B FOREIGN KEY (consulta_id) REFERENCES consulta (id)');
        $this->addSql('CREATE INDEX IDX_D34EDCF4E38D288B ON otros_antecedentes (consulta_id)');
        $this->addSql('ALTER TABLE pacientes ALTER COLUMN ciudad_id INT');
        $this->addSql('ALTER TABLE pacientes ALTER COLUMN celular NVARCHAR(30)');
        $this->addSql('ALTER TABLE pacientes ALTER COLUMN historia_clinica NVARCHAR(255)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_971B78517BF39BE0 ON pacientes (cedula) WHERE cedula IS NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE ant_heredofamiliares DROP CONSTRAINT FK_1300864FE38D288B');
        $this->addSql('
                        IF EXISTS (SELECT * FROM sysobjects WHERE name = \'IDX_1300864FE38D288B\')
                            ALTER TABLE ant_heredofamiliares DROP CONSTRAINT IDX_1300864FE38D288B
                        ELSE
                            DROP INDEX IDX_1300864FE38D288B ON ant_heredofamiliares
                    ');
        $this->addSql('ALTER TABLE ant_heredofamiliares DROP COLUMN consulta_id');
        $this->addSql('ALTER TABLE ant_laborales DROP CONSTRAINT FK_C8C89AC4E38D288B');
        $this->addSql('
                        IF EXISTS (SELECT * FROM sysobjects WHERE name = \'IDX_C8C89AC4E38D288B\')
                            ALTER TABLE ant_laborales DROP CONSTRAINT IDX_C8C89AC4E38D288B
                        ELSE
                            DROP INDEX IDX_C8C89AC4E38D288B ON ant_laborales
                    ');
        $this->addSql('ALTER TABLE ant_laborales DROP COLUMN consulta_id');
        $this->addSql('ALTER TABLE ant_no_patologicos DROP CONSTRAINT FK_71DC61C4E38D288B');
        $this->addSql('
                        IF EXISTS (SELECT * FROM sysobjects WHERE name = \'IDX_71DC61C4E38D288B\')
                            ALTER TABLE ant_no_patologicos DROP CONSTRAINT IDX_71DC61C4E38D288B
                        ELSE
                            DROP INDEX IDX_71DC61C4E38D288B ON ant_no_patologicos
                    ');
        $this->addSql('ALTER TABLE ant_no_patologicos DROP COLUMN consulta_id');
        $this->addSql('ALTER TABLE ant_patologicos DROP CONSTRAINT FK_82012304E38D288B');
        $this->addSql('
                        IF EXISTS (SELECT * FROM sysobjects WHERE name = \'IDX_82012304E38D288B\')
                            ALTER TABLE ant_patologicos DROP CONSTRAINT IDX_82012304E38D288B
                        ELSE
                            DROP INDEX IDX_82012304E38D288B ON ant_patologicos
                    ');
        $this->addSql('ALTER TABLE ant_patologicos DROP COLUMN consulta_id');
        $this->addSql('ALTER TABLE ant_quirugicos DROP CONSTRAINT FK_B8B1ED80E38D288B');
        $this->addSql('
                        IF EXISTS (SELECT * FROM sysobjects WHERE name = \'IDX_B8B1ED80E38D288B\')
                            ALTER TABLE ant_quirugicos DROP CONSTRAINT IDX_B8B1ED80E38D288B
                        ELSE
                            DROP INDEX IDX_B8B1ED80E38D288B ON ant_quirugicos
                    ');
        $this->addSql('ALTER TABLE ant_quirugicos DROP COLUMN consulta_id');
        $this->addSql('ALTER TABLE ant_reproductivos DROP CONSTRAINT FK_6935DC3FE38D288B');
        $this->addSql('
                        IF EXISTS (SELECT * FROM sysobjects WHERE name = \'IDX_6935DC3FE38D288B\')
                            ALTER TABLE ant_reproductivos DROP CONSTRAINT IDX_6935DC3FE38D288B
                        ELSE
                            DROP INDEX IDX_6935DC3FE38D288B ON ant_reproductivos
                    ');
        $this->addSql('ALTER TABLE ant_reproductivos DROP COLUMN consulta_id');
        $this->addSql('ALTER TABLE medicamentos ALTER COLUMN codigo NVARCHAR(15) COLLATE Traditional_Spanish_CI_AS');
        $this->addSql('ALTER TABLE otros_antecedentes DROP CONSTRAINT FK_D34EDCF4E38D288B');
        $this->addSql('
                        IF EXISTS (SELECT * FROM sysobjects WHERE name = \'IDX_D34EDCF4E38D288B\')
                            ALTER TABLE otros_antecedentes DROP CONSTRAINT IDX_D34EDCF4E38D288B
                        ELSE
                            DROP INDEX IDX_D34EDCF4E38D288B ON otros_antecedentes
                    ');
        $this->addSql('ALTER TABLE otros_antecedentes DROP COLUMN consulta_id');
        $this->addSql('
                        IF EXISTS (SELECT * FROM sysobjects WHERE name = \'UNIQ_971B78517BF39BE0\')
                            ALTER TABLE pacientes DROP CONSTRAINT UNIQ_971B78517BF39BE0
                        ELSE
                            DROP INDEX UNIQ_971B78517BF39BE0 ON pacientes
                    ');
        $this->addSql('ALTER TABLE pacientes ALTER COLUMN ciudad_id INT NOT NULL');
        $this->addSql('ALTER TABLE pacientes ALTER COLUMN celular NVARCHAR(10) COLLATE Traditional_Spanish_CI_AS');
        $this->addSql('ALTER TABLE pacientes ALTER COLUMN historia_clinica NVARCHAR(255) COLLATE Traditional_Spanish_CI_AS NOT NULL');
    }
}
