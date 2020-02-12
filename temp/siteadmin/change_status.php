<?php
include("include.php");

$DBObject = new DBfunctions();

if(isset($_GET['id']) && isset($_GET['pid'])){
$id = $_GET['id'];
$pid = $_GET['pid'];
$DBObject->setPage($id);

if($DBObject->ChangeStatus()==1){
header("Location:manage_sub_contents.php?id=".$pid);
}else{
$_SESSION['message'] = "Site Error";
header("Location:manage_sub_contents.php?id=".$pid);
}

}
?>



