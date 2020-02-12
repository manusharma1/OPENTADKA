<?php
include("include.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Open Source India</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	
    <script type='text/javascript' src='js/jquery.min.js'></script>
    <script type='text/javascript' src='js/infogrid.js'></script>   
    
</head>

<body>

    <div id="top-wrap">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td width="53"><img src="images/logo.jpg" width="53" height="97" style="margin-top:30px;" /></td>
          <td width="242"  style="background:url(images/bg1.jpg) no-repeat; height:143px;"></td>
          <td><table width="100" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="110">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="125" height="34"><a href="#"><img src="images/openorgin.gif" width="125" height="34" border="0"/></a></td>
              <td width="5">&nbsp;</td>
              <td width="196"><a href="#"><img src="images/submityourproject.gif" width="196" height="34" border="0"/></a></td>
              <td width="5">&nbsp;</td>
              <td width="106"><a href="#"><img src="images/contact.gif" width="106" height="34" border="0"/></a></td>
            </tr>
          </table></td>
          <td><img src="images/dol.gif" width="83" height="137" /></td>
        </tr>
      </table>
    </div>
<div id="page-wrap">
      <div class="info-col">
        <h2>Web Technologies <hr /> Web Applications</h2>
        <a class="image flower1" href="#">View Image</a>
        <dl>
         <?php
		 echo $DBObjectF->showCatPagesandLinks(1);
		 ?>
        </dl>
      </div>
	  <div class="info-col">
        <h2>Operating Systems<hr />Softwares</h2>
	    <a class="image flower2" href="#">View Image</a>
        <dl>
         <?php
		 echo $DBObjectF->showCatPagesandLinks(2);
		 ?>
        </dl>
      </div>
	  <div class="info-col">
        <h2>News<hr />Events</h2>
	    <a class="image flower3" href="#">View Image</a>
        <dl>
         <?php
		 echo $DBObjectF->showCatPagesandLinks(3);
		 ?>
        </dl>
      </div>
	  <div class="info-col">
        <h2>Showcase of Projects<hr />Show Your Websites</h2>
	    <a class="image flower4" href="#">View Image</a>
        <dl>
         <?php
		 echo $DBObjectF->showCatPagesandLinks(4);
		 ?>
         </dl>
      </div>
	  
	  <div class="info-col">
        <h2>General <hr />Others</h2>
	    <a class="image flower5" href="#">View Image</a>
        <dl>
         <?php
		 echo $DBObjectF->showCatPagesandLinks(5);
		 ?>
        </dl>
      </div>
</div>
	<div id="bottom-wrap" >sdfasd fsdf sadf sdf sdaf</div>

</body>

</html>