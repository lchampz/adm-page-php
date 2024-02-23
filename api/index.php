<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

date_default_timezone_set("America/Sao_Paulo");

require_once __DIR__ . '/../vendor/autoload.php';

use Models as m;

$routes = new m\Router();
$requestUri = $_SERVER['REQUEST_URI'];
$routes->add('POST', '/login', "Models\User", ["user", "pass"], false); //register api in index
$routes->go($requestUri);
