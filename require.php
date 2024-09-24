<!--
require.php
Hamed masrour
sepehrpay.com
-->

<?php

require_once("utility.php");

//directory path url
// $site_url = "http://10.100.103.24/ipg_tester/";
    
$site_url = url_current_dir();
Define('ROOT_DIR_URL', $site_url );

//js directory path url
$js_dir_url = $site_url . "js/";
Define('JS_DIR_URL', $site_url );

//css directory path url
$css_dir_url = $site_url . "css/";
Define('CSS_DIR_URL', $site_url );

//bootstrap js file path url
$bootstrap_js_url = $js_dir_url . "bootstrap.min.js";
Define('BOOTSTRAP_JS_URL', $bootstrap_js_url);

//bootstrap css file path url
$bootstrap_css_url = $css_dir_url . "bootstrap.min.css";
Define('BOOTSTRAP_CSS_URL', $bootstrap_css_url );

//Jquery js file path url
$jquery_js_url = $js_dir_url . "jquery-3.1.1.min.js";
Define('JQUERY_JS_URL', $jquery_js_url);

//target style css file path url
$style_css_url = $css_dir_url . "style.css";
Define('STYLE_CSS_URL', $style_css_url );

?>

<link href=<?php echo BOOTSTRAP_CSS_URL ?> type="text/css" rel="stylesheet" />
<link href=<?php echo STYLE_CSS_URL ?> type="text/css" rel="stylesheet" />



<!-- <script type="text/javascript" src="http://www.sepehrpay.com/wp-content/themes/enfold/bill_payment_js/jquery-1.12.0.min.js"></script>
<script src="http://www.sepehrpay.com//wp-content/themes/enfold/bill_payment_js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->

<!-- <script type="text/javascript" src=<?php //echo JQUERY_JS_URL ?> ></script>
<script src=<?php //echo BOOTSTRAP_JS_URL ?> integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 -->
