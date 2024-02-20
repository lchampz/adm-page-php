<?php 
namespace Models;

class Router {
  private $routes = [];
  public $routes_count;
  public function add($method, $route, $callback, $authorize) {
    $this->routes[] = [
      
        'path' => strtoupper($method) . ':' . $route,
        'method' => $method,
        'route' => $route,
        'callback' => $callback,
        'authorize' => $authorize,
      
    ];
    $this->routes_count ++;
    return $this;
  }

  public function go($route) {
    
    $methodServer = $_SERVER['REQUEST_METHOD'];
    $methodServer = isset($_POST['_method']) ? $_POST['_method'] : $methodServer;
    $fullpath = $methodServer.':/'.$route;
    $indexRoute = false;
  
    for($i = 0; $i < $this->routes_count; $i++) {
      // if($this->routes[$i]['route'] == $route) {
      //   $indexRoute = $i;
      //   break;
      // }
      
      if($this->routes[$i]['route'] == $route) $indexRoute = $i + 1;
    }

    $indexRoute = $indexRoute ? $indexRoute : '[ERRO] Rota não encontrada!';

    print_r($indexRoute);
  }
}