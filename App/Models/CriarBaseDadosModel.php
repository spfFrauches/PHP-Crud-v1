<?php

namespace App\Models;

use App\Models\ConexaoBancoDados;

class CriarBaseDadosModel
{
    
    public static function checkTables()
    {
        
        $mySQL = new ConexaoBancoDados;
        $mysql = $mySQL->getMySQL();
             
        
        //var_dump($mysql);
        //exit();
        
        $mysql->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                
        $sql = "Show tables";
        $sql = $mysql->prepare($sql);
        $sql->execute();
        
        $resultado = []; 
        
        while ($row = $sql->fetchColumn()) {
            $resultado[] = $row;
        }
        
        if (in_array('A001User', $resultado)) {
            $checked = "yes";
        } else {
            $checked = "notable";
        }
        
        return $checked;       
    }
    
    
    
    public static function criarTabelas()
    {
        
        $mySQL = new ConexaoBancoDados;
        $mysql = $mySQL->getMySQL();
        
        //var_dump($mysql);
        
        //exit();
        
        $mysql->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
        
        $sql = "CREATE TABLE A001User  ( "
                . "CodUser INT NOT NULL AUTO_INCREMENT COMMENT 'Código do usuário - Chave primária', "
                . "NomeUser VARCHAR(100) NOT NULL COMMENT 'Nome Completo do Usuarío', "
                . "EmailUser VARCHAR(150) NOT NULL COMMENT 'E-mail do usuário e login', "
                . "PasswdUser VARCHAR(45) NOT NULL COMMENT 'Senha de acesso', "
                . "NivelPermUser TINYINT NOT NULL COMMENT 'Nivel de permissão | 0:Admin | 1:Comum | 2:Apenas Leitura', "
                . "StatusUser TINYINT NOT NULL COMMENT 'Status para acesso ao sistema | 0: Ativo | 1: Inativo', "
                . "DthrCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, "
                . "DrhrUltAlteracao DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP, "
                . "PRIMARY KEY (CodUser))";
       
        $sql = $mysql->prepare($sql);
        
        /* Lembrar de montar try catch com exceções de erro */
        
        if ($sql->execute()):    
            return "created";
            else:
            return "error";
        endif;
        
        
    }
    
}

