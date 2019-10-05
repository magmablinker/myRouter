<?php

class Database {

    private static $instance;
    private $conn;
   
    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self();
        } else {
            return self::$instance;
        }
    }

    private function __construct() {
        $cred = Credentials::getCredentials();
        $this->conn = new mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD, Config::DB_DATABASE);

        if($this->conn->error) {
            trigger_error("Failed to connect to MySQL: " . $this->conn->error, E_USER_ERROR);
        }
    }

    public function getConn() {
        return $this->conn;
    }

}

?>