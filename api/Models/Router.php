<?php

namespace Models;

use Models;

class Router
{
  private $routes = [];
  public $routes_count;
  public function add($method, $route, $callback, $params, $authorize)
  {
    $this->routes[] = [
      'method' => $method,
      'route' => $route,
      'controller' => $callback,
      'params' => $params,
      'authorize' => $authorize,
    ];
    $this->routes_count++;
    return $this;
  }

  public function go($route)
  {
    $cleanController = substr($route, 5, 99);
    $methodServer = $_SERVER['REQUEST_METHOD'];
    $methodServer = isset($_POST['_method']) ? $_POST['_method'] : $methodServer;
    $indexRoute = false;

    for ($i = 0; $i < $this->routes_count; $i++) {
      if ($this->routes[$i]['route'] == substr($route, 4, 99)) $indexRoute = $this->routes[$i];
    }

    if (!$indexRoute) {
      echo '[ERRO] Rota não encontrada';
      return;
    }

    $controller = new $indexRoute["controller"]();
    $body = json_decode(file_get_contents('php://input'), true);

    $controller->$cleanController($body);
  }
}
