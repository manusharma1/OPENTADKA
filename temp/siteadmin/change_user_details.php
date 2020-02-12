	<?php
include("include.php");

$DBObject = new DBfunctions();
$seclink = new SECfunctions();

if(isset($_SESSION['id'])){
	$resultset = $DBObject->getUserDetails($_SESSION['id']);

	if($resultset==0){
	$_SESSION['message'] = "Error has been encountered, Please try again";
	header("Location:cms_manager.php");
	}

}

// AFTER POST

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){
	$userid = $_POST['userid'];
	$email = $seclink->escape_protection($_POST['email']);
	$phone = $seclink->escape_protection($_POST['phone']);
	$otherdetails = $seclink->escape_protection($_POST['otherdetails']);

	$dbresult = $DBObject->EditUserDetails($userid,$email,$phone,$otherdetails);
	
	if($dbresult==1){
	$_SESSION['message'] = "User Details Modified";
	header("Location:cms_manager.php");
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
    <td class="heading">&nbsp;CMS &gt; EDIT USER DETAILS </td>
  </tr>
  <tr>
    <td valign="top">
	<form name="addnewpage" method="post" action="" onsubmit="return validate_form(this);">
      <table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="20%">&nbsp;</td>
          <td width="80%">            
              <div align="right">
                <input type="submit" name="Submit" value="Edit">
                <input type="button" name="Cancel" value="Cancel" onclick="window.location.href='cms_manager.php';">
              </div></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;User Name </td>
          <td><?php echo $_SESSION['username'];?></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Email</td>
          <td><input name="email" type="text" size="60" value="<?php echo $seclink->escape_protection_decode($resultset->email);?>"></td>
        </tr>
        <tr>
          <td class="normaltext"> &nbsp;Phone</td>
          <td><input name="phone" type="text" size="60" value="<?php echo $seclink->escape_protection_decode($resultset->phone);?>"></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Other Details </td>
          <td><textarea name="otherdetails" cols="46" rows="5"><?php echo $seclink->escape_protection_decode($resultset->other_details);?></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Edit">
            <input type="button" name="Cancel" value="Cancel" onclick="window.location.href='cms_manager.php';">
			<input type="hidden" name="userid" value="<?php echo $_SESSION['id'];?>">
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
