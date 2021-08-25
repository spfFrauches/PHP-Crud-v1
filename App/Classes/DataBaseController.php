<?php

namespace App\Classes;

use App\Models\Connection;

class DataBaseController
{
    
    public function checkDataBase()
    {
      
        $mySQL = Connection::getMySQL();
        var_dump($mySQL);
        /*
         * 
         *  CREATE TABLE `phpcrudv1`.`A001User` (
            `CodUser` INT NOT NULL AUTO_INCREMENT COMMENT 'Código do usuário - Chave primária',
            `NomeUser` VARCHAR(100) NOT NULL COMMENT 'Nome Completo do Usuarío',
            `EmailUser` VARCHAR(150) NOT NULL COMMENT 'E-mail do usuário e login',
            `PasswdUser` VARCHAR(45) NOT NULL COMMENT 'Senha de acesso',
            `NivelPermUser` TINYINT NOT NULL COMMENT 'Nivel de permissão | 0:Admin | 1:Comum | 2:Apenas Leitura',
            `StatusUser` TINYINT NOT NULL COMMENT 'Status para acesso ao sistema | 0: Ativo | 1: Inativo',
            `DthrCriacao` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `DrhrUltAlteracao` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`CodUser`));
         * 
         * 
         */
        
    }
    
}

