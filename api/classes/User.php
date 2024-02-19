<?php

include("Access.php");

class User {
  public $id;
  public $name;
  public $email;
  public $password;


  public function displayName() {
    return $this->name;
  }

  public function changeName($newName) {
    $this->name = $newName;
  }

  public function displayEmail() {
    return $this->email;
  }

  public function deleteUser( $id ) {
    $db = new Db();
  }
}