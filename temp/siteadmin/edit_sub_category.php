<?php
include("include.php");
$DBObject = new DBfunctions();
$seclink = new SECfunctions();

global $allowed_file_exts;

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){

	$seclink = new SECfunctions();
	$catname = $seclink->escape_protection($_POST['catname']);
	$catid = $_POST['catid'];
	$pid = $_POST['catparent'];

	// UPLOAD CATEGORY IMAGE

	if($_FILES["categoryimg"]["name"]){

// Delete the existing related images //

			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/SiteImages/";
			$category_img_image_file_name = "category_img"."_".$catid;
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$category_img_image_file_name.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  @unlink($file_exists);
			  }
			}
			
// Delete the existing related images //


	$extension = explode(".",$_FILES["categoryimg"]["name"]);
	$ext_type = end($extension);

	if(in_array($ext_type,$allowed_file_exts)){

	$finalfilename = "category_img"."_".$catid.".". $ext_type;

	$target_path = SITE_DOCUMENTROOT."/".SITE_FOLDERNAME."/SiteImages/";

	$target_path = $target_path . $finalfilename; 

	if(move_uploaded_file($_FILES['categoryimg']['tmp_name'], $target_path)) {
		$output .= "The file ".  basename( $_FILES['header_ad1']['name']). 
		" has been uploaded as ".$finalfilename ."<br />";

	$dbresult = $DBObject->UpdateCatImage($catid,$finalfilename); // Update Database
	$image_error = 0;
	} else{
		$output .= "There was an error uploading the Sub Category file: ".basename( $_FILES['header_ad1']['name']).", please try again! <br />";
	$image_error = 1;
	}

	}else{ // if not the correct file type

	$output .= "The file type for Sub Category file: ".basename( $_FILES['header_ad1']['name'])." is invalid, please try again!, Please upload only 'jpg' , 'gif' , 'png', 'jpeg' or 'bmp' files. <br />";
	$image_error = 1;
	}


	} // if
	
	$dbresult = $DBObject->EditSubCat($catname,$catid,$pid);
	
			if($dbresult==1 && $image_error==0){
			$_SESSION['message'] = "Category Edited  ".$output;
			header("Location:edit_sub_category.php?id=".$catid);
			}else{
			$_SESSION['message'] = $output;
			header("Location:edit_sub_category.php?id=".$catid);
		}

}


if(!isset($_GET['id']) || $_GET['id'] == ""){
$_SESSION['message'] = "Site Error";
header("Location:manage_categories.php");
}else{
$catid = $_GET['id'];
$DBObject->setCat($catid);

	if($DBObject->checkCatExistance()==0){
	$_SESSION['message'] = "Site Error";
	header("Location:manage_categories.php");
	}else{
		$resultset = $DBObject->editCatContent();
			if($resultset == 0){
			$_SESSION['message'] = "Site Error";
			header("Location:manage_categories.php");
			}
	}
$catparent = $DBObject->getCatParent($catid);
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

	<?php
	if(isset($_SESSION['message']) && $_SESSION['message'] !=""){
	?>
	<p class="redtext" align="center"><?php echo $_SESSION['message']; ?></p>
	<?php
	if(!isset($_POST['Submit'])){
	$_SESSION['message'] = "";
	}
	}
	?>

<table width="100%"  border="1" cellpadding="4" cellspacing="4" bgcolor="#6666CC">
  <tr>
    <td class="heading">&nbsp;CMS &gt; EDIT SUB CATEGORY </td>
  </tr>
	  <tr>
        <td class="headinglightorange">* - Required</td>
      </tr>
  <tr>
    <td valign="top">
	
	<form name="addnewpage" method="post" action="" enctype="multipart/form-data" onsubmit="return validate_form_add_cat(this);">
      <table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="20%">&nbsp;</td>
          <td width="80%">            
              <div align="right">
                <input type="submit" name="Submit" value="Edit">
                <input type="button" name="Cancel" value="Cancel" onclick="window.location.href='manage_sub_categories.php?pid=<?php echo $catparent;?>';">
              </div></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Sub Category Name * </td>
          <td><input name="catname" type="text" size="60" value="<?php echo $seclink->escape_protection_decode($resultset->name); ?>"></td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="normaltext">&nbsp;Parent *</td>
          <td><select name="catparent">
            <?php
			$parentobject = $DBObject->getAllCatParents(0);
			while ($resultobj = $parentobject->fetch_object()) {
			if($resultobj->id == $resultset->pid){
			$optvalselect = "SELECTED";
			}else{
			$optvalselect = "";
			}
			?>
            <option value="<?php echo $resultobj->id; ?>" <?php echo $optvalselect;?> ><?php echo $resultobj->name; ?></option>
            <?php
			}
			?>
          </select></td>
        </tr>

<tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
		
		<tr>
          <td class="normaltext">&nbsp;Category Image </td>
                      <td>
			<input type="file" name="categoryimg" />
			<?php
			$directory_path = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/SiteImages/";
			$category_img_image_file_name = "category_img"."_".$catid;
			$flag_cat_img = 0;
			
			for($i=0; $i<count($allowed_file_exts); $i++){
			  $file_exists = $directory_path.$category_img_image_file_name.".".$allowed_file_exts[$i];
			  if(file_exists($file_exists)){
			  $flag_cat_img = 1;
			  $category_img_image_file_full_path_name = SITE_HOSTNAME."/".SITE_FOLDERNAME."/SiteImages/".$category_img_image_file_name.".".$allowed_file_exts[$i];
			  }
			}
			
			if($flag_cat_img==0){
			$category_img_image_file_full_path_name = SITE_DOCUMENTROOT.SITE_FOLDERNAME."/images/noimage.gif";
			}
			?>
			<img src="<?php echo $category_img_image_file_full_path_name;?>" width="150" height="109" />
			</td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
		  <input type="hidden" name="IsSubmit" value="1">
		  <input type="hidden" name="catid" value="<?php echo $resultset->id; ?>">
		  <input type="submit" name="Submit" value="Edit">
            <input type="button" name="Cancel" value="Cancel" onclick="window.location.href='manage_sub_categories.php?pid=<?php echo $catparent;?>';">
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
