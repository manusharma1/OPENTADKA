<?php
include("include.php");

$DBObject = new DBfunctions();

if(isset($_GET['id'])){
$id = $_GET['id'];
$DBObject->setPageSpecial($id);

if($DBObject->ChangeStatusSpecial()==1){
header("Location:manage_pages_special.php");
}else{
$_SESSION['message'] = "Site Error";
header("Location:manage_pages_special.php");
}

}
?>



