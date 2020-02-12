<?php
include("include.php");

$DBObject = new DBfunctions();

if(isset($_GET['id'])){
$id = $_GET['id'];
$DBObject->setFSEntry($id);
$cid = $DBObject->getFSEntryParent();
if($DBObject->ChangeFSEntryStatus()==1){
header("Location:manage_freestuff_links.php?pid=".$cid);
}else{
$_SESSION['message'] = "Error Encountered, Please try again";
header("Location:manage_freestuff_links.php?pid=".$cid);
}
}
?>



