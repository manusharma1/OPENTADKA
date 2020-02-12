<?php
include("include.php");

$DBObject = new DBfunctions();
$seclink = new SECfunctions();


if(isset($_GET['id'])){
$pageid = $_GET['id'];
$DBObject->setPage2($pageid);

	if($DBObject->checkSubPageExistance2()==0){
	$_SESSION['message'] = "Site Error";
	header("Location:manage_pages2.php");
	}else{
		$resultset = $DBObject->editPageContent2();
			if($resultset == 0){
			$_SESSION['message'] = "Site Error";
			header("Location:manage_pages2.php");
			}
	}
}

// AFTER POST

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){
	$pagename = $seclink->escape_protection($_POST['pagename']);
	$pagecontent = $seclink->escape_protection($_POST['pagecontent']);
	$pagetitle = $seclink->escape_protection($_POST['pagetitle']);
	$pagemetakeys = $seclink->escape_protection($_POST['pagemetakeys']);
	$pagemetadesc = $seclink->escape_protection($_POST['pagemetadesc']);
	$currentparent = $_POST['currentparent'];
	$parentid = $_POST['parent'];
	
	if($currentparent == $parentid){
	$dbresult = $DBObject->EditSubPage2($pageid,$pagename,$pagetitle,$pagecontent,$pagemetakeys,$pagemetadesc,$parentid,'0');
	}else{
	$dbresult = $DBObject->EditSubPage2($pageid,$pagename,$pagetitle,$pagecontent,$pagemetakeys,$pagemetadesc,$parentid,'1');
	}
	
	if($dbresult==1){
	$_SESSION['message'] = "Sub Page Edited";
	header("Location:edit_sub_page2.php?id=".$pageid);
	}else{
	$_SESSION['message'] = "Site Error, Please try again";
	header("Location:manage_pages2.php");
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

<table width="100%"  border="1" cellpadding="4" cellspacing="4" bgcolor="#6666CC">
  <tr>
    <td class="heading">&nbsp;CMS &gt; EDIT SUBPAGE (USEFUL WEBSITES)</td>
  </tr>
      <tr>
        <td class="headinglightorange">* - Required</td>
      </tr>
  <tr>
    <td valign="top"><form name="form1" method="post" action="" onsubmit="return validate_form_sub(this);">
      <table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="16%">&nbsp;</td>
          <td colspan="3">            
              <div align="right">
                <input type="submit" name="Submit" value="Edit">
                <input type="button" name="Cancel" value="Cancel" onclick="window.location.href='manage_pages2.php';">
              </div></td>
        </tr>
        <tr valign="top">
          <td class="normaltext">&nbsp;&nbsp;Page Name * </td>
          <td width="46%"><input name="pagename" type="text" size="60" value="<?php echo $seclink->escape_protection_decode($resultset->name);?>"></td>
          <td width="12%"><div align="right"><span class="normaltext">Parent Page*&nbsp;&nbsp; </span>
		    </div></td>

          <td width="26%">&nbsp;
			<select name="parent">
			<option value="">------------ Select ------------</option>
			<?php
			$parentobject = $DBObject->getAllParents(0);
			while ($resultobj = $parentobject->fetch_object()) {
			if($resultobj->id == $resultset->pid){
			$optvalselect = "SELECTED";
			}else{
			$optvalselect = "";
			}
			?>
			<option value="<?php echo $resultobj->id; ?>" <?php echo $optvalselect; ?>><?php echo $resultobj->name; ?></option>
			<?php
			}
			?>
            </select>
		</td>

        </tr>
        <tr>
          <td class="normaltext">&nbsp;</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4" class="heading">&nbsp;CONTENT *</td>
          </tr>
        <tr>
          <td class="normaltext">&nbsp;</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4" class="normaltext"> 
		  <div align="center">
		  <?php
			$oFCKeditor = new FCKeditor('pagecontent');
			$oFCKeditor->BasePath = 'includes/fckeditor/';
			$oFCKeditor->ToolbarSet = 'CMS' ;
			$oFCKeditor->Width = '800px'; 
			$oFCKeditor->Height = '500px'; 
			$oFCKeditor->Value = $seclink->escape_protection_decode($resultset->data);
			$oFCKeditor->Create() ;
			?>
			</div></td>
          </tr>
        <tr>
          <td colspan="4" class="headingorange">&nbsp;SEO</td>
          </tr>
        <tr>
          <td class="normaltext">&nbsp;</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Page Title </td>
          <td colspan="3"><input name="pagetitle" type="text" size="60" value="<?php echo $seclink->escape_protection_decode($resultset->title);?>"></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Page Meta Keywords </td>
          <td colspan="3"><textarea name="pagemetakeys" cols="46" rows="5"><?php echo $seclink->escape_protection_decode($resultset->metakey);?></textarea></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Page Meta Description </td>
          <td colspan="3"><textarea name="pagemetadesc" cols="46" rows="5"><?php echo $seclink->escape_protection_decode($resultset->metadesc);?></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3"><input type="submit" name="Submit" value="Edit">
            <input type="button" name="Cancel" value="Cancel" onclick="window.location.href='manage_pages2.php';">
			<input type="hidden" name="currentparent" value="<?php echo $resultset->pid;?>">
			<input type="hidden" name="IsSubmit" value="1">
			</td>
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
