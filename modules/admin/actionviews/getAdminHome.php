<?php
// OPENTADKA FRAMEWORK		http://www.opentadka.org
?>
<h2>User Administration</h2><hr /><br />
<table width="100%" border="0" bgcolor="#CC9933">
  <tr>
    <td width="50%" bgcolor="#CCCC66"><a href="<?php echo MainSystem::URLCreator('admin/getUserDetails/');?>">Edit Your Details </a></td>
    <td width="50%" bgcolor="#CCCC66"><a href="<?php echo MainSystem::URLCreator('user/addNewUser/');?>">Add New User </td>
  </tr>
  <tr>
    <td bgcolor="#CCCC66">&nbsp;</td>
    <td bgcolor="#CCCC66">&nbsp;</td>
  </tr>
</table>

<br /><h2>CMS Administration</h2><hr /><br />

<table width="100%" border="0" bgcolor="#CC9933">
  <tr>
    <td width="50%" bgcolor="#CCCC66"><a href="<?php echo MainSystem::URLCreator('cms/addNewPage/');?>">Add a New Page </a></td>
    <td width="50%" bgcolor="#CCCC66"><a href="<?php echo MainSystem::URLCreator('cms/managePages/');?>">Manage Pages </td>
  </tr>
  <tr>
    <td bgcolor="#CCCC66"><a href="<?php echo MainSystem::URLCreator('cms/addNewMenu/');?>">Add a Menu </a></td>
    <td bgcolor="#CCCC66"><a href="<?php echo MainSystem::URLCreator('cms/manageMenus/');?>">Manage Menus </a></td>
  </tr>
</table>

<a name="links_administration"><br /><h2>Links Administration</h2><hr /><br /></a>
<table width="100%" border="0" bgcolor="#CC9933">
  <tr>
    <td width="50%" bgcolor="#CCCC66"><a href="<?php echo MainSystem::URLCreator('links/addNewLink/');?>">Add a New Link </a></td>
    <td width="50%" bgcolor="#CCCC66"><a href="<?php echo MainSystem::URLCreator('links/manageLinks/');?>">Manage Links </a></td>
  </tr>
</table>