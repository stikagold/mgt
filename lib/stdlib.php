<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 10/9/16
 * Time: 7:22 PM
 */
define("FULL_DIR", $_SERVER['DOCUMENT_ROOT'].'/');
define("LIB_DIR", __DIR__.'/');
define("ROOT_DIR", __DIR__.'/../');
define("EXCEPTIONS", ROOT_DIR.'exceptions/');
define("CONFIG_DIR", ROOT_DIR.'config/');
define("CONTROLLERS_DIR", LIB_DIR."../controllers/");
require_once(EXCEPTIONS.'index.php');

function megatrade_autoload($class_name){
    $valid_url = str_replace('\\', '/', $class_name).'.php';
//    echo "- Firstly try to connect this: ", __DIR__.'/'.$valid_url, "<br>";
    $available_directories = [
        'lib',
        'controllers',
    ];
    if(file_exists(__DIR__.'/'.$valid_url)){
//        echo "-- Fount, now go to connect<br>";
        require_once(__DIR__.'/'.$valid_url);
    }
    else{

        $is_linked = false;
        foreach ($available_directories as $directory){
//            echo "Try to connect: ", __DIR__.'/'.$directory.'/'.$valid_url, "<br>";
            if(file_exists(__DIR__.'/'.$directory.'/'.$valid_url)){
                require_once(__DIR__.'/'.$directory.'/'.$valid_url);
                $is_linked = true;
            }
        }
//        if(!$is_linked)throw new ClassNotFound("The class ".$class_name." is missing in system");
    }
}


spl_autoload_register("megatrade_autoload", false, true);

