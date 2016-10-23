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
        $this->__internall_name = 404;
        parent::__construct($url);
        $this->childs_css = [
            '<script src="'.ASSETS_WEB.'assets/js/main.js"></script>',
        ];
//        echo "Try do anything as 404<br>";
//        parent::__construct($url);
    }


}