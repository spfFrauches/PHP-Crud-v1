<?php

namespace App\Controller\Http;

use App\Classes\LoadViewsController;

class CadastrosController
{
    
    public function usuarios()
    {
        $_SESSION['url'] = "caduser";
        (new LoadViewsController)->header();
        require './App/Views/cadastroUsuario/formulario.php';
        (new LoadViewsController)->footer();
        
    }
    
}

