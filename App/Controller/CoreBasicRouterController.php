<?php

namespace App\Controller;

class CoreBasicRouterController
{ 
    
    public function start($urlGet) 
    {
        
        //var_dump($urlGet);
        //exit();
        
        $classe = "AdminDashBoardController";
        $method = "home";
        $params = [];        
        $controller = "\\App\\Controller\\Http\\".$classe;
          
        if (isset($urlGet['url'])) :
                        
            $url = explode("/", $_REQUEST['url']);
            
            if (isset($url[0])):
                               
                /* Pegando o primeiro parametro da url para o controller */
                $classe = ucfirst($url[0]).'Controller';
                $controller = "\\App\\Controller\\Http\\".$classe;
                array_shift($url);
                
                if (!class_exists($controller)): 
                    
                    $classe = "NotFoundController";
                    $controller = "\\App\\Controller\\Http\\".$classe;
                    $method = "pageNotFound"; 
                    $params = []; 
                    return call_user_func_array(array(new $controller, $method), $params);
                    
                endif;
                
                if (isset($url[0])):                  
                    /* Pegando o segundo parametro da url para o metodo */
                    $method = $url[0];
                    array_shift($url);
                    /* Os demais parametros da URL vão como parametro para os métodos */
                    $params = $url;                   
                endif;
                
            endif; 
            
        endif;
        
        /*
        * var_dump ($controller);
        * var_dump ($method);
        * var_dump ($params);
        * 
        */

        call_user_func_array (array (new $controller, $method), $params) ; 
      
    }
    
}

