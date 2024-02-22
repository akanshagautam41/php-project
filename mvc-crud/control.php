<?php


class Control{

    function __construct(){
        $url = $_SERVER['PATH_INFO'];
        switch($url){
            case "/index";
            include 'index.php';
            break;
        }
    }
}

$obj = new Control();


?>