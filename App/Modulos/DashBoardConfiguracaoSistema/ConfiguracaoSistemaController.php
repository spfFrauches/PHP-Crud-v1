<?php

namespace App\Modulos\DashBoardConfiguracaoSistema;

use App\Classes\LoadViews;
use App\Models\CriarBaseDadosModel;
use App\Models\ConexaoBancoDados;

class ConfiguracaoSistemaController
{

    public static function start($param)
    {
               
        
        if ($param[0] == 'configuracaoSistema'):
            self::index();
            exit();
        endif; 

        if ($param[0] == 'index'):
            self::index();
            exit();
        endif; 
        if ($param[0] == 'criarBaseDados'):
            self::criarBaseDados();
            exit();
        endif; 

    }
    
    public static function index()
    {
        $mySQL = new ConexaoBancoDados;
        $mysql = $mySQL->getMySQL(); 
        
        if ($mySQL->conn):           
            $verifyConn = "yes";
        endif;
        
        if ($mySQL->conn == null):           
            $verifyConn = "no";
            $detalhes = $mySQL->ErrorMsg;
        endif;
        
        $checktabelas  = CriarBaseDadosModel::checkTables();
        
        (new LoadViews)->header();        
        require './App/Modulos/DashBoardConfiguracaoSistema/ConfiguracaoSistemaViewIndex.php';
        (new LoadViews)->footer();  
    }
    
    public static function criarBaseDados()
    {
              
        $createTables = CriarBaseDadosModel::criarTabelas();
        
        if ($createTables == "created"):
            $url = URL."adminDashBoard/configuracaoSistema";
            header("Location: $url ");
            else:
            (new LoadViews)->header();        
            echo "<br/><br/><h1>ERRO</h1><br/><br/>";
            (new LoadViews)->footer(); 
        endif;
                   
    }
    
    
    
    
}