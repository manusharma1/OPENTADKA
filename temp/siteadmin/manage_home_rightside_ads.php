<?php
include("include.php");

$DBObject = new DBfunctions();
$seclink = new SECfunctions();

$output = "";
global $allowed_file_exts;

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){

if($_FILES["rightside_ad1"]["name"]){

// Delete the existing related images //

			$rightside_image_file_name_1 = "rightside_ad_1";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/BRightSide/";
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_1.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  @unlink($file_exists);
			  }
			}
			
// Delete the existing related images //


$extension = explode(".",$_FILES["rightside_ad1"]["name"]);
$ext_type = end($extension);

if(in_array($ext_type,$allowed_file_exts)){

$finalfilename = "rightside_ad_1" .".". $ext_type;

$target_path = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/BnrImages/BRightSide/";
$target_path = $target_path . $finalfilename;

if(move_uploaded_file($_FILES['rightside_ad1']['tmp_name'], $target_path)) {
    $output .= "The file ".  basename( $_FILES['rightside_ad1']['name']). 
    " has been uploaded as " .$finalfilename. "<br />";

	// Update DB
	$bannerlink1 = $_POST['bannerlink1'];
	$dbresult = $DBObject->InsertCatBanners('0',$finalfilename,$bannerlink1,'1');

} else{
    $output .= "There was an error uploading the Footer file No. 1: ".basename( $_FILES['rightside_ad1']['name']).", please try again! <br />";
}

}else{ // if not the correct file type

$output .= "The file type for Footer Advertisement file No. 1: ".basename( $_FILES['rightside_ad1']['name'])." is invalid, please try again!, Please upload only 'jpg' , 'gif' , 'png', 'jpeg' or 'bmp' files. <br />";

}

} // if($_FILES["rightside_ad1"]["name"]) end


if($_FILES["rightside_ad2"]["name"]){

	// Delete the existing related images //

			$rightside_image_file_name_1 = "rightside_ad_2";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/BRightSide/";
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_1.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  @unlink($file_exists);
			  }
			}
			
// Delete the existing related images //

$extension = explode(".",$_FILES["rightside_ad2"]["name"]);
$ext_type = end($extension);

if(in_array($ext_type,$allowed_file_exts)){

$finalfilename = "rightside_ad_2" .".". $ext_type;

$target_path = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/BnrImages/BRightSide/";
$target_path = $target_path . $finalfilename;

if(move_uploaded_file($_FILES['rightside_ad2']['tmp_name'], $target_path)) {
    $output .= "The file ".  basename( $_FILES['rightside_ad2']['name']). 
    " has been uploaded as " .$finalfilename. "<br />";

// Update DB

	$bannerlink2 = $_POST['bannerlink2'];
	$dbresult = $DBObject->InsertCatBanners('0',$finalfilename,$bannerlink2,'2');

} else{
    $output .= "There was an error uploading the Footer file No. 2: ".basename( $_FILES['rightside_ad2']['name']).", please try again! <br />";
}

}else{ // if not the correct file type

$output .= "The file type for Footer Advertisement file No.2: ".basename( $_FILES['rightside_ad2']['name'])." is invalid, please try again!, Please upload only 'jpg' , 'gif' , 'png', 'jpeg' or 'bmp' files. <br />";

}

} // if($_FILES["rightside_ad2"]["name"]) end



if($_FILES["rightside_ad3"]["name"]){

	// Delete the existing related images //

			$rightside_image_file_name_1 = "rightside_ad_3";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/BRightSide/";
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_1.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  @unlink($file_exists);
			  }
			}
			
// Delete the existing related images //

$extension = explode(".",$_FILES["rightside_ad3"]["name"]);
$ext_type = end($extension);

