<?php
include("include.php");
$DBObject = new DBfunctions();
$seclink = new SECfunctions();

// Pagination Init()
$PGObject = new Paginationfunctions();

global $pagination_num_limit;
global $pagination_num_limit_cat;

	$DT_PGBREAK = $_GET['pg'];

	if($DT_PGBREAK == "" || $DT_PGBREAK == 0 || !is_numeric($DT_PGBREAK)){
	$DT_PGBREAK = 1;
	}

    $DT_END = $DT_PGBREAK*$pagination_num_limit;
	$DT_START = $DT_END-$pagination_num_limit;
	
// Pagination

		if(isset($_GET['what']) && $_GET['what']!='What'){
		$what = rtrim(ltrim($seclink->escape_protection($_GET['what'])));
		}else{
		$what = "";
		}

		if(isset($_GET['where']) && $_GET['where']!='Where'){
		$where = rtrim(ltrim($seclink->escape_protection($_GET['where'])));
		}else{
		$where = "";
		}

		if(isset($_GET['who']) && $_GET['who']!='Who'){
		$who = rtrim(ltrim($seclink->escape_protection($_GET['who'])));
		}else{
		$who = "";
		}

		$page_url = "admin_search.php?what=".$what."&where=".$where."&who=".$who;

		$SearchLinkResult = $DBObject->getSearchData($DT_START,$pagination_num_limit,$what,$where,$who);
		$SearchLinkCount = $DBObject->getSearchCount($what,$where,$who);

		$PaginationData = $PGObject->PrintPagination($SearchLinkCount,$pagination_num_limit_cat,$DT_PGBREAK,$page_url,'pagingselected');

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
    <td height="11">
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#E2E5E9" height="450"><?php include("admin_left_menu.php");?></td>
    <td width="1" valign="top" bgcolor="#A7B0BC"></td>
    <td align="left" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><form name="sitesearch" method="get" action="">
              <table width="100%" border="0" cellspacing="4" cellpadding="4">
                <tr>
                  <td colspan="2" class="heading">SEARCH</td>
                </tr>
                <tr>
                  <td width="27%" class="normaltext">CATEGORY / SUBCATEGORY </td>
                  <td width="73%"><label>
                    <input type="text" name="what">
                  </label></td>
                </tr>
                <tr>
                  <td class="normaltext">COMPANY NAME </td>
                  <td><input type="text" name="who"></td>
                </tr>
                <tr>
                  <td class="normaltext">LOCATION</td>
                  <td><input type="text" name="where"></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><label>
                    <input type="submit" name="Submit" value="Submit">
                  </label></td>
                </tr>
              </table>
                        </form>
			  <hr />

			<?php
			$num_records = mysqli_num_rows($SearchLinkResult);
			if($num_records>0){
			?>

            <p class="normaltext"><strong>Total Results: <?php echo $SearchLinkCount;?></strong></p>
              <table width="100%" border="1" cellspacing="4" cellpadding="4">
                <tr>
                  <td width="20%" class="heading">Company Name </td>
                  <td width="20%" class="heading">Department</td>
                  <td width="10%" class="heading">Website</td>
                  <td width="10%" class="heading">Email</td>
                  <td width="5%" class="heading">Package</td>
                  <td width="5%" class="heading">Status</td>
                </tr>
                <?php
		while($SearchLinkData = mysqli_fetch_object($SearchLinkResult)){
		$sql_cat ="SELECT id,pid,name FROM categories WHERE id='".$SearchLinkData->subcatid."'";
		if ($result_cat = $mysqli->query($sql_cat)) {
		$DataCat = mysqli_fetch_object($result_cat);
		$cat_string = '<a href = "manage_categories.php" class="texfontlgray">CATEGORIES</a> ';
		if($DataCat->pid !=0){
		$sql_cat2 ="SELECT id,pid,name FROM categories WHERE id='".$DataCat->pid."'";
		if ($result_cat2 = $mysqli->query($sql_cat2)) {
		$DataCat2 = mysqli_fetch_object($result_cat2);
		$cat_string .= ' > '.'<a href = "manage_sub_categories.php?pid='.$DataCat->pid.'">'.$DataCat2->name.'</a>';
		}
		}
		$cat_string .= ' > '.'<a href = "manage_sub_category_links.php?id='.$DataCat->id.'">'.$DataCat->name.'</a>';
		}
		
		?>
                <tr>
                  <td class="normaltext"><?php echo $seclink->escape_protection_decode($SearchLinkData->company_name);?></td>
                  <td class="normaltext"><?php echo $cat_string;?></td>
                  <td class="normaltext"><?php echo $seclink->escape_protection_decode($SearchLinkData->company_website);?></td>
                  <td class="normaltext"><?php echo $seclink->escape_protection_decode($SearchLinkData->company_email);?></td>
                  <td class="normaltext"><?php echo ($seclink->escape_protection_decode($SearchLinkData->package)==1)?'Plan 1': 'Plan 2';?></td>
                  <td class="normaltext"><?php echo ($seclink->escape_protection_decode($SearchLinkData->isactive)==1)?'Active':'Inactive';?></td>
                </tr>
                <?php
		}
		// Pagination logic starts here //
		echo $PaginationData;
		
		}
		?>
            </table></td>
          </tr>
        </table>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
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
