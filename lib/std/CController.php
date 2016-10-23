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

define("ASSETS_WEB", 'http://megatrade.local/public/');
define("VENDOR_WEB", 'http://megatrade.local/public/');
class CController{
    protected $__datas = [];
    protected $__url = null;
    protected $__internall_name = 'layouts';

    protected $css = [
        '<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />',
        '<link rel="stylesheet" href="'.VENDOR_WEB.'vendor/bootstrap/css/bootstrap.min.css">',
        '<link rel="stylesheet" href="'.VENDOR_WEB.'vendor/fontawesome/css/font-awesome.min.css">',
        '<link rel="stylesheet" href="'.VENDOR_WEB.'vendor/themify-icons/themify-icons.min.css">',
        '<link href="'.VENDOR_WEB.'vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">',
        '<link href="'.VENDOR_WEB.'vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">',
        '<link href="'.VENDOR_WEB.'vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">',
        '<link rel="stylesheet" href="'.ASSETS_WEB.'assets/css/styles.css">',
        '<link rel="stylesheet" href="'.ASSETS_WEB.'assets/css/plugins.css">',
        '<link rel="stylesheet" href="'.ASSETS_WEB.'assets/css/themes/theme-1.css" id="skin_color" />',
    ];

    protected $js = [
        '<script src="'.VENDOR_WEB.'vendor/jquery/jquery.min.js"></script>',
        '<script src="'.VENDOR_WEB.'vendor/bootstrap/js/bootstrap.min.js"></script>',
        '<script src="'.VENDOR_WEB.'vendor/modernizr/modernizr.js"></script>',
        '<script src="'.VENDOR_WEB.'vendor/jquery-cookie/jquery.cookie.js"></script>',
        '<script src="'.VENDOR_WEB.'vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>',
        '<script src="'.VENDOR_WEB.'vendor/switchery/switchery.min.js"></script>',

    ];

    protected $childs_css = [];
    protected $childs_js = [];

    public function __construct(CUrl $url){
        if(!$url)
            $this->url = new CUrl();
        else $this->url = $url;
    }

    public function renderPage($by_name=null){
        if($by_name)
            require_once PUBLIC_ZONE.'templates/'.$this->__internall_name.'/'.$by_name.'.php';
        else require_once PUBLIC_ZONE.'templates/'.$this->__internall_name.'/index.php';
    }

    public function getCSS()
    {
        return array_merge($this->css, $this->childs_css);
    }

    public function getJS()
    {
        return array_merge($this->js, $this->childs_js);
    }
}