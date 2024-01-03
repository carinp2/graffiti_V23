<?php
session_start();

$root = $_SERVER["DOCUMENT_ROOT"];

require_once $root."/model/db.php";
require_once $root."/model/common.php";
require_once $root."/model/books.php";

$x = $_SESSION['graf_client']['language'];

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "change_language"){
	if(isset($_SESSION['graf_client']['language']) && $_SESSION['graf_client']['language'] != $_REQUEST['new_language']){
		unset($_SESSION['graf_client']['language']);
		$_SESSION['graf_client']['language'] = $_REQUEST['new_language'];
		echo true;
	}
	else {
		echo false;
	}
}