<?php

/**
 *
 * @author pmma_
 * @since 1.12.2019
 * 
 * This is the class
 * which will enable you
 * easier login implementation
 * 
 */

class Login {

    /**
     * @var Session
     */
    
    private $session;

    /**
     * @var mysqli
     */

    private $conn;
    
    /**
     * @var string
     */

    private $username;
    
    /**
     * @var string
     */

    private $password;

    /**
     * @var string
     */

    private $hash;

    /**
     * The constructor
     * 
     * @param string $username the username
     * @param string $password the password
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

    /**
     * This function will check if a user with the
     * supplied username exists and verify that the 
     * supplied password matches the hash in the database
     * 
     * @return bool is the login valid?
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

    /**
     * This function checks if the user supplied a valid
     * username and saves the hash into the hash class variable
     * 
     * @return bool does the username $username exist in the database?      
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