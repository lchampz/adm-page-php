<?php 

Class Db {
  public $db;

  public function __construct() {
    //$this->db = Db::getInstance();
  }

  private function connect() {
    $this->db->connect();
  }

  private function close() {
    $this->db->close();
  }

  public function query( $sql, $params = array() ) {
    $this->connect();
    $this->db->query( $sql, $params );	
    $this->close();
    return $this->db->last_query();
  }

}