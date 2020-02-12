<?php
include("include.php");
$DBObject = new DBfunctions();

if(isset($_GET['d']) && isset($_GET['id'])){
	$id = $_GET['id'];
	$direction = $_GET['d'];
	$DBObject->setFSEntry($id);
	if($DBObject->checkFSEntryExistance() !=0){

	if($DBObject->ChangeFSEntryOrder($id,$direction) == 1){
		$pid = $DBObject->getFSEntryParent($id);
		if($pid=="0"){
		header("location:manage_freestuff.php");
		}else{
		header("location:manage_freestuff_links.php?pid=".$pid);
		}
	}else{
	$_SESSION['message'] = "Error Encountered, Please try again";
	header("location:manage_freestuff.php");
	}
	}
}

?>

