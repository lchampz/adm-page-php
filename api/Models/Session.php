<?php
namespace Models;

class Session {
  public static function set(string $key, mixed $value) {
    $_SESSION[$key] = $value;
  }
}