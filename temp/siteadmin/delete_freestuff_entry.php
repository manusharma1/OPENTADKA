<?php
include("include.php");

$DBObject = new DBfunctions();

if(isset($_GET['id'])){

$id = $_GET['id'];
$DBObject->setFSEntry($id);

if($DBObject->checkFSEntryExistance()==0){
$_SESSION['message'] = "Site Error";
header("Location:manage_freestuff.php");
}

$_SESSION['fsentrydelid'] = $id;
$cid = $DBObject->getFSEntryParent();

?>
<script language="JavaScript">
if(!confirm("You are going to delete an Entry, this action will remove this record from the database. \n Are you Sure you want to continue?")){
document.location.href="manage_freestuff_links.php?pid=<?php echo $cid;?>";
}else{
document.location.href="fsentrdel.php";
}
</script>

<?php
}
?>



