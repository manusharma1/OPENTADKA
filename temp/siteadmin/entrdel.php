<?php
include("include.php");
$DBObject = new DBfunctions();
$DBObject->setEntry($_SESSION['entrydelid']);
$cid = $DBObject->getEntryParent();
$DBObject->EntryDelete();
$_SESSION['entrydelid'] = "";
header("Location:manage_sub_category_links.php?id=".$cid);
?>