if(in_array($ext_type,$allowed_file_exts)){

$finalfilename = "rightside_ad_3" .".". $ext_type;

$target_path = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/BnrImages/BRightSide/";
$target_path = $target_path . $finalfilename;

if(move_uploaded_file($_FILES['rightside_ad3']['tmp_name'], $target_path)) {
    $output .= "The file ".  basename( $_FILES['rightside_ad3']['name']). 
    " has been uploaded as " .$finalfilename. "<br />";

	// Update DB
	$bannerlink3 = $_POST['bannerlink3'];
	$dbresult = $DBObject->InsertCatBanners('0',$finalfilename,$bannerlink3,'3');

} else{
    $output .= "There was an error uploading the Footer file No. 3: ".basename( $_FILES['rightside_ad3']['name']).", please try again! <br />";
}

}else{ // if not the correct file type

$output .= "The file type for Footer Advertisement file No. 3: ".basename( $_FILES['rightside_ad3']['name'])." is invalid, please try again!, Please upload only 'jpg' , 'gif' , 'png', 'jpeg' or 'bmp' files. <br />";

}

} // if($_FILES["rightside_ad3"]["name"]) end


if($_FILES["rightside_ad4"]["name"]){
	
	// Delete the existing related images //

			$rightside_image_file_name_1 = "rightside_ad_4";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/BRightSide/";
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_1.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  @unlink($file_exists);
			  }
			}
			
// Delete the existing related images //

$extension = explode(".",$_FILES["rightside_ad4"]["name"]);
$ext_type = end($extension);

if(in_array($ext_type,$allowed_file_exts)){

$finalfilename = "rightside_ad_4" .".". $ext_type;

$target_path = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/BnrImages/BRightSide/";
$target_path = $target_path . $finalfilename;

if(move_uploaded_file($_FILES['rightside_ad4']['tmp_name'], $target_path)) {
    $output .= "The file ".  basename( $_FILES['rightside_ad4']['name']). 
    " has been uploaded as " .$finalfilename. "<br />";

	// Update DB
	$bannerlink4 = $_POST['bannerlink4'];
	$dbresult = $DBObject->InsertCatBanners('0',$finalfilename,$bannerlink4,'4');

} else{
    $output .= "There was an error uploading the Footer file No. 4: ".basename( $_FILES['rightside_ad4']['name']).", please try again! <br />";
}

}else{ // if not the correct file type

$output .= "The file type for Footer Advertisement file No. 4: ".basename( $_FILES['rightside_ad4']['name'])." is invalid, please try again!, Please upload only 'jpg' , 'gif' , 'png', 'jpeg' or 'bmp' files. <br />";

}

} // if($_FILES["rightside_ad4"]["name"]) end

