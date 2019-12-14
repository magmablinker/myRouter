<?php

/*
 * Util class for functions that don't really
 * fit anywhere else
 */

class Util {

    /*
     * This function basically does what in_array() does
     *  
     * @param $search the string which we have to search 
     * for in the array
     * @param $array the array in which we will search $search
     */

    public static function inArray(string $search, array $array) : bool {
        $isInArray = false;
    
        foreach($array as $item) {
            if($search == $item) {
                $isInArray = true;
                break;
            }
        }
    
        return $isInArray;
    }

}

?>