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
        
        (new LoadViews)->header();        
        require './App/Views/confSistema/indexBancoDados.php';
        (new LoadViews)->footer();       
    }
}

