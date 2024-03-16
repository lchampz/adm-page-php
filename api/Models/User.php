<?php

declare(strict_types=1);

namespace Models;
use Models\Encrypt;
use Models\Connection;

class User
{
  public $id;
  public $name;
  public $password;

  public static function login(?array $data)
  {

    if (empty($data)) {
      print_r(json_encode(array("error" => "[ERRO] Valores vazios!")));
      return;
    }

    $user = new User();
    $response = new ResponseLogin($data);

    $crypto = new Encrypt();
    $db = new Connection("", "alpha", "localhost", "root");  
    

    $login = addslashes(htmlspecialchars($response->getUser()) ?? "");
    $pass = addslashes(htmlspecialchars($response->getPass()) ?? "");

    $user->name = $crypto->decrypt($login);
    $user->password = $crypto->decrypt($pass);

    $response = $db->login($user->name, $user->password);

    if($response) {
      print_r(json_encode(array("msg" => "Usuário logado!", "type" => "s", "token" => $crypto->encrypt($user->name))));
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