<?php

namespace Models;

class User
{
  public $id;
  public $name;
  public $password;

  public static function login(array $data)
  {
    $user = new User();
    $response = new ResponseLogin($data);

    $login = addslashes(htmlspecialchars($response->getUser()) ?? "");
    $pass = addslashes(htmlspecialchars($response->getPass()) ?? "");

    $user->name = $login;
    $user->password = $pass;

    $token = "teste";
    //$token = JWT::encode(['name'=> $login,''=> $expire_in], $GLOBALS['secretJWT']);

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
