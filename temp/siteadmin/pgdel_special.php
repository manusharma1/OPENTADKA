<?php
include("include.php");
$DBObject = new DBfunctions();
$DBObject->setPageSpecial($_SESSION['pagedelid']);
$DBObject->PageDeleteSpecial();
$_SESSION['sppagedelid'] = "";
header("Location:manage_pages_special.php");
?>



