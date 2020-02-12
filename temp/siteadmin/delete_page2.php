<?php
include("include.php");

$DBObject = new DBfunctions();

if(isset($_GET['id'])){

$id = $_GET['id'];

$DBObject->setPage2($id);

if($DBObject->checkPageExistance2()==0){
$_SESSION['message'] = "Site Error";
header("Location:manage_pages2.php");
}

$_SESSION['pagedelid2'] = $id;
if($DBObject->IsParentPage2()>0){

?>
<script language="JavaScript">
if(!confirm("The page you are going to delete contains child pages, deleting this page will also remove all the child pages. \n Are you Sure you want to continue?")){
document.location.href="manage_pages2.php";
}else{
document.location.href="pgdel2.php";
}
</script>
<?php
}else{
?>
<script language="JavaScript">
if(!confirm("Are you Sure you want delete this page?")){
document.location.href="manage_pages2.php";
}else{
document.location.href="pgdel2.php";
}
</script>
<?php
}

}
?>



