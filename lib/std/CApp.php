<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 10/9/16
 * Time: 8:15 PM
 */

namespace std;

class CApp{
    /**
     * @var CUrl $url_param
     */
    static protected $url_param;

    static public function Initial(){
        /**
         * @var CUrl static::$url_param;
         */

        static::$url_param = new CUrl();
        
        var_dump(static::$url_param->getContent());
    }
}