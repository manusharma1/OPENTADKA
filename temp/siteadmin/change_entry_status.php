<?php
include("include.php");

$DBObject = new DBfunctions();

if(isset($_GET['id'])){
$id = $_GET['id'];
$DBObject->setEntry($id);
$cid = $DBObject->getEntryParent();

if($DBObject->ChangeEntryStatus()==1){
header("Location:manage_sub_category_links.php?id=".$cid);
}else{
$_SESSION['message'] = "Error Encountered, Please try again";
header("Location:manage_sub_category_links.php?id=".$cid);
}

}
?>



