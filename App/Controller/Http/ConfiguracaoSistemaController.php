<?php

namespace App\Controller\Http;
use App\Classes\LoadViews;
use App\Models\ConexaoBancoDados;

class ConfiguracaoSistemaController
{
    public function bancoDados()
    {    
        $_SESSION['url'] = 'bancodados';
        
        $mySQL = new ConexaoBancoDados;
        $mysql = $mySQL->getMySQL(); 
        
        if ($mySQL->conn):           
            $verifyConn = "yes";
        endif;
        
        if ($mySQL->conn == null):           
            $verifyConn = "no";
            $detalhes = $mySQL->ErrorMsg;
        endif;
        
        $checktabelas  = self::checktabelas(); 
                
        (new LoadViews)->header();        
        require './App/Views/confSistema/indexBancoDados.php';
        (new LoadViews)->footer();       
    }
    
    public static function checktabelas()
    {
        
        $mySQL = new ConexaoBancoDados;
        $mysql = $mySQL->getMySQL();
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
    
    public function configurarBaseDados()
    {
        
        $mySQL = new ConexaoBancoDados;
        $mysql = $mySQL->getMySQL();
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
        
        if ($sql->execute()):    
            $url = URL."configuracaoSistema/bancodados";
            header("Location: $url ");     
            else:
            (new LoadViews)->header();        
            echo "<br/><br/><h1>ERRO</h1><br/><br/>";
            (new LoadViews)->footer();  
        endif;
        
        
    }
}

