<?php
include("include.php");

$DBObject = new DBfunctions();

$output = "";
global $allowed_file_exts;

// Delete Ads

if(isset($_GET['id']) && isset($_GET['num'])){

$catid = $_GET['id'];
$adnumber = $_GET['num'];

			$rightside_image_file_name = "rightside_ad"."_".$adnumber;
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/BnrImages/BRightSide/";
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$rightside_image_file_name."_".$catid.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  @unlink($file_exists);
			  }
			}
$dbresult = $DBObject->DeleteCatBanners($catid,$adnumber);
if($dbresult == 1){
$_SESSION['msg'] = "Banner Deleted";
}else{
$_SESSION['msg'] = "Site Error";
}

header("Location:edit_category_banners.php?id=".$catid);
}else{
header("Location:manage_categories.php");
}
?>
