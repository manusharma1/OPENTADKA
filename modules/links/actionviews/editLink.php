<?php
	$id = _ACTION_VIEW_PARAMETER_ID;
	
	// Define PlaceHolders
	$newstitle_placeholder = '';
	$newstext_placeholder = '';

	// Get News Data
	$columns = array('id','linktitle','linkvalue','linkdetails');
	$conditions = array();
	$conditions['=']['id'] = $id;
	$sqlObj = new MainSQL();
	$sqllinkcontents = $sqlObj->SQLCreator('S', 'links', $columns, $conditions, '', '', '');
	if($resultlinkcontents = $sqlObj->FireSQL($sqllinkcontents)){
	if($sqlObj->getNumRows($resultlinkcontents) !=0){ // If link Exists
	if($resultsetlinkcontents = $sqlObj->FetchResult($resultlinkcontents)){
	
	$linktitle_placeholder = $sqlObj->getCleanData($resultsetlinkcontents->linktitle);
	$linkvalue_placeholder = $sqlObj->getCleanData($resultsetlinkcontents->linkvalue);
	$linkdetails_placeholder = 

	$linkdetails_placeholder = MainSystem::HTMLEditorInit('linkdetails',$sqlObj->getCleanData($resultsetlinkcontents->linkdetails));

	}else{
	trigger_error('Data Fetch Error');
	}
	}else{ // if Page Doesn't Exists
	$_SESSION['message'] = 'Link Does Not Exists';
	MainSystem::URLForwarder(MainSystem::URLCreator('admin/getAdminHome/'));
	}
	}else{
	trigger_error('SQL Error');
	}
?>


<form id="editlink" name="editlink" method="post" action="<?php echo MainSystem::URLCreator('links/saveLink/'.$id.'/') ?>">
<table width="100%" border="0" bgcolor="#CC9933">
  
  <tr>
    <td width="17%" bgcolor="#CCCC66">News Title </td>
    <td width="83%" bgcolor="#CCCC66"><input type="text" name="linktitle" id="linktitle" size="95" title="Link Title" value="<?php echo $linktitle_placeholder; ?>" /></td>
  </tr>
   <tr>
    <td bgcolor="#CCCC66">Link Value </td>
    <td bgcolor="#CCCC66"><input type="text" name="linkvalue" id="linkvalue" size="95" title="Link Value" value="<?php echo $linkvalue_placeholder; ?>" /></td>
  </tr>

   <tr>
    <td bgcolor="#CCCC66">Link Details </td>
    <td bgcolor="#CCCC66"><?php echo $linkdetails_placeholder; ?></td>
  </tr>

  <tr>
    <td colspan="2" bgcolor="#CCCC66" align="center"><input type="Submit" name="Submit" value="Save Link" /></td>
  </tr>

</table>
</form>

<?php
$HTMLObj = new MainHTML();
$htmlarray = array();

$htmlarray[]['js']['js'] = 'notempty=linktitle,linkvalue:onsubmit=editlink:alert:default';
$validation = $HTMLObj->HTMLCreator($htmlarray);

echo $validation;
?>