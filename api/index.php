<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

date_default_timezone_set("America/Sao_Paulo");

$GLOBALS['secretJWT'] = '';

require_once __DIR__ . '/../vendor/autoload.php';

use Models as m;

$rotas = new m\Router();
$requestUri = $_SERVER['REQUEST_URI'];

$rotas->add('POST', '/login', "Models\User", ["name", "pass"], false);
$rotas->add('GET', '/user', 'Models\User', false, false);
$rotas->go($requestUri);