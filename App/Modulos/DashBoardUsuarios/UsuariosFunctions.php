<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

use App\Models\UsuarioModels;


if (isset($_REQUEST['funcao'])):
    $request = (object) $_REQUEST;
endif;


if (!empty ($funcao = $request->funcao) ) :    
    $funcao();
else:
    exit();
endif;

function carregarDadosUsuarioPorCodigo()
{
    require '../../../config.php';
    require '../../Models/ConexaoBancoDados.php';
    require '../../Models/UsuarioModels.php';
    $dadosUsuario = UsuarioModels::listarPorCod($_POST['cduser']);    
    require_once '../../Modulos/DashBoardUsuarios/UsuariosViewModalDelete.php';
          
}

function carregarDadosUsuarioEditarPorCodigo()
{
    require '../../../config.php';
    require '../../Models/ConexaoBancoDados.php';
    require '../../Models/UsuarioModels.php';
    $dadosUsuario = UsuarioModels::listarPorCod($_POST['cduser']);    
    require_once '../../Modulos/DashBoardUsuarios/UsuariosViewModalEdit.php';
          
}


