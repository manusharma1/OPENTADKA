<?php
session_start();
$_SESSION['msgf'] = "";
include("include.php");

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){
	$pagecontent = $seclink->escape_protection($_POST['pagecontent']);
	$pagetitle = $seclink->escape_protection($_POST['pagetitle']);
	$pagemetakeys = $seclink->escape_protection($_POST['pagemetakeys']);
	$email = $seclink->escape_protection($_POST['email']);
	$postedbyname = $seclink->escape_protection($_POST['postedbyname']);
	$parentid = $_POST['parent'];
	$memberid = 0;
	$dbresult = $DBObjectF->InsertNewPage($pagetitle,$pagetitle,$pagecontent,$pagemetakeys,$pagemetakeys,$parentid,$email,$postedbyname,$memberid);
	
	if($dbresult==1){
	$_SESSION['msgf'] = "Page Added";
	header("Location:add.php");
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Open Source India</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	
    <script type='text/javascript' src='js/jquery.min.js'></script>
    <script type='text/javascript' src='js/infogrid.js'></script>   
    
</head>

<body>

    <div id="top-wrap">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td width="53"><img src="images/logo.jpg" width="53" height="97" style="margin-top:30px;" /></td>
          <td width="242"  style="background:url(images/bg1.jpg) no-repeat; height:143px;"></td>
          <td><table width="100" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="110">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="125" height="34"><a href="#"><img src="images/openorgin.gif" width="125" height="34" border="0"/></a></td>
              <td width="5">&nbsp;</td>
              <td width="196"><a href="#"><img src="images/submityourproject.gif" width="196" height="34" border="0"/></a></td>
              <td width="5">&nbsp;</td>
              <td width="106"><a href="#"><img src="images/contact.gif" width="106" height="34" border="0"/></a></td>
            </tr>
          </table></td>
          <td><img src="images/dol.gif" width="83" height="137" /></td>
        </tr>
      </table>
    </div>
<div id="page-wrap">
      <h1>&nbsp;</h1>
      <hr />
      <p>&nbsp;</p>
	  <p><?php echo $_SESSION['msgf'];?></p>
      <h1>Add</h1>
      <form id="add" name="add" method="post" action="">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="31%">Your Email</td>
            <td width="69%"><label>
              <input name="email" type="text" id="email" />
            </label></td>
          </tr>
          <tr>
            <td>Select A Category </td>
            <td>
			<select name="parent">
			<option>------------ Select ------------</option>
			<?php
			$parentobject = $DBObjectF->getAllParents(0);
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
            </select>			</td>
          </tr>
          <tr>
            <td>Your Name </td>
            <td><label>
              <input name="postedbyname" type="text" id="postedbyname" />
            </label></td>
          </tr>
          <tr>
            <td>Title of Your Post </td>
            <td><input name="pagetitle" type="text" id="pagetitle" /></td>
          </tr>
          <tr>
            <td>Content</td>
            <td>
            <?php
			$oFCKeditor = new FCKeditor('pagecontent');
			$oFCKeditor->BasePath = 'includes/fckeditor/';
			$oFCKeditor->ToolbarSet = 'CMS' ;
			$oFCKeditor->Width = '600px'; 
			$oFCKeditor->Height = '300px'; 
			$oFCKeditor->Value = '' ;
			$oFCKeditor->Create() ;
			?>
            </td>
          </tr>
          <tr>
            <td>Any Kewords or Tags? </td>
            <td><label>
              <input name="pagemetakeys" type="text" id="pagemetakeys" />
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="Submit" value="Add" />
			  <input type="hidden" name="IsSubmit" value="1">
            </label></td>
          </tr>
        </table>
  </form>
      <p>&nbsp;      </p>
</div>
	<div id="bottom-wrap" >sdfasd fsdf sadf sdf sdaf</div>

</body>

</html>