<?php

/*
 *
 * @author pmma_
 * @date 04.10.2019
 * @version 0.0.1
 * 
 */

class URIDecoder {

    private $route = null;

    public function __construct($uri) {
        $slices = $this->decodeURI($uri);

        $length = sizeof($slices);

        if($length > 0) {
            $this->route = "";
            for($i = 0; $i < $length; $i++) {
                $this->route .= "/" . $slices[$i];
            }
        } else {
            $this->route = "/";
        }

    }

    /*
     * Function that splits the uri into slices
     * @param $uri the uri that will be sliced
     */

    private function decodeURI($uri) {
        $slices = preg_split("~(/)~", str_replace("api", "", $uri), -1, PREG_SPLIT_NO_EMPTY);
        return $slices;
    }

    public function getRoute() {
        return $this->route;
    }

    public function getQuery() {
        return $this->query;
    }

}

?>