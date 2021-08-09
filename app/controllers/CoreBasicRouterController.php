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
                    
                    /* Os demais parametros da URL vão como parametro para os métodos */
                    $params = $url;
                    
                    if (!class_exists($controller)) {  
                        $controller = "NotFoundController";
                        $method = "pageNotFound"; 
                    }
                    
                    var_dump ($controller);
                    var_dump ($method);
                    
                    // call_user_func_array(array(new $controller, $method), $params);
                    
                endif;
                
            endif;
           
            // call_user_func_array (array(new $controller, $method), $params) ; 
                       
        endif;     
      
   }
    
}

