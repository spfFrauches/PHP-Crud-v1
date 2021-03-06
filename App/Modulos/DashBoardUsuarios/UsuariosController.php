<?php

namespace App\Modulos\DashBoardUsuarios;

use App\Classes\LoadViews;
use App\Models\UsuarioModels;

class UsuariosController
{
    
    public static function start($param)
    {
           
        array_shift($param);  
       
        if (empty($param[0]) ):
            $_SESSION['url'] = "caduser";
            self::formularioCadastro();
            exit();
        endif; 
        
        if ($param[0] == 'formulario'):
            $_SESSION['url'] = "caduser";
            self::formularioCadastro();
            exit();
        endif; 
        
        if ($param[0] == 'formulario'):
            self::formularioCadastro();
            exit();
        endif; 
        if ($param[0] == 'store'):
            self::store();
            exit();
        endif;   
        if ($param[0] == 'listar'):
            $_SESSION['url'] = "listaruser" ;
            self::listar();
            exit();
        endif; 
        if ($param[0] == 'delete'):
            array_shift($param);   
            self::delete($param);
            exit();
        endif; 
    }
    
    private static function formularioCadastro()
    {
        (new LoadViews)->header();
        require __DIR__.'/UsuariosViewFormularioCadastro.php';
        (new LoadViews)->footer();  
    }
    
    private static function listar()
    {     
        $usuarios = UsuarioModels::listar();
        
        (new LoadViews)->header();
        require __DIR__.'/UsuariosViewListar.php';
        (new LoadViews)->footer();         
    }
    
          
    private static function store()
    {     
        $postsForm = self::helperValidarDadosFormulario();    
        echo UsuarioModels::insert($postsForm);                         
    }
    
    private static function update()
    {     
        $postsForm = self::helperValidarDadosFormulario();    
        //echo UsuarioModels::insert($postsForm);                         
    }
    
    private static function delete($param)
    {
        
        UsuarioModels::deleteUsuarioPorCod($param);
        $usuarios = UsuarioModels::listar();
             
        (new LoadViews)->header();
        require __DIR__.'/UsuariosViewListar.php';
        (new LoadViews)->footer();   
    }
    
    
    private static function helperValidarDadosFormulario () {
               
        $_POST = array_map('trim', $_POST);     

        if (empty($_POST['NomeUser'])):
            exit("Nome de usu??rio n??o informado");
        endif;

        if (empty($_POST['EmailUser'])):
            exit("Email de usu??rio n??o informado");
        endif;

        if ( $_POST['NivelPermUser'] == ''):
            exit("N??vel de permiss??o de usu??rio n??o informado");
        endif;

        if ( $_POST['StatusUser'] == '' ):
            exit("Status de permiss??o de usu??rio n??o informado");
        endif;

        if (empty($_POST['PasswordUser'])):
            exit("Password/Senha de usu??rio n??o informado");
        endif;

        if (empty($_POST['PasswordUserConfirm'])):
            exit("Confirma????o Password/Senha de usu??rio n??o informado");
        endif;

        if (empty($_POST['ObsComplementarUser'])):
            exit("Testando valida????es backEnd - ObsComplementar, se essa funciona as outras tamb??m");
        endif;

        $retorno = [];

        $retorno['NomeUser']  = filter_var ($_POST['NomeUser'], FILTER_SANITIZE_STRING);
        $retorno['EmailUser'] = filter_var ($_POST['EmailUser'], FILTER_SANITIZE_EMAIL);
        $retorno['NivelPermUser'] = filter_var ($_POST['NivelPermUser'], FILTER_SANITIZE_NUMBER_INT);
        $retorno['StatusUser'] = filter_var ($_POST['StatusUser'], FILTER_SANITIZE_NUMBER_INT);
        $retorno['PasswordUser'] = $_POST['PasswordUser'];
        $retorno['PasswordUserConfirm'] = $_POST['PasswordUserConfirm'];
        $retorno['ObsComplementarUser'] = filter_var ($_POST['ObsComplementarUser'], FILTER_SANITIZE_STRING);

        return $retorno;

    }
    
    
    
    
    
}

