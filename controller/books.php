<?php
$root = $_SERVER["DOCUMENT_ROOT"];

require_once $root . "/model/db.php";
require_once $root . "/model/common.php";
require_once $root . "/model/books.php";

$dbModelObj = new db();
$commonModelObj = new common($dbModelObj);
$booksModelObj = new booksModel($dbModelObj, $commonModelObj);

