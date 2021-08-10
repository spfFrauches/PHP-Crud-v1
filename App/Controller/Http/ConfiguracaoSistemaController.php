<?php

namespace App\Controller\Http;
use App\Controller\LoadViewsController;
use App\Models\Connection;

class ConfiguracaoSistemaController
{
  
    public function bancoDados()
    {
        
        $mySQL = (new Connection)->getMySQL();
               
        $_SESSION['url'] = 'bancodados';
        (new LoadViewsController)->header();
        
        var_dump($mySQL->msg);
        
        require './App/Views/confSistema/indexBancoDados.php';
        (new LoadViewsController)->footer();
        
    }
    
}

