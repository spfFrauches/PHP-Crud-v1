<?php

namespace App\Modulos\DashBoardUsuarios;

use App\Classes\LoadViews;

class UsuariosController
{
    
    public static function start($param)
    {
        $_SESSION['url'] = "caduser";
        
        if ($param == 'formulario'):
            self::formularioCadastro();
            exit();
        endif; 
        if ($param == 'create'):
            self::create();
            exit();
        endif; 
                
    }
    
    public static function formularioCadastro()
    {
        (new LoadViews)->header();
        require __DIR__.'/UsuariosViewFormularioCadastro.php';
        (new LoadViews)->footer();  
    }
    
       
    public static function create()
    {
      
        echo "Ola Mundo. Create";
        $postsForm = self::validarDadosFormulario();    
        var_dump($postsForm);
               
    }
    
    public static function validarDadosFormulario()
    {      
     
        if (!isset($_POST['NomeUser']) || $_POST['NomeUser'] == '' ):
            exit("Nome de usuário não informado");
        endif;
        
        if (!isset($_POST['EmailUser']) || $_POST['EmailUser'] == '' ):
            exit("Email de usuário não informado");
        endif;
        
        if ( !isset($_POST['NivelPermUser']) || $_POST['NivelPermUser'] == ''):
            exit("Nível de permissão de usuário não informado");
        endif;
      
        if ( !isset($_POST['StatusUser']) || $_POST['StatusUser'] == ''):
            exit("Status de permissão de usuário não informado");
        endif;
        
        $retorno = [];
        
        $retorno['NomeUser']  = filter_var ($_POST['NomeUser'], FILTER_SANITIZE_STRING);
        $retorno['EmailUser'] = filter_var ($_POST['EmailUser'], FILTER_SANITIZE_EMAIL);
        $retorno['NivelPermUser'] = filter_var ($_POST['NivelPermUser'], FILTER_SANITIZE_NUMBER_INT);
        $retorno['StatusUser'] = filter_var ($_POST['StatusUser'], FILTER_SANITIZE_NUMBER_INT);
        $retorno['passwordUser'] = $_POST['passwordUser'];
        $retorno['passwordUserConfirm'] = $_POST['passwordUserConfirm'];
        $retorno['ObsComplementarUser'] = filter_var ($_POST['ObsComplementarUser'], FILTER_SANITIZE_STRING);
        
        return $retorno;
        
    }
    
    
}

