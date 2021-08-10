<?php

namespace App\Controller;

use App\Models\Connection;

class DataBaseController
{
    
    public function checkDataBase()
    {
      
        $mySQL = Connection::getMySQL();
        var_dump($mySQL);
        
    }
    
}

