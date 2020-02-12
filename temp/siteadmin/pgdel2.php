<?php
include("include.php");
$DBObject = new DBfunctions();
$DBObject->setPage2($_SESSION['pagedelid2']);
$DBObject->PageDelete2();
$_SESSION['pagedelid2'] = "";
header("Location:manage_pages2.php");
?>



