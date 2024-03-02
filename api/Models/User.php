<?php

declare(strict_types=1);

namespace Models;
use Models\Encrypt;

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

    $login = addslashes(htmlspecialchars($response->getUser()) ?? "");
    $pass = addslashes(htmlspecialchars($response->getPass()) ?? "");

    $user->name = $crypto->decrypt($login);
    $user->password = $crypto->decrypt($pass);

    if ($crypto->decrypt($login) == "victor" && $crypto->decrypt($pass) == "teste") {
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

class Hash //pls NEVER put ur secret here, im just putting cuz its a college project
{
  public $map = array(
    'a' => 'x',
    'b' => 'V',
    'c' => 'd',
    'd' => 'O',
    'e' => 'g',
    'f' => 'I',
    'g' => 'i',
    'h' => 'A',
    'i' => 'M',
    'j' => 'D',
    'k' => 'n',
    'l' => 'c',
    'm' => 'W',
    'n' => 'P',
    'o' => 'Y',
    'p' => 'G',
    'q' => 'Z',
    'r' => 's',
    's' => 'b',
    't' => 'C',
    'u' => 'S',
    'v' => 'h',
    'w' => '#',
    'x' => 'q',
    'y' => 'J',
    'z' => 'F',
    'A' => 't',
    'B' => '!',
    'C' => 'p',
    'D' => 'l',
    'E' => 'e',
    'F' => 'R',
    'G' => 'j',
    'H' => 'm',
    'I' => '&',
    'J' => 'u',
    'K' => 'w',
    'L' => 'H',
    'M' => 'a',
    'N' => 'o',
    'O' => '!',
    'P' => 'T',
    'Q' => '@',
    'R' => 'Q',
    'S' => 'r',
    'T' => 'y',
    'U' => 'f',
    'V' => 'k',
    'W' => 'N',
    'X' => 'E',
    'Y' => 'X',
    'Z' => 'B',
    ' ' => '%'
  );

  public function getMap()
  {
    return $this->map;
  }
}
