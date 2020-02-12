<?php
include("include.php");

$DBObject = new DBfunctions();

if(isset($_GET['id'])){
$id = $_GET['id'];
$DBObject->setSPLCATEntry($id);
$cid = $DBObject->getSPLCATEntryParent();
if($DBObject->ChangeSPLCATEntryStatus()==1){
header("Location:manage_splcat_links.php?pid=".$cid);
}else{
$_SESSION['message'] = "Error Encountered, Please try again";
header("Location:manage_splcat_links.php?pid=".$cid);
}

}
?>



