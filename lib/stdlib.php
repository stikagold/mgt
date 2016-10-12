<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 10/9/16
 * Time: 7:22 PM
 */
echo "In stdlib.php \n";
define("FULL_DIR", $_SERVER['DOCUMENT_ROOT'].'/');
define("LIB_DIR", __DIR__.'/');
define("ROOT_DIR", __DIR__.'/../');
define("EXCEPTIONS", ROOT_DIR.'exceptions/');
define("CONFIG_DIR", ROOT_DIR.'config/');
require_once(EXCEPTIONS.'index.php');

function megatrade_autoload($class_name){
    $valid_url = str_replace('\\', '/', $class_name).'.php';
    if(file_exists(__DIR__.'/'.$valid_url)){
        require_once($valid_url);
    }
    else{
        $available_directories = [
            'lib',
        ];
        $is_linked = false;
        $i = 1;
        foreach ($available_directories as $directory){
            if(file_exists(__DIR__.'/'.$directory.'/'.$valid_url)){
                require_once($directory.'/'.$valid_url);
                $is_linked = true;
            }
            $i++;
        }
//        if(!$is_linked)throw new ClassNotFound("The class ".$class_name." is missing in system");
    }
}


spl_autoload_register("megatrade_autoload", false, true);

