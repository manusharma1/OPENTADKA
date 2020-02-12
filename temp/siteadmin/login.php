<?php
session_start();
session_regenerate_id();
require("../config.php"); // Main Config File
require("../includes/db.php"); // DB Config File
require("functions/dbfunctions.php"); // DB Functions //

$_SESSION['LoginForm'] = "1"; // security //
if(isset($_POST['Submit_x']) && isset($_POST['LoginForm']) && $_POST['LoginForm']=="1" && isset($_SESSION['LoginForm']) && $_SESSION['LoginForm']=="1"){
$DBObject = new DBfunctions();
$DBObject->setUserDetails($_POST['user'],$_POST['pass']);
$DBObject->setSecuritySalt();
$returnresult = $DBObject->loginCheck();

if($returnresult != 0){
$_SESSION['username'] = $returnresult->username;
$_SESSION['id'] = $returnresult->id;
$_SESSION['UserLoGGedIn'] = "true";
global $website_name;
$_SESSION['WSName'] = $website_name;
$_SESSION['message'] = "";
global $cookie_sesssion_timeout;
setcookie("SiteAdmin", "SA".$returnresult->username."sa", time()+$cookie_sesssion_timeout);
header("Location:cms_manager.php");
}else{
$_SESSION['message'] = "Unable to Login";
header("Location:login.php");
}

}

?>
<html>
<head>
<title>Welcome to the Administrator</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php include("include_js_css.php"); // CSS and JS Functions //?>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="77" valign="middle" background="images/bg.gif"><img src="images/logo.png" width="281" height="50" hspace="8"></td>
      </tr>
      <tr>
        <td height="22" bgcolor="#E2E5E9">&nbsp;</td>
      </tr>
      <tr>
        <td height="4" bgcolor="#A41110"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top">
	
	<?php
	if(isset($_SESSION['message']) && $_SESSION['message'] !=""){
	?>
	<p class="redtext"><?php echo $_SESSION['message']; ?></p>
	<?php
	}
	?>
	
	<form name="login" method="post" action="login.php" onsubmit="return validate_form_login(this);">
      <table width="60%"  border="0" cellspacing="0" cellpadding="0" class="borderall" bgcolor="#E2E5E9">
        <tr>
          <td height="50" colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td width="26%">&nbsp;</td>
          <td width="17%" valign="top" class="body_text">User Name : </td>
          <td colspan="2" valign="top">
            <input name="user" type="text" class="normal">
          </td>
        </tr>
        <tr>
          <td height="5" colspan="4" valign="top"></td>
        </tr>
        <tr>
          <td valign="top">&nbsp;</td>
          <td valign="top" class="body_text">Password : </td>
          <td colspan="2" valign="top"><input name="pass" type="password" class="normal"></td>
        </tr>
        <tr valign="bottom">
          <td height="30" colspan="2">&nbsp;</td>
          <td width="44%" height="30"><input name="Submit" type="image" src="images/login.gif" width="46" height="16" border="0">
              <input type="hidden" name="LoginForm" value="1">
          </td>
          <td width="13%" height="30">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr bgcolor="#A41110">
    <td height="2"></td>
  </tr>
  <tr bgcolor="#597294">
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>