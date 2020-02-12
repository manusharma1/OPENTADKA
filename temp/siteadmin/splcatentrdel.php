<?php
include("include.php");
$DBObject = new DBfunctions();
$DBObject->setSPLCATEntry($_SESSION['splcatentrydelid']);
$cid = $DBObject->getSPLCATEntryParent();
$DBObject->SPLCATEntryDelete();
$_SESSION['splcatentrydelid'] = "";
header("Location:manage_splcat_links.php?pid=".$cid);
?>



