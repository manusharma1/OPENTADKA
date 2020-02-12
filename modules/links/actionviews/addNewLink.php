<?php
$linkdetails_placeholder = MainSystem::HTMLEditorInit('linkdetails');
?>

<form id="addnewlink" name="addnewlink" method="post" action="<?php echo MainSystem::URLCreator('links/saveLink/') ?>" onsubmit="return JSMainFunction();">
<table width="100%" border="0" bgcolor="#CC9933">
  <tr>
    <td width="17%" bgcolor="#CCCC66">Link Title </td>
    <td width="83%" bgcolor="#CCCC66"><input type="text" name="linktitle" id="linktitle" size="95" title="Link Title" /></td>
  </tr>
   <tr>
    <td bgcolor="#CCCC66">Link Value </td>
    <td bgcolor="#CCCC66"><input type="text" name="linkvalue" id="linkvalue" size="95" title="Link Value" /></td>
  </tr>

   <tr>
    <td bgcolor="#CCCC66">Link Details </td>
    <td bgcolor="#CCCC66"><?php echo $linkdetails_placeholder; ?></td>
  </tr>

  <tr>
    <td colspan="2" bgcolor="#CCCC66" align="center"><input type="Submit" name="Submit" value="Add New Link" /></td>
  </tr>

</table>
</form>

<?php
$HTMLObj = new MainHTML();
$htmlarray = array();

$htmlarray[]['js']['js'] = 'notempty=linktitle,linkvalue:onsubmit=addnewlink:alert:default';
$validation = $HTMLObj->HTMLCreator($htmlarray);

echo $validation;
?>