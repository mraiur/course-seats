<?php
// Time + ( 1 hours * 6 )
// 1 hours in seconds its 60 min * 60 seconds
$expireTime = time() + ( 3600 * 6 );
session_set_cookie_params($expireTime);
session_start();

// if not having a list in the session create a empty one.
if(!isset($_SESSION['inClass'])){
    $_SESSION['inClass'] = array();
}

define("HTML_TEMPLATES", ROOT . "templates/");

require_once ROOT. "include/functions.php";
require_once ROOT. "include/html.php";