<?php
include("include.php");
$DBObject = new DBfunctions();
$DBObject->setCat($_SESSION['catdelid']);
$pid = $DBObject->getCatParent($_SESSION['catdelid']);
$DBObject->CatDelete();

// Added - Delete Category Image too.

	global $allowed_file_exts;
	$category_img_image_file_name = "category_img"."_".$_SESSION['catdelid'];
	$target_path = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/SiteImages/";

			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $target_path.$category_img_image_file_name.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  $flag_ad_rightside = 1;
			  $category_img_image_file_full_path_name = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/SiteImages/".$category_img_image_file_name.".".$allowed_file_exts[$i];
			  }
			}
if(is_file($category_img_image_file_full_path_name)){
@unlink($category_img_image_file_full_path_name);
}
// Added - Delete Category Ads Image too.
		
			$target_path = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/BnrImages/BRightSide/";
			
			for($jj=1;$jj<=4;$jj++){

			$rightside_image_file_name = "rightside_ad"."_".$jj."_".$_SESSION['catdelid'];
			$flag_ad_rightside = 0;
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $target_path.$rightside_image_file_name.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  $flag_ad_rightside = 1;
			  $rightside_image_file_full_path_name = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/BnrImages/BRightSide/".$rightside_image_file_name.".".$allowed_file_exts[$i];
			  }
			}
			
			if(is_file($rightside_image_file_full_path_name)){
			@unlink($rightside_image_file_full_path_name);
			}
	}

// Delete Banners Details from DB
$DBObject->CatBannersDelete();

$_SESSION['catdelid'] = "";
if($pid != "0"){
header("Location:manage_sub_categories.php?pid=".$pid);
}else{
header("Location:manage_categories.php");
}
?>



