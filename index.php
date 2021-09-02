<?php

require './config.php';

session_start();

/* Autoload */
spl_autoload_register(function ($classes) {
    require str_replace("\\", "/",$classes) .'.php';
});

use App\Controller\CoreBasicRouterController;
use App\Controller\Http\AdminDashBoardController;
use App\Controller\Http\NotFoundController;

$toskRouter = new CoreBasicRouterController();
$toskRouter->start($_REQUEST);
