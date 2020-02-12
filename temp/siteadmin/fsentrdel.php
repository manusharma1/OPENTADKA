<?php
include("include.php");
$DBObject = new DBfunctions();
$DBObject->setFSEntry($_SESSION['fsentrydelid']);
$cid = $DBObject->getFSEntryParent();
$DBObject->FSEntryDelete();
$_SESSION['fsentrydelid'] = "";
header("Location:manage_freestuff_links.php?pid=".$cid);
?>



