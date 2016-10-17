<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 10/9/16
 * Time: 8:15 PM
 */

namespace std;

//define("home", "CControllersHome.php");
class CApp{
    /**
     * @var CUrl $url_param
     */
    static protected $url_param;

    /** @var CController $controller  */
    static public $controller = null;
    static public function Initial(){
        /**
         * @var CUrl static::$url_param;
         */

        static::$url_param = new CUrl();
        try{
            $start_point = static::$url_param->getFirstController();
            switch ($start_point){
                case 'home':{
                    static::$controller = new \CControllerHome(static::$url_param);
                    break;
                }
                default:{
                    throw new \AppException("There is no defined controller {$start_point}", \AppException::UNKNOWN_MAIN_CONTROLLER);
                }
            }
        }
        catch (\AppException $e){
            switch ($e->getCode()){
                case \AppException::UNKNOWN_MAIN_CONTROLLER:{
                    static::$controller = new \CController404(static::$url_param);
                    return true;
                    break;
                }
                default:{
                    throw new \SystemException("Unknown exception in App", \SystemException::APP_EXCEPTIONS);
                }
            }
        }
        return true;
    }

    public function renderPage(){
        static::$controller->renderPage();
    }
}