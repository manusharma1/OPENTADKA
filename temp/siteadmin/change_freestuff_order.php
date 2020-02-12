<?php
include("include.php");
$DBObject = new DBfunctions();

if(isset($_GET['d']) && isset($_GET['id'])){
	$id = $_GET['id'];
	$direction = $_GET['d'];
	$DBObject->setFS($id);
	if($DBObject->checkFSExistance() !=0){

	if($DBObject->ChangeFSOrder($id,$direction) == 1){
		$pid = $DBObject->getFSParent($id);
		if($pid=="0"){
		header("location:manage_freestuff.php");
		}else{
		header("location:manage_sub_freestuff.php?pid=".$pid);
		}
	}else{
	$_SESSION['message'] = "Error Encountered, Please try again";
	header("location:manage_freestuff.php");
	}
	}
}

?>

