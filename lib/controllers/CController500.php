<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 10/22/16
 * Time: 8:50 PM
 */

class CController500 extends \std\CController{


    public function __construct(CUrl $url)
    {
        $this->__internall_name = 500;
        parent::__construct($url);
        $this->childs_css = [
            '<script src="'.ASSETS_WEB.'assets/js/main.js"></script>',
        ];
    }
}