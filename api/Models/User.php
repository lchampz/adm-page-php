<?php
namespace Models;

class User {
  public $id;
  public $name;
  public $password;
  public static function login($login, $pass){
    $user = new User();

    $login = addslashes(htmlspecialchars($login) ?? "");
    $pass = addslashes(htmlspecialchars($pass) ?? "");

    $user->name = $login;
    $user->password = $pass;

    $expire_in = strtotime("+7 days");
    //$token = JWT::encode(['name'=> $login,''=> $expire_in], $GLOBALS['secretJWT']);
    
    setcookie('token', "Teste", $expire_in);
    print_r("Check yours cookies");
  }
}