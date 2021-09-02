<?php

/* Por Saulo Frauches 12/01/2021 */

/* Usando o padrão de projeto (desig parter) 
 * para garantir apenas uma instancia de uma classe 
 * ao banco de dados 
 */

namespace App\Models;

abstract class Connection {
    
    private static $conn;
              
    public static function getMySQL() {
        
       if (!isset(self::$conn)) {  
           
           /* Pegando informações do siv.ini e atribuindo ao array */
               
           $getSivIni = parse_ini_file('./siv.ini', true);
   
            try {  
                $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', \PDO::ATTR_PERSISTENT => TRUE);  
                self::$conn = new \PDO("mysql:host=" . $getSivIni['SFI']['Servidor'] . "; dbname=" . $getSivIni['SFI']['DataBase'] . "", USER, PASSWORD, $opcoes);    
            } catch (\PDOException $e) {  
                exit( "Erro ao se conectao na base de dados.: " . $e->getMessage() );  
            }  
        } 
        
        return self::$conn;  
           
    }
    /* Adicionar mais segurança na classe, ninguem controe, clone */
    private function __construct() { }
    private function __clone()  { }
    private function __wakeup() { }
    
      
}


