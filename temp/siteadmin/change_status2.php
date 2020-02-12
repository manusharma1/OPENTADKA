<?php
include("include.php");

$DBObject = new DBfunctions();

if(isset($_GET['id'])){
$id = $_GET['id'];
$DBObject->setPage2($id);

if($DBObject->ChangeStatus2()==1){
header("Location:manage_pages2.php");
}else{
$_SESSION['message'] = "Site Error";
header("Location:manage_pages2.php");
}

}
?>