$_SESSION['msg'] = $output;
header("Location:manage_home_rightside_ads.php?");

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
        <td class="heading">&nbsp;CMS &gt; MANAGE HOME PAGE RIGHT PANEL ADS </td>
      </tr>
      <tr>
        <td class="headinglightorange">* - Required<br />Please enter link without "http://" prefix.</td>
      </tr>

      <tr>
        <td class="heading"><form action="" method="post" enctype="multipart/form-data"  onsubmit="return validate_header_rightside_ads_form(this);"><table width="100%"  border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
          <tr>
            <td width="34%">Right Panel Ads </td>
            <td width="66%">&nbsp;</td>
          </tr>
          <tr>
            <td><span class="normaltext">&nbsp;- Ad 1 *</span><br /><input type="button" value="Delete" name="Delete" onClick="return del_cat_ads2('0','1');" /></td>
            <td>
			<hr />
			<input type="file" name="rightside_ad1" />
			<?php
			$BannerData = $DBObject->getRightPanelBanners(0,1);
			$rightside_image_file_name_1 = "rightside_ad_1";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/BRightSide/";
			$flag_ad_rightside_1 = 0;
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_1.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  $flag_ad_rightside_1 = 1;
			  $rightside_image_file_full_path_name_1 = SITE_HOSTNAME."/".SITE_FOLDERNAME."/BnrImages/BRightSide/".$rightside_image_file_name_1.".".$allowed_file_exts[$i];
			  }
			}
			
			if($flag_ad_rightside_1==0){
			$rightside_image_file_full_path_name_1 = SITE_HOSTNAME.SITE_FOLDERNAME."/images/noimage.gif";
			}
			?>
			<img src="<?php echo $rightside_image_file_full_path_name_1;?>" width="120" height="170" /><br />
			<input name="bannerlink1" type="text" size="20" value="<?php echo $BannerData->link;?>" /> <span class="normaltext"><b>Link *</b></span>
			</td>
          </tr>
          <tr>
            <td><span class="normaltext">&nbsp;- Ad 2 * </span><br /><input type="button" value="Delete" name="Delete" onClick="return del_cat_ads2('0','2');" /></td>
            <td>
			<hr />
			<input type="file" name="rightside_ad2" />
			<?php
			$BannerData = $DBObject->getRightPanelBanners(0,2);
			$rightside_image_file_name_2 = "rightside_ad_2";
			$flag_ad_rightside_2 = 0;
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_2.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  $flag_ad_rightside_2 = 1;
			  $rightside_image_file_full_path_name_2 = SITE_HOSTNAME."/".SITE_FOLDERNAME."/BnrImages/BRightSide/".$rightside_image_file_name_2.".".$allowed_file_exts[$i];
			  }
			}
			
			if($flag_ad_rightside_2==0){
			$rightside_image_file_full_path_name_2 = SITE_HOSTNAME.SITE_FOLDERNAME."/images/noimage.gif";
			}
			?>
			<img src="<?php echo $rightside_image_file_full_path_name_2;?>" width="120" height="170" /><br />
			<input name="bannerlink2" type="text" size="20" value="<?php echo $BannerData->link;?>" /> <span class="normaltext"><b>Link *</b></span>
			</td>
          </tr>
          <tr>
            <td><span class="normaltext">&nbsp;- Ad 3 * </span><br /><input type="button" value="Delete" name="Delete" onClick="return del_cat_ads2('0','3');" /></td>
            <td>
			<hr />
			<input type="file" name="rightside_ad3" />
			<?php
			$BannerData = $DBObject->getRightPanelBanners(0,3);
			$rightside_image_file_name_3 = "rightside_ad_3";
			$flag_ad_rightside_3 = 0;
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_3.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  $flag_ad_rightside_3 = 1;
			  $rightside_image_file_full_path_name_3 = SITE_HOSTNAME."/".SITE_FOLDERNAME."/BnrImages/BRightSide/".$rightside_image_file_name_3.".".$allowed_file_exts[$i];
			  }
			}
			
			if($flag_ad_rightside_3==0){
			$rightside_image_file_full_path_name_3 = SITE_HOSTNAME.SITE_FOLDERNAME."/images/noimage.gif";
			}
			?>


			<img src="<?php echo $rightside_image_file_full_path_name_3;?>" width="120" height="170" /><br />
			<input name="bannerlink3" type="text" size="20" value="<?php echo $BannerData->link;?>" /> <span class="normaltext"><b>Link *</b></span>
			</td>
          </tr>
          <tr>
            <td><span class="normaltext">&nbsp;- Ad 4 * </span><br /><input type="button" value="Delete" name="Delete" onClick="return del_cat_ads2('0','4');" /></td>
            <td>
			<hr />
			<input type="file" name="rightside_ad4" />
			<?php
			$BannerData = $DBObject->getRightPanelBanners(0,4);
			$rightside_image_file_name_4 = "rightside_ad_4";
			$flag_ad_rightside_4 = 0;
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_4.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  $flag_ad_rightside_4 = 1;
			  $rightside_image_file_full_path_name_4 = SITE_HOSTNAME."/".SITE_FOLDERNAME."/BnrImages/BRightSide/".$rightside_image_file_name_4.".".$allowed_file_exts[$i];
			  }
			}
			
			if($flag_ad_rightside_4==0){
			$rightside_image_file_full_path_name_4 = SITE_HOSTNAME.SITE_FOLDERNAME."/images/noimage.gif";
			}
			?>
			<img src="<?php echo $rightside_image_file_full_path_name_4;?>" width="120" height="170" /><br />
			<input name="bannerlink4" type="text" size="20" value="<?php echo $BannerData->link;?>" /> <span class="normaltext"><b>Link*</b></span>
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