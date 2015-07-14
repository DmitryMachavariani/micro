<?php

class Router {
    public function createUrl($to, $param = []) {
        $tmp_data = explode('/', $to);
        $url = NULL;

        if(count($param) == 0){
            $url = url."index.php?d=".$tmp_data[0]."/".$tmp_data[1];
        }else {
            $to_query = array("d" => $tmp_data);
//            $url = http_build_query($to_query);

//            echo $url;
        }

        return $url;
    }

    public function redirect($url = [], $param = []){
        header("Location: ".$url);
    }
}