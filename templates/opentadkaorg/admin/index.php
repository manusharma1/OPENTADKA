<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title><?php echo $title_placeholder;?></title>

<style type="text/css">
@import url(<?php echo _TEMPLATE_CSS_DIR._WS ;?>style.css);
</style>

<META name="description" content="<?php echo $meta_description_placeholder;?>" />
<META name="keywords" content="<?php echo $meta_keywords_placeholder;?>" />

<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
}
.style4 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
-->
</style>

<?php MainSystem::IncludeModulesCSS(); ?>
<?php MainSystem::IncludeBlocksCSS(); ?>

<?php MainSystem::IncludeModulesJS(); ?>
<?php MainSystem::IncludeBlocksJS(); ?>

<?php MainSystem::IncludeMainJSFunctions(); ?>
<?php MainSystem::IncludeMainAjaxFunctions(); ?>

</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" bgcolor="#333030">
      <tr>
        <td width="12%" valign="top"><img src="<?php echo _TEMPLATE_IMG_DIR._WS ;?>opentadkalogo.gif" alt="open tadka framework" /></td>
        <td width="88%" valign="top"><table width="100%" border="0">
          <tr>
            <td><h1 class="whitetext">OPENTADKA<sup><font size="2">TM</font></sup> FRAMEWORK <br />
An Open Source Framework written in PHP</h1></td>
          </tr>

        </table>           </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td>
		<?php echo $opentadka_header_navigation_placeholder; ?>
		<br>
		<br>
		<?php echo $session_message_placeholder; ?>
		<?php echo $login_box_placeholder; ?>
		<?php echo $main_content_placeholder; ?>
		<br>
		<br>
		<br>
		<?php echo $opentadka_footer_navigation_placeholder; ?>
		<br>
		<br>
		</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#000000" height="97"><table width="100%" height="97" border="0" bgcolor="#000000">
        <tr>
          <td width="5%"><a href="http://www.open.org.in"><img src="<?php echo _TEMPLATE_IMG_DIR._WS ;?>open_org_logo_small.gif" alt="Open.Org.In" border="0" /></a></td>
          <td width="95%" valign="top" class="whitetext"><table width="100%" border="0">
              <tr>
                <td><h3 class="whitetextbold">Open Source India<br />
                (open.org.in)</h3></td>
              </tr>
              <tr>
                <td>Copyright &copy; 2010 onwards, Manu Sharma [For Copyright and Licences, Please refer to the <a href="<?php echo MainSystem::URLCreator('cms/getContent/6/'); ?>">Licence</a>]</td>
              </tr>
              <tr>
                <td>Powered by OPENTADKA CMS</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
