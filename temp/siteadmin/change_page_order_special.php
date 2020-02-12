<?php
include("include.php");
$DBObject = new DBfunctions();

if(isset($_GET['d']) && isset($_GET['id'])){
	$id = $_GET['id'];
	$direction = $_GET['d'];
	$DBObject->setPageSpecial($id);
	if($DBObject->checkPageExistanceSpecial() !=0){
	if($DBObject->ChangeOrderSpecial($id,$direction) == 1){
	header("location:manage_pages_special.php");
	}else{
	$_SESSION['message'] = "Site Error";
	header("location:manage_pages_special.php");
	}
	}
}

?>

