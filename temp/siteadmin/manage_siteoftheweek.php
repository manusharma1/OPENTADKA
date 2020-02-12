<?php
include("include.php");

$DBObject = new DBfunctions();
$seclink = new SECfunctions();

$output = "";
global $allowed_file_exts;

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){

if($_FILES["siteoftheweek_ad"]["name"]){

// Delete the existing related images //

			$rightside_image_file_name_1 = "siteoftheweek_ad";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/SiteImages/SiteOfTheWeek/";
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_1.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  @unlink($file_exists);
			  }
			}
			
// Delete the existing related images //


$extension = explode(".",$_FILES["siteoftheweek_ad"]["name"]);
$ext_type = end($extension);

if(in_array($ext_type,$allowed_file_exts)){

$finalfilename = "siteoftheweek_ad" .".". $ext_type;

$target_path = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/SiteImages/SiteOfTheWeek/";
$target_path = $target_path . $finalfilename;

if(move_uploaded_file($_FILES['siteoftheweek_ad']['tmp_name'], $target_path)) {
    $output .= "The file ".  basename( $_FILES['siteoftheweek_ad']['name']). 
    " has been uploaded as " .$finalfilename. "<br />";

	// Update DB
	$sitelink = $_POST['sitelink'];
	$sitename = $_POST['sitename'];
	$dbresult = $DBObject->InsertSiteOfTheWeek($sitename,$sitelink,$finalfilename);

} else{
    $output .= "There was an error uploading the Footer file No. 1: ".basename( $_FILES['siteoftheweek_ad']['name']).", please try again! <br />";
}

}else{ // if not the correct file type

$output .= "The file type for Footer Advertisement file No. 1: ".basename( $_FILES['siteoftheweek_ad']['name'])." is invalid, please try again!, Please upload only 'jpg' , 'gif' , 'png', 'jpeg' or 'bmp' files. <br />";

}

} // if($_FILES["siteoftheweek_ad"]["name"]) end


}//if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1") ends

?>

<html>
<head>
<title>admin</title>
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
	if($_SESSION['msg']!=""){
	echo '<p class="redtext" align="center">' .$_SESSION['msg']. '</p>';
	}

	if(!isset($_POST["Submit"])){
	$_SESSION['msg'] = "";
	}
	?>
	<table width="100%"  border="1" cellpadding="4" cellspacing="4" bgcolor="#6666CC">
      <tr>
        <td class="heading">&nbsp;CMS &gt; MANAGE SITE OF THE WEEK </td>
      </tr>
      <tr>
        <td class="headinglightorange">* - Required<br />Please enter link without "http://" prefix.</td>
      </tr>
      <tr>
        <td class="heading"><form action="" method="post" enctype="multipart/form-data"  onsubmit="return validate_siteoftheweek_form(this);"><table width="100%"  border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
          <tr>
            <td width="34%">Site of the Week </td>
            <td width="66%">&nbsp;</td>
          </tr>
          <tr>
            <td><span class="normaltext">&nbsp;- Image *</span></td>
            <td>
			<hr />
			<input type="file" name="siteoftheweek_ad" />
			<?php
			$rightside_image_file_name_1 = "siteoftheweek_ad";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/SiteImages/SiteOfTheWeek/";
			$flag_ad_rightside_1 = 0;
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_1.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  $flag_ad_rightside_1 = 1;
			  $rightside_image_file_full_path_name_1 = SITE_HOSTNAME."/".SITE_FOLDERNAME."/SiteImages/SiteOfTheWeek/".$rightside_image_file_name_1.".".$allowed_file_exts[$i];
			  }
			}
			
			if($flag_ad_rightside_1==0){
			$rightside_image_file_full_path_name_1 = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/images/noimage.gif";
			}
			?>
			<img src="<?php echo $rightside_image_file_full_path_name_1;?>" width="151" height="109" /><br />
			<input name="sitename" type="text" size="20" /> <span class="normaltext"><b>Name *</b></span><br />
			<input name="sitelink" type="text" size="20" /> <span class="normaltext"><b>Link *</b></span>
			</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <div align="center">
				<input type="hidden" name="IsSubmit" value="1">
                <input type="submit" name="Submit" value="Submit">
              </div></td>
            </tr>
        </table>
        </form></td>
      </tr>
    </table></td>
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