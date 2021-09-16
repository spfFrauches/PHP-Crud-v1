<?php

namespace App\Models;

use App\Models\ConexaoBancoDados;

class UsuarioModels
{
       
    public static function insert($dados)
    {        
        $mySQL = new ConexaoBancoDados;
        $mysql = $mySQL->getMySQL();     
        $mysql->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        
        extract($dados);
                
        $table = "A001User";
        
        $sql    = "INSERT INTO $table "
                . "(NomeUser, EmailUser, PasswdUser, NivelPermUser, StatusUser, ObsComplementarUser) "
                . "VALUES"
                . "('$NomeUser', '$EmailUser', '$PasswordUser', '$NivelPermUser', '$StatusUser', '$ObsComplementarUser' )";
        
        try {
            
            $sql = $mysql->prepare($sql);
            
            if ($sql->execute()):
                return "success";
            endif;
            
        } catch (\PDOException $e) {
            return "error.: $e";
        }       
    }
    
    
    
    public static function listar() 
    {      
        $mySQL = new ConexaoBancoDados;
        $mysql = $mySQL->getMySQL();     
        $mysql->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        
        $table = "A001User";
        
        $sql    = "SELECT * FROM $table";

        $sql = $mysql->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_OBJ);           
    }
    
    
    public static function listarPorCod($cod)
    {      
        $mySQL = new ConexaoBancoDados;
        $mysql = $mySQL->getMySQL();     
        $mysql->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        
        $table = "A001User";
        
        $sql    = "SELECT * FROM $table WHERE CodUser = '$cod'";
        $sql = $mysql->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_OBJ);      
    }
    
    
}

