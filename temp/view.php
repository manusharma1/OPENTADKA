<?php
include("include.php");

if(isset($_GET['id'])){
$pageid = $_GET['id'];
$DBObjectF->setPage($pageid);
$pageContents = $DBObjectF->getPageData();

	if(empty($pageContents)){
	$pageTitle = $pageContents = PAGE_ERROR;
	$pageName = PAGE_ERROR_TITLE;
	$pageMetaDesciption = $pageMetaKeywords = "";
	}else{
	$pageName = $SecObjectF->escape_protection_decode($pageContents->name);
	$pageTitle = $SecObjectF->escape_protection_decode($pageContents->title);
	$pageMetaDesciption = $SecObjectF->escape_protection_decode($pageContents->metadesc);
	$pageMetaKeywords = $SecObjectF->escape_protection_decode($pageContents->metakey);
	$pageContents = $SecObjectF->escape_protection_decode($pageContents->data);
	}

}else{
	$pageTitle = $pageContents = PAGE_ERROR;
	$pageName = PAGE_ERROR_TITLE;
	$pageMetaDesciption = $pageMetaKeywords = "";
}

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){
	$pagecontent = $seclink->escape_protection($_POST['pagecontent']);
	$pageitle = $seclink->escape_protection($_POST['pagetitle']);
	$pagemetakeys = $seclink->escape_protection($_POST['pagemetakeys']);
	$email = $seclink->escape_protection($_POST['email']);
	$postedbyname = $seclink->escape_protection($_POST['postedbyname']);
	$parentid = $_POST['parent'];
	$memberid = 0;
	$dbresult = $DBObjectF->InsertNewReply($pagetitle,$pagetitle,$pagecontent,$pagemetakeys,$pagemetakeys,$parentid,$email,$postedbyname,$memberid);
	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title><?php echo $pageTitle;?></title>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<meta name="description" content="<?php echo $pageMetaDesciption;?>" />
	<meta name="keywords" content="<?php echo $pageMetaKeywords;?>" />
	<link rel='stylesheet' type='text/css' href='css/style.css' />
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
      <h1><?php echo $pageTitle;?></h1><br /><hr /><br />
	  <?php echo $pageContents;?>
	  
	  <?php echo $DBObjectF->getReplies()?>
<br /><br /><hr /><br />
<h2>Add Your Comment</h2>
	  <div id="addcommentformdiv">
	  <form name="addcomment">
	  <table width="100%" border="0" cellpadding="4" cellspacing="4">
	    
		<?php
		if(!isset($_SESSION['id'])){
		?>
		<tr>
          <td>Name* :</td>
	      <td><input name="name" type="text" id="name" size="39" />           
	         [<a href="#">Login</a>]</td>
        </tr>
	    <tr>
          <td>Email* :</td>
	      <td><input name="email" type="text" id="email" size="39" /></td>
        </tr>
		<?php
		}
		?>


        <tr>
          <td width="25%">Title* :</td>
          <td><input name="title" type="text" size="39" /></td>
        </tr>
        <tr>
          <td width="25%">Comment*: </td>
          <td><textarea name="commet" cols="30" rows="5"></textarea></td>
        </tr>
        <tr>
          <td width="25%">&nbsp;</td>
          <td>
            <input name="Submit" type="submit" id="Submit" value="Add Comment" /> 
            * Required </td>
        </tr>
      </table>
	  <br />
	  </form>
	  </div>

</div>
	<div id="bottom-wrap" >sdfasd fsdf sadf sdf sdaf</div>

</body>

</html>