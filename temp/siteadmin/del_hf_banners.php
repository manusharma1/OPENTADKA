<?php
include("include.php");

$DBObject = new DBfunctions();

$output = "";
global $allowed_file_exts;

// Delete Ads

if(isset($_GET['num'])){

$adnumber = $_GET['num'];
$imgnumber = $adnumber-1;
if($adnumber == "1"){
$image_file_name = "header_ad";
$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/bHeader/";
}else{
$image_file_name = "footer_ad"."_".$imgnumber;
$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/bFooter/";
}
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$image_file_name.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  @unlink($file_exists);
			  }
			}
$dbresult = $DBObject->DeleteHFBanners($adnumber);
if($dbresult == 1){
$_SESSION['msg'] = "Banner Deleted";
}else{
$_SESSION['msg'] = "Site Error";
}
header("Location:manage_header_footer_ads.php");
}else{
$_SESSION['msg'] = "Site Error";
header("Location:manage_header_footer_ads.php");
}
?>
