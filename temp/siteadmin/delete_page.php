<?php
include("include.php");

$DBObject = new DBfunctions();

if(isset($_GET['id'])){

$id = $_GET['id'];

$DBObject->setPage($id);

if($DBObject->checkPageExistance()==0){
$_SESSION['message'] = "Site Error";
header("Location:manage_pages.php");
}

$_SESSION['pagedelid'] = $id;
if($DBObject->IsParentPage()>0){

?>
<script language="JavaScript">
if(!confirm("The page you are going to delete contains child pages, deleting this page will also remove all the child pages. \n Are you Sure you want to continue?")){
document.location.href="manage_pages.php";
}else{
document.location.href="pgdel.php";
}
</script>
<?php
}else{
?>
<script language="JavaScript">
if(!confirm("Are you Sure you want delete this page?")){
document.location.href="manage_pages.php";
}else{
document.location.href="pgdel.php";
}
</script>
<?php
}

}
?>



