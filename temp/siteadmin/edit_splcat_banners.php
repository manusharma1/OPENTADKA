<?php
include("include.php");

$DBObject = new DBfunctions();

$output = "";
global $allowed_file_exts;

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){

$category_id = $_POST['categoryid'];

if($_FILES["rightside_ad1"]["name"]){

// Delete the existing related images //

			$rightside_image_file_name_1 = "rightside_ad_1";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/BRightSide/SPLCAT/";
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_1."_".$category_id.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  @unlink($file_exists);
			  }
			}
			
// Delete the existing related images //

$extension = explode(".",$_FILES["rightside_ad1"]["name"]);
$ext_type = end($extension);

if(in_array($ext_type,$allowed_file_exts)){

$finalfilename = "rightside_ad_1" ."_".$category_id.".". $ext_type;

$target_path = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/BnrImages/BRightSide/SPLCAT/";
$target_path = $target_path . $finalfilename;

if(move_uploaded_file($_FILES['rightside_ad1']['tmp_name'], $target_path)) {
    $output .= "The file ".  basename( $_FILES['rightside_ad1']['name']). 
    " has been uploaded as " .$finalfilename. "<br />";

	// Update DB

	$bannerlink1 = $_POST['bannerlink1'];
	$dbresult = $DBObject->InsertSPLCATBanners($category_id,$finalfilename,$bannerlink1,'1');

} else{
    $output .= "There was an error uploading the Right Side file No. 1: ".basename( $_FILES['rightside_ad1']['name']).", please try again! <br />";
}

}else{ // if not the correct file type

$output .= "The file type for Right Side Advertisement file No. 1: ".basename( $_FILES['rightside_ad1']['name'])." is invalid, please try again!, Please upload only 'jpg' , 'gif' , 'png', 'jpeg' or 'bmp' files. <br />";

}

} // if($_FILES["rightside_ad1"]["name"]) end


if($_FILES["rightside_ad2"]["name"]){


	// Delete the existing related images //

			$rightside_image_file_name_1 = "rightside_ad_2";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/BRightSide/SPLCAT/";
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_1."_".$category_id.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  @unlink($file_exists);
			  }
			}
			
// Delete the existing related images //

$extension = explode(".",$_FILES["rightside_ad2"]["name"]);
$ext_type = end($extension);

if(in_array($ext_type,$allowed_file_exts)){

$finalfilename = "rightside_ad_2" ."_".$category_id.".". $ext_type;

$target_path = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/BnrImages/BRightSide/SPLCAT/";
$target_path = $target_path . $finalfilename;

if(move_uploaded_file($_FILES['rightside_ad2']['tmp_name'], $target_path)) {
    $output .= "The file ".  basename( $_FILES['rightside_ad2']['name']). 
    " has been uploaded as " .$finalfilename. "<br />";

	// Update DB

	$bannerlink2 = $_POST['bannerlink2'];
	$dbresult = $DBObject->InsertSPLCATBanners($category_id,$finalfilename,$bannerlink2,'2');

} else{
    $output .= "There was an error uploading the Right Side file No. 2: ".basename( $_FILES['rightside_ad2']['name']).", please try again! <br />";
}

}else{ // if not the correct file type

$output .= "The file type for Right Side Advertisement file No.2: ".basename( $_FILES['rightside_ad2']['name'])." is invalid, please try again!, Please upload only 'jpg' , 'gif' , 'png', 'jpeg' or 'bmp' files. <br />";

}

} // if($_FILES["rightside_ad2"]["name"]) end


if($_FILES["rightside_ad3"]["name"]){

	// Delete the existing related images //

			$rightside_image_file_name_1 = "rightside_ad_3";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/BRightSide/SPLCAT/";
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_1."_".$category_id.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  @unlink($file_exists);
			  }
			}
			
// Delete the existing related images //

$extension = explode(".",$_FILES["rightside_ad3"]["name"]);
$ext_type = end($extension);

if(in_array($ext_type,$allowed_file_exts)){

$finalfilename = "rightside_ad_3" ."_".$category_id.".". $ext_type;

$target_path = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/BnrImages/BRightSide/SPLCAT/";
$target_path = $target_path . $finalfilename;

if(move_uploaded_file($_FILES['rightside_ad3']['tmp_name'], $target_path)) {
    $output .= "The file ".  basename( $_FILES['rightside_ad3']['name']). 
    " has been uploaded as " .$finalfilename. "<br />";

	// Update DB

	$bannerlink3 = $_POST['bannerlink3'];
	$dbresult = $DBObject->InsertSPLCATBanners($category_id,$finalfilename,$bannerlink3,'3');

} else{
    $output .= "There was an error uploading the Right Side file No. 3: ".basename( $_FILES['rightside_ad3']['name']).", please try again! <br />";
}

}else{ // if not the correct file type

$output .= "The file type for Right Side Advertisement file No. 3: ".basename( $_FILES['rightside_ad3']['name'])." is invalid, please try again!, Please upload only 'jpg' , 'gif' , 'png', 'jpeg' or 'bmp' files. <br />";

}

} // if($_FILES["rightside_ad3"]["name"]) end


