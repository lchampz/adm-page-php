<?php 

function load(string $controller, string $action) {
  $controllerNamespace = __DIR__ . 'Controller\\'. $controller;
  var_dump($controller);
  
  if(!class_exists($controllerNamespace)) throw new Exception("O controller {$controller} não existe");
  
  $controllerInstance = new $controllerNamespace();

  if(!method_exists($controllerInstance, $action)) throw new Exception("O método {$action} não existe no controller {$controller}");

  $controllerInstance->$action();
}

$routes = [
  'GET' => [
    '/adm' => fn() => load('AdmController', 'index'),
  ],
  'POST'=> [
    '/login' => fn() => load('LoginController', 'store'),
  ],
];