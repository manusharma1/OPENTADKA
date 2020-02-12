<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title><?php echo $title_placeholder;?></title>

<META name="description" content="<?php echo $meta_description_placeholder;?>" />
<META name="keywords" content="<?php echo $meta_keywords_placeholder;?>" />

<style type="text/css">
@import url(<?php echo _TEMPLATE_CSS_DIR._WS ;?>style.css);
</style>

<script type='text/javascript' src='<?php echo _TEMPLATE_JS_DIR._WS ;?>jquery-1.7.2.min.js'></script>

<!-- thumbnail scroller stylesheet -->
<link href="<?php echo _TEMPLATE_CSS_DIR._WS ;?>jquery.thumbnailScroller.css" rel="stylesheet" />

<!-- jquery ui custom build (for animation easing) -->
<script src="<?php echo _TEMPLATE_JS_DIR._WS ;?>jquery-ui-1.8.13.custom.min.js"></script>

<!-- thumbnailScroller script -->
<script src="<?php echo _TEMPLATE_JS_DIR._WS ;?>jquery.thumbnailScroller.js"></script>

<!-- Older IE stylesheet, to reposition navigation arrows, added AFTER the theme stylesheet -->
<!--[if lte IE 7]>
<link rel="stylesheet" href="<?php echo _TEMPLATE_CSS_DIR._WS ;?>anythingslider-ie.css" type="text/css" media="screen" />
<![endif]-->

</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" bgcolor="#333030">
      <tr>
        <td width="12%" valign="top"><img src="<?php echo _TEMPLATE_IMG_DIR._WS ;?>opentadkalogo.gif" alt="open tadka framework"/></td>
        <td width="88%" valign="top"><table width="100%" border="0">
          <tr>
            <td><h1 class="whitetext">OPENTADKA<sup><font size="2">TM</font></sup> FRAMEWORK <br />
An Open Source Framework written in PHP</h1></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" bgcolor="#999999">
              <tr>
                <td width="20%" bgcolor="#CCCCCC"><div align="center"><a href="http://www.opentadka.org/"><span class="style4">Home</span></a></div></td>
                <td width="20%" bgcolor="#CCCCCC"><div align="center"><a href="<?php echo MainSystem::URLCreator('cms/getContent/2/'); ?>"><span class="style4">Downloads</span></a></div></td>
                <td width="20%" bgcolor="#CCCCCC"><div align="center"><a href="<?php echo MainSystem::URLCreator('cms/getContent/3/'); ?>"><span class="style4">Documentation</span></a></div></td>
                <td width="20%" bgcolor="#CCCCCC"><div align="center"><a href="<?php echo MainSystem::URLCreator('cms/getContent/4/'); ?>"><span class="style4">Support</span></a></div></td>
                <td width="20%" bgcolor="#CCCCCC"><div align="center"><a href="<?php echo MainSystem::URLCreator('cms/getContent/5/'); ?>"><span class="style4">Contact</span></a></div></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td>
		<?php
		if($pageid=='1'){
		?>
		<h2>Who is using OPENTADKA Framework? (Latest Websites and Applications)</h2><hr />
		<div align="center"><?php echo $contentslider_page_placeholder; ?></div>
		<br />
		<?php	
		}
		?>
		<?php echo $main_content_placeholder; ?><br />
		</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#000000"><table width="100%" border="0">
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
