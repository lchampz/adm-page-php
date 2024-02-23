<?php
declare(strict_types=1);
namespace Models;

use Firebase\JWT\JWT;
use DateTime;

class User
{
  public $id;
  public $name;
  public $password;

  public static function login(?array $data)
  {

    if(empty($data)) {
      print_r(json_encode(array("error" => "[ERRO] Valores vazios!")));
      return;
    }

    $user = new User();
    $response = new ResponseLogin($data);

    $login = addslashes(htmlspecialchars($response->getUser()) ?? "");
    $pass = addslashes(htmlspecialchars($response->getPass()) ?? "");

    $user->name = $login;
    $user->password = $pass;

    $secretKey  = "bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew="; //pls NEVER put ur secret here, im just putting cuz its a college project
    $issuedAt   = new DateTime(date_default_timezone_get());
    $expire     = $issuedAt->modify('+60 seconds');                                                

    $data = [
        'iat'  => $issuedAt,                          
        'nbf'  => $issuedAt,         
        'exp'  => $expire,                          
        'userName' => $user->name,                     
    ];

    $token = JWT::encode($data, $secretKey, 'HS512');

    if ($login == "victor" && $pass == "teste") {
      print_r(json_encode(array("msg" => "Usuário logado!", "type" => "s", "token" => $token)));
    } else {
      print_r(json_encode(array("msg" => "Falha ao logar", "type" => "e")));
    }
  }
}


class ResponseLogin
{
  public $user = "";
  public $pass = "";

  function __construct(array $data)
  {
    $this->parseToLogin($data);
  }
  function parseToLogin(array $data)
  {
    $this->user = $data["user"];
    $this->pass = $data["pass"];
  }

  public function getUser()
  {
    return $this->user;
  }

  public function getPass()
  {
    return $this->pass;
  }
}