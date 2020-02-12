<?php
include("include.php");

$DBObject = new DBfunctions();
$seclink = new SECfunctions();


if(isset($_GET['id'])){
$pageid = $_GET['id'];
$DBObject->setPageSpecial($pageid);

	if($DBObject->checkPageExistanceSpecial()==0){
	$_SESSION['message'] = "Site Error";
	header("Location:manage_pages_special.php");
	}else{
		$resultset = $DBObject->editPageContentSpecial();
			if($resultset == 0){
			$_SESSION['message'] = "Site Error";
			header("Location:manage_pages_special.php");
			}
	}
}

// AFTER POST

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){
	$pageid = $_POST['pageid'];
	$pagename = $seclink->escape_protection($_POST['pagename']);
	$pagecontent = $seclink->escape_protection($_POST['pagecontent']);
	$pagetitle = $seclink->escape_protection($_POST['pagetitle']);
	$pagemetakeys = $seclink->escape_protection($_POST['pagemetakeys']);
	$pagemetadesc = $seclink->escape_protection($_POST['pagemetadesc']);
	$parentid = 0;

	$dbresult = $DBObject->EditPageSpecial($pageid,$pagename,$pagetitle,$pagecontent,$pagemetakeys,$pagemetadesc);
	

	if($dbresult==1){
	$_SESSION['message'] = "Special Page Edited";
	header("Location:edit_page_special.php?id=".$pageid);
	}else{
	$_SESSION['message'] = "Site Error, Please try again";
	header("Location:manage_pages_special.php");
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
    <td class="heading">&nbsp;CMS &gt; EDIT PAGE </td>
  </tr>
 <tr>
 <td class="headinglightorange">* - Required</td>
 </tr>
  <tr>
    <td valign="top"><form name="addnewpage" method="post" action="" onsubmit="return validate_form(this);">
      <table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="20%">&nbsp;</td>
          <td width="80%">            
              <div align="right">
                <input type="submit" name="Submit" value="Edit">
                <input type="button" name="Cancel" value="Cancel" onclick="window.location.href='manage_pages_special.php';">
              </div></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Page Name * </td>
          <td><input name="pagename" type="text" size="60" value="<?php echo $seclink->escape_protection_decode($resultset->name);?>"></td>
        </tr>
        <tr>
          <td colspan="2" class="heading">&nbsp;CONTENT *</td>
          </tr>
        <tr>
          <td class="normaltext">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" class="normaltext">
		  <div align="center">
            <?php
			$oFCKeditor = new FCKeditor('pagecontent') ;
			$oFCKeditor->BasePath = 'includes/fckeditor/';
			$oFCKeditor->ToolbarSet = 'CMS';
			$oFCKeditor->Width = '800px'; 
			$oFCKeditor->Height = '500px'; 
			$oFCKeditor->Value = $seclink->escape_protection_decode($resultset->data);
			$oFCKeditor->Create() ;
			?>
          </div></td>
          </tr>
        <tr>
          <td colspan="2" class="headingorange">&nbsp;SEO</td>
          </tr>
        <tr>
          <td class="normaltext">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Page Title </td>
          <td><input name="pagetitle" type="text" size="60" value="<?php echo $seclink->escape_protection_decode($resultset->title);?>"></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Page Meta Keywords </td>
          <td><textarea name="pagemetakeys" cols="46" rows="5"><?php echo $seclink->escape_protection_decode($resultset->metakey);?></textarea></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Page Meta Description </td>
          <td><textarea name="pagemetadesc" cols="46" rows="5"><?php echo $seclink->escape_protection_decode($resultset->metadesc);?></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Edit">
            <input type="button" name="Cancel" value="Cancel" onclick="window.location.href='manage_pages_special.php';">
			<input type="hidden" name="pageid" value="<?php echo $seclink->escape_protection_decode($resultset->id);?>">
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
