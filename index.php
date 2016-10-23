<?php
/**
 * Created by PhpStorm.
 * User: rafik
 * Date: 9/23/16
 * Time: 6:12 PM
 */
//echo $_SERVER['DOCUMENT_ROOT'];
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once 'init.php';
?>
<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- start: HEAD -->
<!-- start: HEAD -->
<head>
    <title>Clip-Two - Responsive Admin Template</title>
    <!-- start: META -->
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <?php
        echo "<!-- Starting autocomplate of css links for this page only -->\n";
        $app->addCssLinks();
    ?>
</head>
<body>
<?php
    $app->renderPage();
?>

<!-- Starting connect js files for this page only -->
<?php
    $app->addJsLinks();
?>
<script>
    jQuery(document).ready(function() {
        Main.init();
    });
</script>
</body>

</html>
