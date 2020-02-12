<?php
include("include.php");
$DBObject = new DBfunctions();

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){
	$pagename = addslashes($_POST['pagename']);
	$pagecontent = addslashes($_POST['pagecontent']);
	$pagetitle = addslashes($_POST['pagetitle']);
	$pagemetakeys = addslashes($_POST['pagemetakeys']);
	$pagemetadesc = addslashes($_POST['pagemetadesc']);
	$parentid = $_POST['parent'];
	
	$dbresult = $DBObject->InsertNewPage($pagename,$pagetitle,$pagecontent,$pagemetakeys,$pagemetadesc,$parentid);
	
	if($dbresult==1){
	$_SESSION['message'] = "Page Added";
	header("Location:cms_manager.php");
	}
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="HTML_Dump/css.css" rel="stylesheet" type="text/css">
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
    <td align="left" valign="top"><?php include("admin_left_menu.php");?></td>
    <td width="1" valign="top" bgcolor="#A7B0BC"></td>
    <td align="left" valign="top">

<table width="100%"  border="0" cellpadding="1" cellspacing="1" bgcolor="#6666CC">
  <tr>
    <td class="heading">&nbsp;CMS &gt; ADD NEW SUBPAGE </td>
  </tr>
  <tr>
    <td valign="top"><form name="form1" method="post" action="" onsubmit="return validate_form_sub(this);">
      <table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="16%">&nbsp;</td>
          <td colspan="3">            
              <div align="right">
                <input type="submit" name="Submit" value="Add">
                <input type="button" name="Cancel" value="Cancel" onclick="window.location.href='cms_manager.php';">
              </div></td>
        </tr>
        <tr valign="top">
          <td class="normaltext">&nbsp;&nbsp;Page Name </td>
          <td width="46%"><input name="pagename" type="text" size="60"> </td>
          <td width="12%"><div align="right"><span class="normaltext">Parent Page&nbsp;&nbsp; </span>
		    </div></td>

          <td width="26%">&nbsp;
			<select name="parent">
			<option value="">------------ Select ------------</option>
			<?php
			$parentobject = $DBObject->getAllParents(0);
			while ($resultobj = $parentobject->fetch_object()) {
			?>
			<option value="<?php echo $resultobj->id; ?>"><?php echo $resultobj->name; ?></option>
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
          <td colspan="4" class="heading">&nbsp;CONTENT</td>
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
			$oFCKeditor->Value = '' ;
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
          <td colspan="3"><input name="pagetitle" type="text" size="60"></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Page Meta Keywords </td>
          <td colspan="3"><textarea name="pagemetakeys" cols="46" rows="5"></textarea></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Page Meta Description </td>
          <td colspan="3"><textarea name="pagemetadesc" cols="46" rows="5"></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3"><input type="submit" name="Submit" value="Add">
            <input type="button" name="Cancel" value="Cancel" onclick="window.location.href='cms_manager.php';">
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
