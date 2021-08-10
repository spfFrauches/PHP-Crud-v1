<?php

namespace App\Controller\Http;
use App\Controller\LoadViewsController;

class HomeDashBoardController
{
    
    public function indexOldExemple()
    {
        /* Teste  */
        $template = file_get_contents ("./App/Views/templates/basicDashBoardTemplate.php");                
        ob_start();        
        require './App/Views/home/index.php';
        $saida = ob_get_contents();
        ob_end_clean();
        $find = ["{{backendPHP}}"];
        $replace = [$saida];
        $printTemplate = str_replace($find, $replace, $template);
        echo $printTemplate;
        
    }
    
    public function index()
    {
        $_SESSION['url'] = "home";
        (new LoadViewsController)->header();
        require './App/Views/home/index.php';        
        (new LoadViewsController)->footer();
        
    }
    
}


