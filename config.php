<?php

/* ----------------------------------------------- */
/* Depurando erros  ------------------------------ */
/* ----------------------------------------------- */

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/* ----------------------------------------------- */
/* URLS DA APLICAÇÃO */
/* ----------------------------------------------- */

define ('URL', 'http://localhost/desenvolvimentos/php-crud-v1/'); 
/* define ('URL', 'http://localhost:81/php-crud-v1/'); */

/* ----------------------------------------------- */
/* Configuração de acesso ao Banco de Dados ------ */
/* ----------------------------------------------- */

define ('CHARSET', 'utf8');
define ("HOSTDB", 'localhost');
define ("DATABASE", 'phpcrudv1');
define ('USER', 'root');
define ('PASSWORD', '102030');

