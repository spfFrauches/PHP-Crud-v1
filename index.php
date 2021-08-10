<?php

require './config.php';

session_start();

/* Autoload */
spl_autoload_register(function ($classes) {
    require str_replace("\\", "/",$classes) .'.php';
});

use App\Controller\Http\HomeDashBoardController;
use App\Controller\Http\NotFoundController;
use App\Controller\Http\CadastroUsuarioDashBoardController;
use App\Controller\Http\ConfiguracaoSistemaController;
use App\Controller\CoreBasicRouterController;

$toskRouter = new CoreBasicRouterController();
$toskRouter->start($_REQUEST);
