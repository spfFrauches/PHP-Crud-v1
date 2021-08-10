<?php

namespace App\Controller\Http;

class HomeDashBoardController
{
    
    public function index()
    {
        
        $template = file_get_contents ("./app/views/templates/basicDashBoardTemplate.php"); 
        
        //require './app/views/templates/basicDashBoardTemplate.php';
                
        ob_start();        
        require './app/views/home/index.php';
        $saida = ob_get_contents();
        ob_end_clean();
        
        $find = ["{{backendPHP}}"];
        $replace = [$saida];
        
        $printTemplate = str_replace($find, $replace, $template);
        echo $printTemplate;
        
    }
    
}


