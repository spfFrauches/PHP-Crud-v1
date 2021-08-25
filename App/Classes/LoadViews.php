<?php

namespace App\Classes;

class LoadViews
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

