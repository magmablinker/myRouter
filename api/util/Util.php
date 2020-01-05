<?php

/*
 * Util class for functions that don't really
 * fit anywhere else
 */

class Util {

    /**
     * This function basically does what in_array() does
     *  
     * @param string $search the string which we have to search 
     * for in the array
     * @param array $array the array in which we will search $search
     */

    public static function inArray(string $search, array $array) : bool {
        $isInArray = false;
    
        foreach($array as $item) {
            if($search === $item) {
                $isInArray = true;
                break;
            }
        }
    
        return $isInArray;
    }

    /**
     * This function sanitizes a string if a mysqli object gets passed in
     * the string will also be database safe
     * 
     * @param string $var the variable
     * @param mysqli $conn the database connection (optional)
     */

    public static function sanitizeString(string $var, mysqli $conn = null) : string {
        if($conn)
            return htmlspecialchars($conn->real_escape_string($var));
        else
            return htmlspecialchars($var);
    }

}

?>