if($_FILES["rightside_ad4"]["name"]){

// Delete the existing related images //

			$rightside_image_file_name_1 = "rightside_ad_4";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/BRightSide/SPLCAT/";
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_1."_".$category_id.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  @unlink($file_exists);
			  }
			}
			
// Delete the existing related images //

$extension = explode(".",$_FILES["rightside_ad4"]["name"]);
$ext_type = end($extension);

if(in_array($ext_type,$allowed_file_exts)){

$finalfilename = "rightside_ad_4" ."_".$category_id.".". $ext_type;

$target_path = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/BnrImages/BRightSide/SPLCAT/";
$target_path = $target_path . $finalfilename;

if(move_uploaded_file($_FILES['rightside_ad4']['tmp_name'], $target_path)) {
    $output .= "The file ".  basename( $_FILES['rightside_ad4']['name']). 
    " has been uploaded as " .$finalfilename. "<br />";

	// Update DB

	$bannerlink4 = $_POST['bannerlink4'];
	$dbresult = $DBObject->InsertSPLCATBanners($category_id,$finalfilename,$bannerlink4,'4');

} else{
    $output .= "There was an error uploading the Right Side file No. 4: ".basename( $_FILES['rightside_ad4']['name']).", please try again! <br />";
}

}else{ // if not the correct file type

$output .= "The file type for Right Side Advertisement file No. 4: ".basename( $_FILES['rightside_ad4']['name'])." is invalid, please try again!, Please upload only 'jpg' , 'gif' , 'png', 'jpeg' or 'bmp' files. <br />";

}

} // if($_FILES["rightside_ad4"]["name"]) end

