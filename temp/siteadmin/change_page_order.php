<?php
include("include.php");
$DBObject = new DBfunctions();

if(isset($_GET['d']) && isset($_GET['id'])){
	$id = $_GET['id'];
	$direction = $_GET['d'];
	$DBObject->setPage($id);
	if($DBObject->checkPageExistance() !=0){
	if($DBObject->ChangeOrder($id,$direction) == 1){
	header("location:manage_pages.php");
	}else{
	$_SESSION['message'] = "Site Error";
	header("location:manage_pages.php");
	}
	}
}

?>

