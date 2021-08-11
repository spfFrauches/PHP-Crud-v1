<?php

namespace App\Controller\Http;
use App\Controller\LoadViewsController;
use App\Models\ConexaoBancoDados;

class ConfiguracaoSistemaController
{
  
    public function bancoDados()
    {
        $_SESSION['url'] = 'bancodados';
        
        $mySQL = new ConexaoBancoDados;
        $mysql = $mySQL->getMySQL(); 
        
        if ($mySQL->conn == null):           
            $noConn = true;
        endif;
        
        
        (new LoadViewsController)->header();
        
        require './App/Views/confSistema/indexBancoDados.php';
        var_dump($mySQL->conn);
               
        (new LoadViewsController)->footer();
        
    }
    
}

