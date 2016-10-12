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
        $tmp = explode('/',$_SERVER['REQUEST_URI']);
        foreach ($tmp as $url_part){
            if(empty($url_part))
                continue;
            $as_array = explode('&',$url_part);
            if(count($as_array)>1){
                foreach ($as_array as $arg_partition){
                    $arg_part = explode('=', $arg_partition);
                    $this->arguments[$arg_part[0]] = $arg_part[1];
                }
            }
            else $this->controllers[] = $url_part;
        }
        if(empty($this->controllers))
            $this->controllers[] = 'home';
    }

    public function __toString(){
        $url = $this->domain;
        foreach ($this->controllers as $controller)
            $url.='/'.$controller;
        $url.='/';
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

}