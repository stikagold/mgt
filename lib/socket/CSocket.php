<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 10/9/16
 * Time: 7:29 PM
 */

namespace socket;

/**
 * Class CSocket - single class for creating socket as client||server
 *
 * @package megatrade
 * @subpackage socket
 */
class CSocket{
    const SOCKET_SERVER = 1;
    const SOCKET_CLIENT = 2;

    const SOCKET_TCP = 'tcp';
    const SOCKET_UDP = 'udp';
    protected $__type = CSocket::SOCKET_CLIENT;
    protected $__address = "localhost";
    protected $__port = 4444;
    protected $__protocol = CSocket::SOCKET_TCP;
    protected $__socket = null;

    protected $__erno = "";
    protected $__errors = "";
    /**
     * This array empty, if socket created as client, if it is a server, here will be client's channels
     * @var array
     */
    protected $__clients = [];
    protected $__maxClientCount = 100;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->__type;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->__address;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->__port;
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->__protocol;
    }

    /**
     * @return null
     */
    public function getSocket()
    {
        return $this->__socket;
    }

    /**
     * @return array
     */
    public function getClients()
    {
        return $this->__clients;
    }

    /**
     * @return int
     */
    public function getMaxClientCount()
    {
        return $this->__maxClientCount;
    }

    /**
     * @param string $_type
     */
    public function setType($_type)
    {
        $this->__type = $_type;
    }

    /**
     * @param string $_address
     */
    public function setAddress($_address)
    {
        $this->__address = $_address;
    }

    /**
     * @param int $_port
     */
    public function setPort($_port)
    {
        $this->__port = $_port;
    }

    /**
     * @param string $_protocol
     */
    public function setProtocol($_protocol)
    {
        $this->__protocol = $_protocol;
    }

    /**
     * @param null $_socket
     */
    public function setSocket($_socket)
    {
        $this->__socket = $_socket;
    }

    /**
     * @param array $_clients
     */
    public function setClients($_clients)
    {
        $this->__clients = $_clients;
    }

    /**
     * @param int $_maxClientCount
     */
    public function setMaxClientCount($_maxClientCount)
    {
        $this->__maxClientCount = $_maxClientCount;
    }

    /**
     * CSocket constructor.
     * @param array $args
     */
    public function __construct(array $args)
    {
        if(isset($args['type']) && ($args['type']===CSocket::SOCKET_SERVER || $args['type']===CSocket::SOCKET_CLIENT))$this->setType($args['type']);
        else $this->setType(CSocket::SOCKET_CLIENT);
        if(isset($args['address']))$this->setAddress($args['address']);
        if(isset($args['port']))$this->setPort($args['port']);
        if(isset($args['protocol']) && ($args['protocol']===CSocket::SOCKET_TCP || $args['protocol']===CSocket::SOCKET_UDP))
            $this->setProtocol($args['protocol']);
        else $this->setProtocol(CSocket::SOCKET_TCP);
        if(isset($args['maxClientCount']))$this->setMaxClientCount($args['maxClientCount']);
    }

    public function initialSocket(){
        if(!is_null($this->getSocket()))
            throw new \SocketExceptions("Socket initialised, can/'t overwrite existing socket", \SocketExceptions::INITIALISED_SOCKET_OVERWRITE);
//        echo $this->getType();die;
        switch ($this->getType()){
            case CSocket::SOCKET_SERVER:{
                echo "Try to initialise server: ", $this->getSocketURL(), "<br>";
                if($this->createServer()===false)
                    throw new \SocketExceptions("Failed create server", \SocketExceptions::SERVER_CREATE_ERROR);
                break;
            }
            case CSocket::SOCKET_CLIENT:{

                break;
            }
            default:{
                echo "Before throw exception<br>";
                throw new \SocketExceptions("Invalid Socket type", \SocketExceptions::UNKNOWN_SOCKET_TYPE);
            }
        }
        return true;
    }

    protected function createServer(){
        switch ($this->__protocol){
            case CSocket::SOCKET_TCP:{
                $this->__socket = stream_socket_server($this->getSocketURL(), $this->__erno, $this->__errors);
                break;
            }
            case CSocket::SOCKET_UDP:{
                $this->__socket = stream_socket_server($this->getSocketURL(), $this->__erno, $this->__errors, STREAM_SERVER_BIND);
                break;
            }
            default:{
                throw new \SocketExceptions("Unknown protocol for socket", \SocketExceptions::UNKNOWN_SOCKET_PROTOCOL);
            }
        }
        return $this->__socket;
    }

    public function getSocketURL(){
        return $this->getProtocol().'://'.$this->getAddress().':'.$this->getPort();
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        $ret = "";
        $ret.="Server set on address: ".$this->getAddress()."\n";
        $ret.="Listen port: ".$this->getPort()."\n";
        $ret.="Type of socket: ".$this->getType()."\n";
        $ret.="Max client count: ".$this->getMaxClientCount()."\n";
        return $ret;
    }

}