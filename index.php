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
use \socket\CSocket;
$socket = "";
try{
    $args = [
        'address'=>"mt.local",
        'protocol'=>CSocket::SOCKET_TCP,
        'type'=>CSocket::SOCKET_SERVER
    ];

    $socket = new CSocket($args);
    if($socket->initialSocket())
        echo "Socket server was create<br>";
    echo $socket;
}
catch (SocketExceptions $e){
    echo $e->getMessage();
    echo "<hr>";
    echo $socket;
}
