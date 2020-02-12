<?php
include("include.php");
$DBObject = new DBfunctions();

if(isset($_GET['d']) && isset($_GET['id'])){
	$id = $_GET['id'];
	$direction = $_GET['d'];
	$DBObject->setEntry($id);
	if($DBObject->checkCatEntryExistance() !=0){

	if($DBObject->ChangeCatEntryOrder($id,$direction) == 1){
		$pid = $DBObject->getEntryParent($id);
		if($pid=="0"){
		header("location:manage_categories.php");
		}else{
		header("location:manage_sub_category_links.php?id=".$pid);
		}
	}else{
	$_SESSION['message'] = "Error Encountered, Please try again";
	header("location:manage_categories.php");
	}
	}
}

?>

