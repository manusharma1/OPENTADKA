<?php
include("include.php");
$DBObject = new DBfunctions();

if(isset($_GET['d']) && isset($_GET['id'])){
	$id = $_GET['id'];
	$direction = $_GET['d'];
	$DBObject->setCat($id);
	if($DBObject->checkCatExistance() !=0){

	if($DBObject->ChangeCatOrder($id,$direction) == 1){
		$pid = $DBObject->getCatParent($id);
		if($pid=="0"){
		header("location:manage_categories.php");
		}else{
		header("location:manage_sub_categories.php?pid=".$pid);
		}
	}else{
	$_SESSION['message'] = "Error Encountered, Please try again";
	header("location:manage_categories.php");
	}
	}
}

?>

