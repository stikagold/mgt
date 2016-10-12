<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 10/9/16
 * Time: 7:36 PM
 */
class SocketExceptions extends Exception{
    const UNKNOWN_SOCKET_TYPE = 1000;
    const INITIALISED_SOCKET_OVERWRITE = 1001;
    const UNKNOWN_SOCKET_PROTOCOL = 1002;
    const SERVER_CREATE_ERROR = 1003;
}