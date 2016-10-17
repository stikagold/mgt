<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 10/16/16
 * Time: 6:52 PM
 */

use \std\CUrl;
class CControllerHome extends \std\CController
{
    public function __construct(CUrl $url)
    {
        parent::__construct($url);
    }

}