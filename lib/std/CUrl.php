<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 10/9/16
 * Time: 8:06 PM
 */

namespace std;


class CUrl
{
    protected $url_unparsed = null;
    protected $domain = null;
    protected $controllers = [];
    protected $arguments = [];

    /**
     * CURLContainer constructor.
     */
    public function __construct(){
        $this->domain = $_SERVER['SERVER_NAME'];
        $this->url_unparsed = $_SERVER['REQUEST_URI'];
        $full_array = explode('/',$_SERVER['REQUEST_URI']);
        foreach ($full_array as $item) {
            if(stripos($item, '=')){
                $arg_list = explode('&', $item);
                foreach ($arg_list as $arg) {
                    $one_arg = explode('=', $arg);
                    $this->arguments[$one_arg[0]] = $one_arg[1];
                }
            }
            else{
                if($item)
                    $this->controllers[] = $item;
            }
        }

        if(empty($this->controllers))
            $this->controllers[] = 'home';
    }

    public function __toString(){
        $url = $this->domain;
        foreach ($this->controllers as $controller)
            $url.=$controller.'/';
        foreach ($this->arguments as $arg_key=>$arg_value){
            $url.=$arg_key.'='.$arg_value.'&';
        }
        $url = substr($url, 0, -1);
        return $url;
    }

    /**
     * @return mixed
     */
    public function getContent(){
        $ret['domain'] = $this->domain;
        $ret['controllers']= $this->controllers;
        $ret['arguments']=$this->arguments;
        return $ret;
    }

    public function getDomain(){
        return $this->domain;
    }

    public function getFirstController(){
        if(empty($this->controllers))
            return $this->controllers[0];
        return "home";
    }

}