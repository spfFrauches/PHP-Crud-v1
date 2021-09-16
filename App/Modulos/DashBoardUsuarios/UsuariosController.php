<?php

namespace App\Modulos\DashBoardUsuarios;

use App\Classes\LoadViews;
use App\Models\UsuarioModels;

class UsuariosController
{
    
    public static function start($param)
    {
        $_SESSION['url'] = "caduser";
        
        if ($param == 'formulario'):
            self::formularioCadastro();
            exit();
        endif; 
        if ($param == 'store'):
            self::store();
            exit();
        endif;   
        if ($param == 'listar'):
            self::listar();
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
        $postsForm = self::validarDadosFormulario();    
        echo UsuarioModels::insert($postsForm);                         
    }
    
    private static function validarDadosFormulario()
    {             
        $_POST = array_map('trim', $_POST);     
     
        if (empty($_POST['NomeUser'])):
            exit("Nome de usuário não informado");
        endif;
        
        if (empty($_POST['EmailUser'])):
            exit("Email de usuário não informado");
        endif;
        
        if ( $_POST['NivelPermUser'] == ''):
            exit("Nível de permissão de usuário não informado");
        endif;
      
        if ( $_POST['StatusUser'] == '' ):
            exit("Status de permissão de usuário não informado");
        endif;
        
        if (empty($_POST['PasswordUser'])):
            exit("Password/Senha de usuário não informado");
        endif;
        
        if (empty($_POST['PasswordUserConfirm'])):
            exit("Confirmação Password/Senha de usuário não informado");
        endif;
        
        if (empty($_POST['ObsComplementarUser'])):
            exit("Testando validações backEnd - ObsComplementar, se essa funciona as outras também");
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

