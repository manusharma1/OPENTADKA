<?php
include("include.php");

$DBObject = new DBfunctions();

if(isset($_GET['id'])){

$id = $_GET['id'];

$DBObject->setPageSpecial($id);

if($DBObject->checkPageExistanceSpecial()==0){
$_SESSION['message'] = "Site Error";
header("Location:manage_pages_special.php");
}

$_SESSION['sppagedelid'] = $id;
if($DBObject->IsParentPageSpecial()>0){

?>
<script language="JavaScript">
if(!confirm("The page you are going to delete contains child pages, deleting this page will also remove all the child pages. \n Are you Sure you want to continue?")){
document.location.href="manage_pages_special.php";
}else{
document.location.href="pgdel_special.php";
}
</script>
<?php
}else{
?>
<script language="JavaScript">
if(!confirm("Are you Sure you want delete this page?")){
document.location.href="manage_pages_special.php";
}else{
document.location.href="pgdel_special.php";
}
</script>
<?php
}

}
?>



