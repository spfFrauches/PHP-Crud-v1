<?php

//namespace Controller;

class CoreBasicRouterController
{
    
    public function start($urlGet) {
                
        if (isset($urlGet['url'])):
            
            $url = explode("/", $_REQUEST['url']);
            var_dump($url);
            
            if (isset($url[0])):
                
                /* Pegando o primeiro parametro da url para o controller */
                $controller = ucfirst($url[0]).'Controller';
                var_dump ($controller);
                array_shift($url); 
                
                if (isset($url[0])):
                    
                    /* Pegando o segundo parametro da url para o metodo */
                    $method = $url[0];
                    var_dump ($method);
                    array_shift($url);
                    $params = $url;
                    
                endif;
                
            endif;
                       
        endif;
        
        /*       
        $controller = 'HomeController';
        $method = 'index';
        $params = [];
        
        if (isset($_REQUEST['url'])) :              
            $url = explode("/", $_REQUEST['url']);
            if (isset($url[0])) {  
                $controller = ucfirst($url[0]).'Controller';
                array_shift($url); 
                if (isset($url[0])) {                    
                    $method = $url[0];
                    array_shift($url);    
                    $params = $url;
                }
                if (!class_exists($controller)) {  
                    $controller = "NotFoundController";
                    $method = "pageNotFound";                    
                }
                call_user_func_array(array(new $controller, $method), $params);  
                return true;  
            }                            
        endif;
        
        call_user_func_array (array(new $controller, $method), $params) ; 
        * 
        */   
       
      
   }
    
    
}

