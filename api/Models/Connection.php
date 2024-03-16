<?php 
namespace Models;

use Exception;
use PDO;
use PDOException;

class Connection {
    private $pass;
    public $db;
    public $host;
    private $user;

    function __construct($pass, $db, $host, $user) {
        $this->pass = $pass;
        $this->db = $db;
        $this->host = $host;
        $this->user = $user;
    }

    public function init() {
        try {
            $dbInstance = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8mb4", $this->user, $this->pass);
            $dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbInstance;
        } catch (PDOException $ex) {
            echo "Erro ao conectar ao DB ". $ex->getMessage();
        }
    }

    public function executeQuery($sql) {
        $conn = $this->init();
        // foreach($this->dbInstance->query($sql) as $row) {
        //     print $row['id'] . "\t";
        //     print $row['email'] . "\t";
        // }
        $sth = $conn->query($sql);
        print_r($sth->fetchAll());
    }

    public function login($user, $pass) {
        $sql = "Select * from Administrador where ADM_NOME = :user and ADM_SENHA = :pass and ADM_ATIVO = 1";

        $conn = $this->init();
        $query = $conn->prepare($sql);
        $query->execute([':user'=> $user, ':pass' => $pass]);

        try{ 
            if($query->rowCount() > 0) {
                $row = $query->fetchAll(PDO::FETCH_ASSOC);
                return $row;
            }
            else return false;
        } catch(Exception $ex) {
            print_r($ex->getMessage());
            return false;
        }

        
    }
    
}
