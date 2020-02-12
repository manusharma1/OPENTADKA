<?php
include("include.php");

$DBObject = new DBfunctions();

if(isset($_GET['id'])){
$id = $_GET['id'];
$DBObject->setCat($id);
$pid = $DBObject->getCatParent($id);
$_SESSION['catdelid'] = $id;

if($DBObject->checkCatExistance()==0){
$_SESSION['message'] = "Site Error";
header("Location:manage_categories.php");
}

if($DBObject->IsParentCat()>0){
?>
<script language="JavaScript">
if(!confirm("The category you are going to delete contains child categories, deleting this category will also remove all the sub categories under it. \n Are you Sure you want to continue?")){
document.location.href="manage_categories.php";
}else{
document.location.href="ctdel.php";
}
</script>
<?php
}else if($pid != "0"){
?>
<script language="JavaScript">
if(!confirm("Are you Sure you want delete this sub category?")){
document.location.href="manage_sub_categories.php?pid=<?php echo $pid; ?>";
}else{
document.location.href="ctdel.php";
}
</script>
<?php
}else{
?>
<script language="JavaScript">
if(!confirm("Are you Sure you want delete this category?")){
document.location.href="manage_categories.php";
}else{
document.location.href="ctdel.php";
}
</script>
<?php
}

}
?>



