<?php
include("include.php");

$DBObject = new DBfunctions();
$output = "";
global $allowed_file_exts;

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){

if($_FILES["header_ad1"]["name"]){


// Delete the existing related images //

			$header_image_file_name = "header_ad";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/bHeader/";
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$header_image_file_name.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  @unlink($file_exists);
			  }
			}
			
// Delete the existing related images //

$extension = explode(".",$_FILES["header_ad1"]["name"]);
$ext_type = end($extension);

if(in_array($ext_type,$allowed_file_exts)){

$finalfilename = "header_ad" .".". $ext_type;

$target_path = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/BnrImages/bHeader/";

$target_path = $target_path . $finalfilename; 

if(move_uploaded_file($_FILES['header_ad1']['tmp_name'], $target_path)) {
    $output .= "The file ".  basename( $_FILES['header_ad1']['name']). 
    " has been uploaded as ".$finalfilename ."<br />";
	
	// Update DB
	$splpage_header1 = $_POST['splpage_header1'];
	$dbresult = $DBObject->InsertHeaderBanners(1,$finalfilename);


} else{
    $output .= "There was an error uploading the Header Advertisement file: ".basename( $_FILES['header_ad1']['name']).", please try again! <br />";
}

}else{ // if not the correct file type

$output .= "The file type for Header Advertisement file: ".basename( $_FILES['header_ad1']['name'])." is invalid, please try again!, Please upload only 'jpg' , 'gif' , 'png', 'jpeg' or 'bmp' files. <br />";

}

} // if($_FILES["header_ad1"]["name"]) end



$_SESSION['msg'] = $output;

header("Location:manage_header_footer_ads.php?");

} // if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1") ends
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
        <td class="heading">&nbsp;CMS &gt; MANAGE HEADER ADS </td>
      </tr>
      <tr>
        <td class="heading"><form action="" method="post" enctype="multipart/form-data"  onsubmit="return validate_header_footer_ads_form(this);"><table width="100%"  border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
          <tr>
            <td width="34%">Header Ads</td>
            <td width="66%">&nbsp;</td>
          </tr>
          <tr>
            <td><span class="normaltext">&nbsp;- Ad 1 </span><br /><input type="button" value="Delete" name="Delete" onClick="return del_hf_ads('1');" /></td>
            <td>
			<hr />
			<input type="file" name="header_ad1" />
			<?php
			$header_image_file_name = "header_ad";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/bHeader/";
			$flag_ad_header = 0;
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$header_image_file_name.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  $flag_ad_header = 1;
			  $header_image_file_full_path_name = SITE_HOSTNAME."/".SITE_FOLDERNAME."/BnrImages/bHeader/".$header_image_file_name.".".$allowed_file_exts[$i];
			  }
			}
			
			if($flag_ad_header==0){
			$header_image_file_full_path_name = SITE_HOSTNAME.SITE_FOLDERNAME."/images/noimage.gif";
			}
			?>
			<div style="width:500px;overflow:scroll;">
			<img src="<?php echo $header_image_file_full_path_name;?>" width="974" height="74" />
			</div><br />
			
			
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