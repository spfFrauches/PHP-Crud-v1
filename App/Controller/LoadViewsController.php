<?php

namespace App\Controller;

class LoadViewsController
{
    
    public function header()
    {
        require './App/Views/templates/basicDashBoarTemplate-Header.php';   
    }
    
    public function footer()
    {
        require './App/Views/templates/basicDashBoarTemplate-Footer.php';        
    }
    
    public function template()
    {
        return require './App/Views/templates/basicDashBoardTemplate.php';
    }
    
}

