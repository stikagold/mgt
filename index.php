<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 9/23/16
 * Time: 6:12 PM
 */
//echo $_SERVER['DOCUMENT_ROOT'];
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once 'init.php';

try{
    echo "<pre><h3>Starting application...</h3>";
    $app = new \std\CApp();
    $app->Initial();
//    $home = new CControllerHome();
}
catch (SocketExceptions $e){
    echo $e->getMessage();
    echo "<hr>";
}
catch (SystemException $e){
    echo $e->getMessage();
}
