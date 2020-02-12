<?php
include("include.php");
$DBObject = new DBfunctions();
$seclink = new SECfunctions();


if(isset($_GET['id'])){
$id = $_GET['id'];
$DBObject->setSPLCATEntry($id);

	if($DBObject->checkSPLCATEntryExistance()==0){
	$_SESSION['message'] = "Site Error";
	header("Location:manage_splcat.php");
	}else{
		$resultset = $DBObject->editSPLCATEntryContent();
			if($resultset == 0){
			$_SESSION['message'] = "Site Error";
			header("Location:manage_splcat.php");
			}
	}
}

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){

	$name = $seclink->escape_protection($_POST['name']);
	$website = $seclink->escape_protection($_POST['website']);
	$description = $seclink->escape_protection($_POST['description']);
	$category = $seclink->escape_protection($_POST['category']);
	$id = $seclink->escape_protection($_POST['id']);
	$DBObject->setSPLCATEntry($id);


	$dbresult_check = $DBObject->CheckSPLCATEntry($website,$category,$id);
	if($dbresult_check==0){
	$dbresult = $DBObject->EditSPLCATEntry($category,$name,$website,$description);

	if($dbresult==1){
	$_SESSION['message'] = "Entry Edited";
	header("Location:manage_splcat_links.php?id=".$category);
	}else{
	$_SESSION['message'] = "Site Error, Please try again";
	header("Location:cms_manager.php");
	}

	}else{
	$_SESSION['message'] = "Error : The URL you entered is already present under this category";
	}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>admin</title>
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php include("include_js_css.php"); // CSS and JS Functions //?>
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><?php include("admin_header.php")?></td>
  </tr>
  <tr>
    <td width="181" height="11"></td>
    <td bgcolor="#A7B0BC"></td>
    <td height="11"></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#E2E5E9" height="450"><?php include("admin_left_menu.php");?></td>
    <td width="1" valign="top" bgcolor="#A7B0BC"></td>
    <td align="left" valign="top">

<table width="100%"  border="1" cellpadding="4" cellspacing="4" bgcolor="#6666CC">
  <tr>
    <td class="heading">&nbsp;CMS &gt; EDIT SPECIAL CATEGORY ENTRY </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFFFFF">
	<?php
	if(isset($_SESSION['message']) && $_SESSION['message'] !=""){
	?>
	<p class="redtext"><?php echo $_SESSION['message']; ?></p>
	<?php
	if(!isset($_POST['Submit'])){
	$_SESSION['message'] = "";
	}
	}
	?>
	<form name="addnewentry" id="addnewentry" method="post" action="" onsubmit="return validate_form_add_freestuff_entry(this);">
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="30%" class="normaltext">Name*</td>
          <td width="70%"><input name="name" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->name); ?>"></td>
        </tr>
        <tr>
          <td width="30%" class="normaltext">Website *</td>
          <td width="70%"><input name="website" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->website); ?>"></td>
        </tr>
        <tr>
          <td width="30%" class="normaltext">Short Description *</td>
          <td width="70%"><textarea name="description" cols="40" rows="5"><?php echo $seclink->escape_protection_decode($resultset->description); ?></textarea></td>
        </tr>
        <tr>
          <td width="30%" class="normaltext">Choose your Category *</td>
          <td width="70%"><select name="category" id="category">
    	  <option value="">--</option>
			<?php
			$selectedvalue = "";
			$parentobject = $DBObject->getAllFSParents(0);
			while ($resultobj = $parentobject->fetch_object()) {
			if($resultset->catid == $resultobj->id){
			$selectedvalue = "SELECTED";
			}else{
			$selectedvalue = "";
			}
			?>
            <option value="<?php echo $resultobj->id; ?>" <?php echo $selectedvalue;?>><?php echo $resultobj->name; ?></option>
            <?php
			}
			?>
          </select></td>
        </tr>
	     <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>
		 <input type="hidden" name="IsSubmit" value="1">
 		 <input type="hidden" name="id" value="<?php echo $id;?>">
		 <input type="submit" name="Submit" value="Submit"></td>
       </tr>
      </table>
    </form>      </td>
  </tr>
</table>

	</td>
  </tr>
  <tr bgcolor="#A41110">
    <td height="2" colspan="3"></td>
  </tr>
  <tr bgcolor="#597294">
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>
