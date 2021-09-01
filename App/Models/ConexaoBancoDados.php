<?php


namespace App\Models;

class ConexaoBancoDados {
    
    public $conn;
    public $ErrorMsg;
    public $ErrorResumeMsg;
              
    public function getMySQL() 
    {                 
        try {  
            $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', \PDO::ATTR_PERSISTENT => TRUE);  
            $this->conn = new \PDO("mysql:host=".HOSTDB."; dbname=".DATABASE."", USER, PASSWORD, $opcoes);    
        } catch (\PDOException $e) {  
            $this->ErrorMsg =  $e->getMessage();
            $this->ErrorResumeMsg = "ErroConexao";
        }     
        return $this->conn;  
    }

         
}


