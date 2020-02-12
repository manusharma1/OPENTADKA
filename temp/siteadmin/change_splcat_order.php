<?php
include("include.php");
$DBObject = new DBfunctions();

if(isset($_GET['d']) && isset($_GET['id'])){
	$id = $_GET['id'];
	$direction = $_GET['d'];
	$DBObject->setSPLCAT($id);
	if($DBObject->checkSPLCATExistance() !=0){

	if($DBObject->ChangeSPLCATOrder($id,$direction) == 1){
		$pid = $DBObject->getSPLCATParent($id);
		if($pid=="0"){
		header("location:manage_splcat.php");
		}else{
		header("location:manage_splcat.php");
		}
	}else{
	$_SESSION['message'] = "Error Encountered, Please try again";
	header("location:manage_splcat.php");
	}
	}
}

?>

