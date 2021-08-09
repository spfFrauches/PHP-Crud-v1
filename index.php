<?php

require './config.php';
require './app/controllers/CoreBasicRouterController.php';

$c = new CoreBasicRouterController();
$c->start($_REQUEST);




