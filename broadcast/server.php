<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 10/10/16
 * Time: 11:10 PM
 */

//echo $_SERVER['DOCUMENT_ROOT'], " - ";
require_once __DIR__.'/../init.php';
//print_r(file_get_contents(__DIR__.'/../init.php'));
set_time_limit(0);

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$socket = "";
try{
    $args = [
        'address'=>"mt.local",
        'protocol'=>\socket\CSocket::SOCKET_TCP,
        'type'=>\socket\CSocket::SOCKET_SERVER,
        'maxClientCount'=>150,
        'port'=>10000

    ];

    $socket = new \socket\CSocket($args);
    if($socket->initialSocket())
        echo "Socket server was create\n";
    echo $socket;
}
catch (SocketExceptions $e){
    echo $e->getMessage();
    echo "\n";
    echo $socket;
}
