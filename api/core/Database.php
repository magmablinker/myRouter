<?php

/*
 *
 * @author pmma_
 * @date 04.10.2019
 * 
 */

class Database {
    
    private static $instance;
    private $conn;
   
    public static function getInstance() : Database {
        if(!self::$instance) {
            self::$instance = new self();
        } 
        return self::$instance;
    }

    private function __construct() {
        $this->conn = new mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD, Config::DB_DATABASE);

        if($this->conn->error) {
            View::json(DefaultHandler::databaseMissingCredentials());
        }
    }

    public function getConn() : mysqli {
        return $this->conn;
    }

}

?>