$_SESSION['msg'] = $output;
header("Location:edit_freestuff_banners.php?id=".$category_id);


}else if(!isset($_GET['id']) || $_GET['id'] == ""){ //if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1") ends
$_SESSION['message'] = "Site Error";
header("Location:manage_freestuff.php");
}else{
$catid = $_GET['id'];
$category_id = $catid;
$DBObject->setSPLCAT($catid);

	if($DBObject->checkSPLCATExistance()==0){
	$_SESSION['message'] = "Site Error";
	header("Location:manage_freestuff.php");
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="cache-control" content="no-cache">
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
        <td class="heading">&nbsp;CMS &gt; MANAGE CATEGORY RIGHT PANEL ADS </td>
      </tr>
      <tr>
        <td class="headinglightorange">* - Required<br />Please enter link without "http://" prefix.</td>
      </tr>
      <tr>
        <td class="heading"><form action="" method="post" enctype="multipart/form-data"  onsubmit="return validate_header_rightside_ads_form(this);"><table width="100%"  border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
          <tr>
            <td colspan="2"><input type="button" name="Cancel" value="Cancel" onclick="window.location.href='manage_splcat.php';"></td>
          </tr>
		   
          <tr>
            <td width="34%">Right Panel Ads </td>
            <td width="66%">&nbsp;</td>
          </tr>
          <tr>
            <td><span class="normaltext">&nbsp;- Ad 1 *</span><br /><input type="button" value="Delete" name="Delete" onClick="return del_fs_ads('<?php echo $category_id;?>','1');" /></td>
            <td>
			<hr />
			<input type="file" name="rightside_ad1" />
			<?php
			$BannerData = $DBObject->getRightPanelSPLCATBanners($category_id,1);
			$rightside_image_file_name_1 = "rightside_ad_1";
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/BRightSide/SPLCAT/";
			$flag_ad_rightside_1 = 0;
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_1."_".$category_id.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  $flag_ad_rightside_1 = 1;
			  $rightside_image_file_full_path_name_1 = SITE_HOSTNAME."/".SITE_FOLDERNAME."/BnrImages/BRightSide/SPLCAT/".$rightside_image_file_name_1."_".$category_id.".".$allowed_file_exts[$i];
			  }
			}
			
			if($flag_ad_rightside_1==0){
			$rightside_image_file_full_path_name_1 = SITE_HOSTNAME.SITE_FOLDERNAME."/images/noimage.gif";
			}
			?>
			<img src="<?php echo $rightside_image_file_full_path_name_1;?>" width="160" height="170" /><br />
			<input name="bannerlink1" type="text" size="20" value="<?php echo $BannerData->link;?>" /> <span class="normaltext"><b>Link *</b></span>
			</td>
          </tr>
          <tr>
            <td><span class="normaltext">&nbsp;- Ad 2 * </span><br /><input type="button" value="Delete" name="Delete" value="Delete" name="Delete" onClick="return del_fs_ads('<?php echo $category_id;?>','2');" /></td>
            <td>
			<hr />
			<input type="file" name="rightside_ad2" />
			<?php
			$BannerData = $DBObject->getRightPanelSPLCATBanners($category_id,2);
			$rightside_image_file_name_2 = "rightside_ad_2";
			$flag_ad_rightside_2 = 0;
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_2."_".$category_id.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  $flag_ad_rightside_2 = 1;
			  $rightside_image_file_full_path_name_2 = SITE_HOSTNAME."/".SITE_FOLDERNAME."/BnrImages/BRightSide/SPLCAT/".$rightside_image_file_name_2."_".$category_id.".".$allowed_file_exts[$i];
			  }
			}
			
			if($flag_ad_rightside_2==0){
			$rightside_image_file_full_path_name_2 = SITE_HOSTNAME.SITE_FOLDERNAME."/images/noimage.gif";
			}
			?>
			<img src="<?php echo $rightside_image_file_full_path_name_2;?>" width="160" height="170" /><br />
			<input name="bannerlink2" type="text" size="20" value="<?php echo $BannerData->link;?>" /> <span class="normaltext"><b>Link *</b></span>
			</td>
          </tr>
          <tr>
            <td><span class="normaltext">&nbsp;- Ad 3 * </span><br /><input type="button" value="Delete" name="Delete" onClick="return del_fs_ads('<?php echo $category_id;?>','3');" /></td>
            <td>
			<hr />
			<input type="file" name="rightside_ad3" />
			<?php
			$BannerData = $DBObject->getRightPanelSPLCATBanners($category_id,3);
			$rightside_image_file_name_3 = "rightside_ad_3";
			$flag_ad_rightside_3 = 0;
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_3."_".$category_id.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  $flag_ad_rightside_3 = 1;
			  $rightside_image_file_full_path_name_3 = SITE_HOSTNAME."/".SITE_FOLDERNAME."/BnrImages/BRightSide/SPLCAT/".$rightside_image_file_name_3."_".$category_id.".".$allowed_file_exts[$i];
			  }
			}
			
			if($flag_ad_rightside_3==0){
			$rightside_image_file_full_path_name_3 = SITE_HOSTNAME.SITE_FOLDERNAME."/images/noimage.gif";
			}
			?>
			<img src="<?php echo $rightside_image_file_full_path_name_3;?>" width="160" height="170" /><br />
			<input name="bannerlink3" type="text" size="20" value="<?php echo $BannerData->link;?>" /> <span class="normaltext"><b>Link *</b></span>
			</td>
          </tr>
          <tr>
            <td><span class="normaltext">&nbsp;- Ad 4 * </span><br /><input type="button" value="Delete" name="Delete" onClick="return del_fs_ads('<?php echo $category_id;?>','4');" /></td>
            <td>
			<hr />
			<input type="file" name="rightside_ad4" />
			<?php
			$BannerData = $DBObject->getRightPanelSPLCATBanners($category_id,4);
			$rightside_image_file_name_4 = "rightside_ad_4";
			$flag_ad_rightside_4 = 0;
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name_4."_".$category_id.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  $flag_ad_rightside_4 = 1;
			  $rightside_image_file_full_path_name_4 = SITE_HOSTNAME."/".SITE_FOLDERNAME."/BnrImages/BRightSide/SPLCAT/".$rightside_image_file_name_4."_".$category_id.".".$allowed_file_exts[$i];
			  }
			}
			
			if($flag_ad_rightside_4==0){
			$rightside_image_file_full_path_name_4 = SITE_HOSTNAME.SITE_FOLDERNAME."/images/noimage.gif";
			}
			?>
			<img src="<?php echo $rightside_image_file_full_path_name_4;?>" width="160" height="170" /><br />
			<input name="bannerlink4" type="text" size="20" value="<?php echo $BannerData->link;?>" /> <span class="normaltext"><b>Link *</b></span>
			</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <div align="center">
				<input type="hidden" name="categoryid" value="<?php echo $catid;?>">
				<input type="hidden" name="IsSubmit" value="1">
                <input type="submit" name="Submit" value="Submit">
	            <input type="button" name="Cancel" value="Cancel" onclick="window.location.href='manage_splcat.php';">
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