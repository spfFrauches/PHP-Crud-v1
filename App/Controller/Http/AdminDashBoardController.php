<?php

namespace App\Controller\Http;

use App\Classes\LoadViews;
use App\Modulos\DashBoardUsuarios\UsuariosController;
use App\Modulos\DashBoardConfiguracaoSistema\ConfiguracaoSistemaController;

class AdminDashBoardController
{
    
    public function home()
    {
        $_SESSION['url'] = "home";
        (new LoadViews)->header();
        require './App/Modulos/DashBoardHome/index.php';        
        (new LoadViews)->footer();
    }

    public function usuarios($param = null)
    {
       if ($param == null) :
           $param = 'formulario';
       endif;
       UsuariosController::start($param);   
    }
    
    public function configuracaoSistema($param = null)
    {
       if ($param == null) :
           $param = 'index';
       endif;
       ConfiguracaoSistemaController::start($param);   
    }

    
    
    
}

