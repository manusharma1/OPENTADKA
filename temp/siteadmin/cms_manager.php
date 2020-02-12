<?php
include("include.php");
$DBObject = new DBfunctions();
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
	<?php
	if(isset($_SESSION['message']) && $_SESSION['message'] !=""){
	?>
	<p class="redtext"><?php echo $_SESSION['message']; ?></p>
<?php
	if(!isset($_POST['Submit'])){
	$_SESSION['message'] = "";
	}
	}
	?>
	<table width="100%"  border="0" cellspacing="4" cellpadding="4">
      <tr>
        <td><table width="100%"  border="0" cellspacing="0" cellpadding="2">
          <tr bgcolor="#FFFFFF">
            <td width="30" valign="top"></td>
            <td width="30%" align="left" valign="top"><a href="manage_categories.php"><img src="images/manage.jpg" width="128" height="112" border="0"></a></td>
            <td width="30%" align="left" valign="top"><a href="add_new_category.php"><img src="images/add_pages.jpg" width="128" height="111" border="0"></a></td>
            <td width="30%" valign="top">&nbsp;</td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td height="40" valign="top"></td>
            <td width="30%" align="left" valign="middle" ><a href="manage_categories.php" class="small"><strong>Manage Categories<br> 
              (Departments) </strong></a></td>
            <td width="30%" align="left" valign="middle" ><a href="add_new_category.php" class="small"><strong>Add New Category<br>
              (Department</strong></a>)</td>
            <td width="30%" valign="middle" >&nbsp;</td>
          </tr>
          <tr bgcolor="#FFEECC">
            <td width="30" valign="top"></td>
            <td width="30%" align="left" valign="top"><a href="manage_free_stuff.php"><img src="images/manage.jpg" width="128" height="112" border="0"></a></td>
            <td width="30%" align="left" valign="top"><a href="add_new_freestuff.php"><img src="images/add_pages(website)2.jpg" width="128" height="112" border="0"></a></td>
            <td width="30%" valign="top"><a href="add_new_freestuff_entry.php"><img src="images/addsub_pages(website)2.jpg" width="128" height="112" border="0"></a></td>
          </tr>
          <tr bgcolor="#FFEECC">
            <td height="40" valign="top"></td>
            <td width="30%" align="left" valign="middle" ><a href="manage_free_stuff.php" class="small"><strong>Manage Free Stuff </strong></a></td>
            <td width="30%" align="left" valign="middle" ><a href="add_new_freestuff.php" class="small"><strong>Add Free Stuff </strong></a></td>
            <td width="30%" valign="middle" ><a href="add_new_freestuff_entry.php" class="small"><strong>Add URL to Free Stuff </strong></a></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td width="30" valign="top"></td>
            <td width="30%" align="left" valign="top"><a href="manage_splcat.php"><img src="images/manage_pages(Special).jpg" width="127" height="109" border="0"></a></td>
            <td width="30%" align="left" valign="top"><a href="add_new_splcat_entry.php"><img src="images/add_page(Special).jpg" width="127" height="109" border="0"></a></td>
            <td width="30%" valign="top">&nbsp;</td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td height="40" valign="top"></td>
            <td width="30%" align="left" valign="middle" ><a href="manage_splcat.php" class="small"><strong>Manage Special <br>
      Categories </strong></a></td>
            <td width="30%" align="left" valign="middle" ><a href="add_new_splcat_entry.php" class="small"><strong>Add URL to Special <br>
      Category </strong></a></td>
            <td width="30%" valign="middle" >&nbsp;</td>
          </tr>
          <tr bgcolor="#F8FFE1">
            <td width="30" valign="top"></td>
            <td width="30%" align="left" valign="top"><a href="manage_header_footer_ads.php"><img src="images/manage_header_footer_ads.jpg" width="127" height="109" border="0"></a></td>
            <td width="30%" align="left" valign="top"><a href="manage_home_rightside_ads.php"><img src="images/manage_right_panel_ads.jpg" width="127" height="109" border="0"></a></td>
            <td width="30%" valign="top">&nbsp;</td>
          </tr>
          <tr bgcolor="#F8FFE1">
            <td height="40" valign="top"></td>
            <td width="30%" align="left" valign="middle" ><a href="manage_header_footer_ads.php" class="small"><strong>Manage Header &amp; Footer Ads </strong></a></td>
            <td width="30%" align="left" valign="middle" ><a href="manage_home_rightside_ads.php" class="small"><strong>Manage Right <br>
      Panel Ads (Home) </strong></a></td>
            <td width="30%" valign="middle" >&nbsp;</td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td width="30" valign="top"></td>
            <td width="30%" align="left" valign="top"><a href="add_new_entry.php"><img src="images/add_new_links.jpg" width="127" height="109" border="0"></a></td>
            <td width="30%" align="left" valign="top"><a href="manage_new_links.php"><img src="images/add_new_links.jpg" width="127" height="109" border="0"></a></td>
            <td width="30%" valign="top">&nbsp;</td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td height="40" valign="top"></td>
            <td width="30%" align="left" valign="middle" ><a href="add_new_entry.php" class="small"><strong>Add New Links </strong></a><a href="manage_home_rightside_ads.php" class="small"><strong><br>
            </strong></a></td>
            <td width="30%" align="left" valign="middle" ><a href="manage_new_links.php" class="small"><strong>Manage New Links </strong></a><a href="manage_siteoftheweek.php" class="small"></a></td>
            <td width="30%" valign="middle" >&nbsp;</td>
          </tr>
          <tr bgcolor="#E1EFFF">
            <td valign="top"></td>
            <td align="left" valign="top"><a href="manage_pages.php"><img src="images/manage.jpg" width="128" height="112" border="0"></a></td>
            <td align="left" valign="top"><a href="manage_siteoftheweek.php"><img src="images/manage_site_of_the_week.jpg" width="127" height="109" border="0"></a></td>
            <td valign="top"><a href="admin_search.php"><img src="images/manage_site_of_the_week.jpg" width="127" height="109" border="0"></a></td>
          </tr>
          <tr bgcolor="#E1EFFF">
            <td height="40" valign="top"></td>
            <td align="left" valign="middle" ><a href="manage_pages.php" class="small"><strong>Manage CMS Pages </strong></a><a href="manage_home_rightside_ads.php" class="small"><strong><br>
            </strong></a></td>
            <td align="left" valign="middle" ><a href="manage_siteoftheweek.php" class="small"><strong>Manage Site of The Week </strong></a></td>
            <td valign="middle" ><a href="admin_search.php" class="small"><strong>Search </strong></a></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td valign="top"></td>
            <td width="30%" align="left" valign="top"><a href="change_user_details.php"><img src="images/change_contact.jpg" width="127" border="0"></a></td>
            <td width="30%" align="left" valign="top"><a href="change_password.php"><img src="images/change_password.jpg" width="127" height="110" border="0"></a></td>
            <td width="30%" valign="top"><a href="logout.php"><img src="images/logout.jpg" width="128" height="112" border="0"></a></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td height="40" valign="top"></td>
            <td width="30%" align="left" valign="middle" ><a href="change_user_details.php" class="small"><strong>Change Contact </strong></a></td>
            <td width="30%" align="left" valign="middle" ><a href="add_new_page.php" class="small"><strong>Change Password</strong></a></td>
            <td width="30%" valign="top"><a href="logout.php" class="small"><strong><br>
      Logout</strong></a></td>
          </tr>
        </table></td>
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
