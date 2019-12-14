<?php

/*
 *
 * @author pmma_
 * @date 13.12.2019
 * 
 * This is the main class
 * which can handle sessions
 * within your application
 * 
 */

class Session {

    /*
     * @var $instance the Session object
     */

    private static $instance = null;

    /*
     * Function that returns the instance of the object
     * here to prevent multiple instances (singleton)
     * 
     * returns Session instance
     */

    public static function getInstance() : Session {
        if(!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        session_start();

        if(isset($_SESSION["EXPIRES"])) {
            if(!$this->isRateLimit()) {
                if($this->validateSession()) {
                    if($this->isExpired()) {
                        $this->regenerateSession();
                    }
                } else {
                    View::json(DefaultHandler::unauthorizedAccess());
                }
            } else {
                View::json(DefaultHandler::rateLimit());
            }
        } else {
            $this->regenerateSession();
        }
        
    }

    /*
     * Function to destroy the session
     */

    public function destroy() : void {
        $_SESSION = [];
        session_unset();
        session_destroy();
    }

    /*
     * Function that returns the value of a session variable
     * if the session variable is set
     * 
     * @param string name the name of the variable
     */

    public function getSessionVar(string $name) {
        return (isset($_SESSION[$name])) ? $_SESSION[$name] : false;
    }

    /*
     * Function to add a variable to the session
     * 
     * @param string $name the name (key) of the variable
     * @param mixed $var the value of the variable
     */

    public function setSessionVar(string $name, $var) : void {
         $_SESSION[$name] = $var;
    }

    /*
     * Function that checks if the session is valid
     * by matching the server remote addr and user agent
     * with the ones that are saved in the session
     */

    private function validateSession() : bool {
        $isValid = true;

        if($_SESSION['IP_ADDR'] != $_SERVER['REMOTE_ADDR']) {
            $isValid = false;
        } elseif($_SESSION['USER_AGENT'] != $_SERVER['HTTP_USER_AGENT']) {
            $isValid = false;
        } else {
            if($this->isExpired()) {
                $this->regenerateSession();
            }
        }

        return $isValid;
    }

    /*
     * Function to check if the rate limit has been exceeded
     */

    private function isRateLimit() : bool {
        $isRateLimit = false;

        $rateLimit = $this->getSessionVar("RATE_LIMIT");

        # Check if variable is set
        if($rateLimit) {
            if(abs($rateLimit - time()) < Config::MAX_REQUESTS_SECOND) {
                $isRateLimit = true;
            } else {
                $this->setSessionVar("RATE_LIMIT", time());
            }
        } else {
            $this->setSessionVar("RATE_LIMIT", time());
        }

        return $isRateLimit;
    }

    /*
     * Function that checks if the session has expired
     */

    private function isExpired() : bool {
        return $this->getSessionVar("EXPIRES") < time();
    }

    /*
     * Function to regenerate the session
     */

    private function regenerateSession() : void {
        session_regenerate_id();
        $this->setSessionVar("EXPIRES", time() + (60 * Config::SESSION_EXPIRES));
        $this->setSessionVar("IP_ADDR", $_SERVER['REMOTE_ADDR']);
        $this->setSessionVar("USER_AGENT", $_SERVER['HTTP_USER_AGENT']);
    }

}

?>