<?php

/*
 *
 * @author pmma_
 * @date 1.12.2019
 * 
 * This is the class
 * which will enable you
 * easier login implementation
 * 
 */

class Login {

    /*
     * @var $session Session
     */
    
    private $session;

    /*
     * @var $conn mysqli
     */

    private $conn;
    
    /*
     * @var $username string
     */

    private $username;
    
    /*
     * @var $password string
     */

    private $password;

    /*
     * @var $hash string
     */

    private $hash;

    /*
     * The constructor
     * 
     * @param $username string the username
     * @param $password string the password
     */

    public function __construct(string $username, string $password) {

        if(Config::DB_HOST != null && Config::DB_DATABASE != null 
            && Config::DB_USER != null && Config::DB_PASSWORD != null) {
            if(Config::DB_USER_TABLE != null && Config::DB_USERNAME_ROW != null 
                && Config::DB_PASSWORD_ROW != null) {
                $this->conn = Database::getInstance()->getConn();
                $this->session = Session::getInstance();
                $this->username = Util::sanitizeString($username, $this->conn);
                $this->password = $password;
            } else {
                View::json(DefaultHandler::loginMissingConfiguration());
            }
        } else {
            View::json(DefaultHandler::databaseMissingCredentials());
        }

    }

    /*
     * This function will check if a user with the
     * supplied username exists and verify that the 
     * supplied password matches the hash in the database
     */

    public function isLoginValid() : bool {
        $isValid = false;

        if($this->userExists()) {
            if(password_verify($this->password, $this->hash)) {
                $this->session->setSessionVar("isLogged", true);
                $isValid = true;
            } 
        }

        return $isValid;
    }

    /*
     * This function checks if the user supplied a valid
     * username and saves the hash into the hash class variable
     */

    private function userExists() : bool {
        $exists = false;
        
        $query = sprintf("SELECT * FROM %s WHERE %s = '%s'", Config::DB_USER_TABLE, Config::DB_USERNAME_ROW, $this->username);
        $result = $this->conn->query($query);

        if($result->num_rows == 1) {
            $result = $result->fetch_array(MYSQLI_ASSOC);
            $this->hash = $result[Config::DB_PASSWORD_ROW];
            $exists = true;
        }

        return $exists;
    }

}

?>