<?php
include("include.php");
$DBObject = new DBfunctions();
$DBObject->setPage($_SESSION['pagedelid']);
$DBObject->PageDelete();
$_SESSION['pagedelid'] = "";
header("Location:manage_pages.php");
?>



