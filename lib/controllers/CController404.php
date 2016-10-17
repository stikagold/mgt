<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 10/16/16
 * Time: 10:19 PM
 */

class CController404 extends \std\CController{

    public function __construct(\std\CUrl $url)
    {
        echo "Try do anything as 404<br>";
//        parent::__construct($url);
    }
}