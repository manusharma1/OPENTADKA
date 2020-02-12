<?php
include("include.php");
$DBObject = new DBfunctions();

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){

	$seclink = new SECfunctions();
	$pagename = $seclink->escape_protection($_POST['pagename']);
	$pagecontent = $seclink->escape_protection($_POST['pagecontent']);
	$pagetitle = $seclink->escape_protection($_POST['pagetitle']);
	$pagemetakeys = $seclink->escape_protection($_POST['pagemetakeys']);
	$pagemetadesc = $seclink->escape_protection($_POST['pagemetadesc']);
	$parentid = $_POST['parent'];
	
	$dbresult = $DBObject->InsertNewPageSpecial($pagename,$pagetitle,$pagecontent,$pagemetakeys,$pagemetadesc,$parentid);
	
	if($dbresult==1){
	$_SESSION['message'] = "Page Added";
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

<table width="100%"  border="1" cellpadding="4" cellspacing="4" bgcolor="#6666CC">
  <tr>
    <td class="heading">&nbsp;CMS &gt; ADD NEW SUBPAGE (SPECIAL)</td>
  </tr>
      <tr>
        <td class="headinglightorange">* - Required</td>
      </tr>
  <tr>
    <td valign="top"><form name="form1" method="post" action="" onsubmit="return validate_form_sub(this);">
      <table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="16%">&nbsp;</td>
          <td colspan="3" align="right" height="50" width="100%">            
                <input type="submit" name="Submit" value="Add">
                <input type="button" name="Cancel" value="Cancel" onclick="window.location.href='cms_manager.php';">
              </td>
        </tr>
        <tr valign="top">
          <td class="normaltext">&nbsp;&nbsp;Page Name * </td>
          <td><input name="pagename" type="text" size="60"> </td>
          <td width="8%"><div align="right"><span class="normaltext">Parent Page*&nbsp;&nbsp; </span>
		    </div></td>

          <td width="30%">&nbsp;
			<select name="parent">
			<option value="">------------ Select ------------</option>
			<?php
			$parentobject = $DBObject->getAllParentsSpecial(0);
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
