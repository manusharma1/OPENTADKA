<?php
include("include.php");

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){
	$seclink = new SECfunctions();
	$oldpassword = $seclink->escape_protection_no_htmlsplchars($_POST['oldpass']);
	$password = $seclink->escape_protection_no_htmlsplchars($_POST['pass']);

	$DBObject = new DBfunctions();
	$DBObject->setSecuritySalt();

	if($DBObject->OldPasswordOK($oldpassword,$_SESSION['id']) != 0){
		$dbresult = $DBObject->ChangePassword($password, $_SESSION['id']);
	}else{
	$_SESSION['message'] = "Old Password is Incorrect";
	header("Location:change_password.php");
	}
	
	if($dbresult==1){
	$_SESSION['message'] = "Password Changed";
	header("Location:change_password.php");
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
    <td class="heading">&nbsp;CMS &gt; CHANGE PASSWORD </td>
  </tr>
  <tr>
    <td valign="top">
	<form name="changepass" method="post" action="" onsubmit="return validate_form_passchange(this);">
      <table width="100%"  border="0" bgcolor="#FFFFFF">
		<tr colspan="2">
		<td>
			<?php
			if(isset($_SESSION['message'])){
			?>
			<p class="redtext"><?php echo $_SESSION['message'];?></p>
			<?php
			if(!isset($_POST['Submit'])){
			$_SESSION['message'] = "";
			}		
			}
			?>
		</td>
		</tr>
		<tr>
          <td width="32%" class="normaltext">Old Password : </td>
          <td width="68%"><input name="oldpass" type="password" id="oldpass"></td>
        </tr>
        <tr>
          <td class="normaltext">New Password : </td>
          <td><input name="pass" type="password" id="pass"></td>
        </tr>
        <tr>
          <td class="normaltext">Re-Type Password : </td>
          <td><input name="pass2" type="password" id="pass2"></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;</td>
          <td><input type="submit" name="Submit" value="Change">
&nbsp;
<input type="button" name="cancel" value="Cancel" onclick="window.location.href='cms_manager.php'">
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
