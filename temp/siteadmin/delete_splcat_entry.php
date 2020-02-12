<?php
include("include.php");

$DBObject = new DBfunctions();

if(isset($_GET['id'])){

$id = $_GET['id'];
$DBObject->setSPLCATEntry($id);

if($DBObject->checkSPLCATEntryExistance()==0){
$_SESSION['message'] = "Site Error";
header("Location:manage_splcat.php");
}

$_SESSION['splcatentrydelid'] = $id;
$cid = $DBObject->getSPLCATEntryParent();

?>
<script language="JavaScript">
if(!confirm("You are going to delete an Entry, this action will remove this record from the database. \n Are you Sure you want to continue?")){
document.location.href="manage_splcat_links.php?pid=<?php echo $cid;?>";
}else{
document.location.href="splcatentrdel.php";
}
</script>

<?php
}
?>



