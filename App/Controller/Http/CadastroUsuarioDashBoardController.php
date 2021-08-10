<?php

namespace App\Controller\Http;

use App\Controller\LoadViewsController;

class CadastroUsuarioDashBoardController
{
    
    public function form()
    {
        $_SESSION['url'] = "caduser";
        (new LoadViewsController)->header();
        require './App/Views/cadastroUsuario/formulario.php';
        (new LoadViewsController)->footer();
        
    }
    
}

