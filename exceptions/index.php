<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 10/9/16
 * Time: 7:34 PM
 */

function exception_autoload($class_name){
    $valid_url = str_replace('\\', '/', $class_name).'.php';
    if(file_exists(__DIR__.'/'.$valid_url)){
        require_once(__DIR__.'/'.$valid_url);
    }
}

spl_autoload_register("exception_autoload");