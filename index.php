<?php

require './config.php';
require './app/controllers/http/HomeDashBoardController.php';
require './app/controllers/http/NotFoundController.php';
require './app/controllers/CoreBasicRouterController.php';

use App\Controller\Http\HomeDashBoardController;
use App\Controller\Http\NotFoundController;
use App\Controller\CoreBasicRouterController;

$toskRouter = new CoreBasicRouterController();
$toskRouter->start($_REQUEST);
