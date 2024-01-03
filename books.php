<?php

if (!isset($_SESSION)) {
	session_start();
}
$root = $_SERVER["DOCUMENT_ROOT"];

require_once $root."/model/db.php";
require_once $root."/model/common.php";
require_once $root."/model/books.php";

require_once $root."/view/parts.php";
require_once $root."/config/setSessions.php";

$dbModelObj = new db();
$commonModelObj = new common($dbModelObj);
$booksModelObj = new booksModel($dbModelObj, $commonModelObj);
$partsView = new partsView($dbModelObj, $commonModelObj, $booksModelObj);

echo $partsView->getHtmlBegin();
echo $partsView->getTopBar();
echo $partsView->getHeader();
echo $partsView->getOffCanvas();