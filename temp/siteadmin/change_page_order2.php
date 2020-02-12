<?php
include("include.php");
$DBObject = new DBfunctions();

if(isset($_GET['d']) && isset($_GET['id'])){
	$id = $_GET['id'];
	$direction = $_GET['d'];
	$DBObject->setPage2($id);
	if($DBObject->checkPageExistance2() !=0){
	if($DBObject->ChangeOrder2($id,$direction) == 1){
	header("location:manage_pages2.php");
	}else{
	$_SESSION['message'] = "Site Error";
	header("location:manage_pages2.php");
	}
	}
}

?>

