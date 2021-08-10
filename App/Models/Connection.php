<?php


namespace App\Models;

class Connection {
    
    public $conn;
    public $msg;
              
    public function getMySQL() 
    {
        
        if (!isset($this->conn)) {  
            
            try {  
                $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', \PDO::ATTR_PERSISTENT => TRUE);  
                self::$conn = new \PDO("mysql:host=localhost; dbname=test", USER, PASSWORD, $opcoes);    
            } catch (\PDOException $e) {  
                $this->msg =  "Erro ao se conectao na base de dados.: " . $e->getMessage();
                return "ErroAccess";
            }  
        } 
        
        return $this->conn;  
           
    }

         
}


