<?php

namespace App\Controller\Http;
use App\Classes\LoadViewsController;
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
        
        
        (new LoadViewsController)->header();
        
        /* var_dump($mySQL); */
        
        require './App/Views/confSistema/indexBancoDados.php';
        
               
        (new LoadViewsController)->footer();
        
    }
    
}

