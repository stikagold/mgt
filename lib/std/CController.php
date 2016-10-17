<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 10/16/16
 * Time: 6:40 PM
 */

namespace std;

define("PUBLIC_ZONE", FULL_DIR.'public/');
define("LAYOUTS_ZONE", FULL_DIR.'public/layouts/');
define("ASSETS", FULL_DIR.'public/assets/');
define("VENDOR", FULL_DIR.'public/vendor/');
define("JS_DIRS", ASSETS.'js/');
define("CSS_DIRS", ASSETS.'css/');
define("RES_DIRS", ASSETS.'images/');
define("FONT_DIRS", ASSETS.'font/');
class CController{
    protected $__datas = [];
    protected $__url = null;
    protected $__internall_name = null;
    protected $__assetsJS = [];
    protected $__assetsCSS = [];

    public function __construct(CUrl $url){
        if(!$url)
            $this->url = new CUrl();
        else $this->url = $url;
    }

    public function renderPage($by_name=null){
        if($by_name)
            require_once PUBLIC_ZONE.$this->__internall_name.'/'.$by_name.'.php';
        else require_once PUBLIC_ZONE.$this->__internall_name.'/index.php';
    }

    public function getCSS(){
        return $this->__assetsCSS;
    }

    public function getJS(){
        return $this->__assetsJS;
    }
}