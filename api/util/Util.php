<?php

class Util {

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