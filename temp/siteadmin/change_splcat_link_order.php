<?php
include("include.php");
$DBObject = new DBfunctions();

if(isset($_GET['d']) && isset($_GET['id'])){
	$id = $_GET['id'];
	$direction = $_GET['d'];
	$DBObject->setSPLCATEntry($id);
	if($DBObject->checkSPLCATEntryExistance() !=0){

	if($DBObject->ChangeSPLCATEntryOrder($id,$direction) == 1){
		$pid = $DBObject->getSPLCATEntryParent($id);
		if($pid=="0"){
		header("location:manage_splcat.php");
		}else{
		header("location:manage_splcat_links.php?pid=".$pid);
		}
	}else{
	$_SESSION['message'] = "Error Encountered, Please try again";
	header("location:manage_splcat.php");
	}
	}
}

?>

