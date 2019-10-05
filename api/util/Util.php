<?php

/*
 * Util class for functions that don't really
 * fit anywhere else
 */

class Util {

    /*
     * This function basically does what in_array() does
     *  
     * @param $string the string which we have to search 
     * for in the array
     * @param $array the array in which we will search $string
     */

    public static function inArray($string, $array) {
        $isInArray = false;
    
        foreach($array as $item) {
            if($string == $item) {
                $isInArray = true;
                break;
            }
        }
    
        return $isInArray;
    }

}

?>