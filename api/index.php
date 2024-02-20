<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

date_default_timezone_set("America/Sao_Paulo");

//$GLOBALS['secretJWT'] = '';

require "vendor/autoload.php";
require "router.php";

use Models as m;

$rotas = new m\Router();
$requestUri = $_SERVER['REQUEST_URI'];

$rotas->add('POST', '/login', 'Usuarios::login', false);
$rotas->add('GET', '/product', 'Usuarios::login', false);
$rotas->go($requestUri);