<?php
$root = $_SERVER["DOCUMENT_ROOT"];
require_once $root . "/model/db.php";
$dbModelObj = new db();
$dbModelObj->getConnectionSettings();
$vBaseUrl = $dbModelObj->conn_obj["server"];

if(!isset($_COOKIE['cookie_graf_language']) || $_COOKIE['cookie_graf_language'] == '' || ($_COOKIE['cookie_graf_language'] != "af" || $_COOKIE['cookie_graf_language'] != "en")){
    $past = time() - 100;
    setcookie("cookie_graf_language", 'af', $past, "/", $vBaseUrl, false, true);//1 year
    setcookie("cookie_graf_language", 'af', time() + (86400*365), "/", $vBaseUrl, false, true);//1 year
}
if(!isset($_SESSION['graf_client']['language']) || empty($_SESSION['graf_client']['language'] == '') || ($_SESSION['graf_client']['language'] != 'af' && $_SESSION['graf_client']['language'] != 'en')){
    unset($_SESSION['graf_client']['language']);
	if(!isset($_SESSION['graf_client']['language']) && isset($_COOKIE['graf_language'])){
		$_SESSION['graf_client']['language'] = $_COOKIE['graf_language'];
	}
	else {
    	$_SESSION['graf_client']['language'] = 'af';
	}
}


//TODO
if(!isset($_SESSION['graf_client']['discount'])) {
    $_SESSION['graf_client']['discount'] = 0;
}
else {
    $_SESSION['graf_client']['discount'] = $_SESSION['graf_client']['discount'];
}