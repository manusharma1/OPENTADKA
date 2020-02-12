<?php
include("include.php");

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){

	$seclink = new SECfunctions();
	
	$pagename = $seclink->escape_protection($_POST['pagename']);
	$pagecontent = $seclink->escape_protection($_POST['pagecontent']);
	$pagetitle = $seclink->escape_protection($_POST['pagetitle']);
	$pagemetakeys = $seclink->escape_protection($_POST['pagemetakeys']);
	$pagemetadesc = $seclink->escape_protection($_POST['pagemetadesc']);
	$parentid = 0;

	$DBObject = new DBfunctions();

	//$dbresult = $DBObject->InsertNewPage($pagename,$pagetitle,$pagecontent,$pagemetakeys,$pagemetadesc,$parentid);


/*

	$dataarray = array();
	$dataarray['id'] = '';
	$dataarray['pid'] = 0;
	$dataarray['name'] = $_POST['pagename'];
	$dataarray['title'] = $_POST['pagetitle'];
	$dataarray['metakeys'] = $_POST['pagemetakeys'];
	$dataarray['metadesc'] = $_POST['pagemetadesc'];

	$conditionarray = array();
	$conditionarray['=']['id'] = 7;
	//$conditionarray['!=']['id'] = 7;
	$conditionarray['AND =']['name'] = 'manu';
	$conditionarray['AND !=']['name'] = 'manu';
	$conditionarray['OR !=']['name'] = 'sunilta';
	//$conditionarray['AND ()']['name'] = 'radha';
	//$conditionarray['OR ()']['name'] = 'radha';
	$conditionarray['OR =']['name'] = 'sunilta';

	$inarray  = array('a','b','c');
	//$conditionarray['IN ARR']['surname'] = $inarray;
	$conditionarray['OR !IN ARR']['surname'] = $inarray;


// Sub Query Start Here //


	$colsarray = array('id','name');
	$conditionarray2 = array();
	$conditionarray2['=']['pid'] = 7;
	$dbresult2 = $DBObject->DBomni('S', 'data', $colsarray, $conditionarray2, '', '', '');

	$conditionarray['IN CON']['surname'] = $dbresult2;


	//$DBObject->DBomni('I', 'data', $dataarray, '', '', '', '');
	
	$dbresult = $DBObject->DBomni('U', 'data', $dataarray, $conditionarray, '', '', '');

*/

	$colsarray = array('u.id','u.name');

	$tablearray = array();
	$tablearray['users'] = 'u';
	$tablearray['content'] = 'c';

	$dataarray = array();
	$dataarray['u.phone'] = $_POST['pagename'];


	$conditionarray = array();
	$conditionarray['K=']['u.id'] = 'c.id';
	$conditionarray['AND=']['c.id'] = '1';



	//$dbresult = $DBObject->DBomniJ('U', $tablearray, $dataarray, $conditionarray, '', '', '');

	// JOIN INSERT NEEDS TO BE DISCUSSED
	// INSERT INTO users(phone) SELECT content.id FROM content WHERE content.id = '1'


	$dbresult = $DBObject->DBomniJ('S', $tablearray, $colsarray, $conditionarray, '', '', '');



	echo $dbresult;die;


	if($dbresult==1){
	$_SESSION['message'] = "Page Added";
	header("Location:manage_pages.php");
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
    <td class="heading">&nbsp;CMS &gt; ADD NEW PAGE (FREE STUFF)</td>
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
                <input type="submit" name="Submit" value="Add">
                <input type="button" name="Cancel" value="Cancel" onclick="window.location.href='cms_manager.php';">
              </div></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Page Name * </td>
          <td><input name="pagename" type="text" size="60"></td>
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
			$oFCKeditor->ToolbarSet = 'CMS' ;
			$oFCKeditor->Width = '800px'; 
			$oFCKeditor->Height = '500px'; 
			$oFCKeditor->Value = '' ;
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
          <td><input name="pagetitle" type="text" size="60"></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Page Meta Keywords </td>
          <td><textarea name="pagemetakeys" cols="46" rows="5"></textarea></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Page Meta Description </td>
          <td><textarea name="pagemetadesc" cols="46" rows="5"></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Add">
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
