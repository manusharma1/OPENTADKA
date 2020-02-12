<?php
include("include.php");

$DBObject = new DBfunctions();

if(isset($_GET['id'])){

$id = $_GET['id'];
$DBObject->setEntry($id);

if($DBObject->checkEntryExistance()==0){
$_SESSION['message'] = "Site Error";
header("Location:manage_categories.php");
}

$_SESSION['entrydelid'] = $id;
$cid = $DBObject->getEntryParent();

?>
<script language="JavaScript">
if(!confirm("You are going to delete an Entry, this action will remove this record from the database. \n Are you Sure you want to continue?")){
document.location.href="manage_sub_category_links.php?id=<?php echo $cid;?>";
}else{
document.location.href="entrdel.php";
}
</script>

<?php
}
?>



