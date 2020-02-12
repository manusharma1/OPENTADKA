<?php
session_start();
if(!isset($_SESSION['sessionincrease']) && $_SESSION['sessionincrease']!="true"){
header("Location:logout.php");
}

require("../config.php"); // Main Config File
require("../includes/db.php"); // DB Config File
require("functions/dbfunctions.php"); // DB Functions //

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){
if($_POST['Submit'] == "Yes"){
global $cookie_sesssion_timeout;
setcookie("SiteAdmin", "SA".$_SESSION['username']."sa", time()+$cookie_sesssion_timeout);
$_SESSION['sessionincrease'] = "";
unset($_SESSION['sessionincrease']);
header("Location:cms_manager.php");
}else{
header("Location:logout.php");
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
    <td class="heading">&nbsp;CMS &gt; DO YOU WANT TO CONTINUE WITH THIS SESSION? </td>
  </tr>
  <tr>
    <td valign="top">
	<form name="changepass" method="post" action="" onsubmit="return validate_form_passchange(this);">
      <table width="100%"  border="0" bgcolor="#FFFFFF">
        <tr>
          <td width="68%"><div align="center">
            <p class="normaltext">Due to the continuous inactivity of the session, Your current session is going to expire.<br>
              Do you want to continue with this session?</p>
            <p>
  <input name="Submit" type="submit" id="Submit" value="Yes">
&nbsp;
      <input type="submit" name="Submit" value="No">
      <input type="hidden" name="IsSubmit" value="1">
                </p>
          </div></td>
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
