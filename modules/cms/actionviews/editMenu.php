<?php
	$id = _ACTION_VIEW_PARAMETER_ID;

	// Define PlaceHolders
	$menu_name_placeholder = '';
	$parent_menu_placeholder = '';

	// Get Menu Data
	$columns = array('id','pid','name');
	$conditions = array();
	$conditions['=']['id'] = $id;
	$sqlObj = new MainSQL();
	$sqlmenucontents = $sqlObj->SQLCreator('S', 'menu', $columns, $conditions, '', '', '');
	if($resultmenucontents = $sqlObj->FireSQL($sqlmenucontents)){
	if($sqlObj->getNumRows($resultmenucontents) !=0){ // If Menu Exists
	if($resultsetmenucontents = $sqlObj->FetchResult($resultmenucontents)){

	$menu_name_placeholder = $sqlObj->getCleanData($resultsetmenucontents->name);
	
	}else{
	trigger_error('Data Fetch Error');
	}
	}else{ // if Menu Doesn't Exists
	$_SESSION['message'] = 'Menu Does Not Exists';
	MainSystem::URLForwarder(MainSystem::URLCreator('cms/getAdminArea/'));
	}
	}else{
	trigger_error('SQL Error');
	}
	
	// Create Parent Menu and Get Parent Menu Data

	$columns = array('id','name');
	$conditions = array();
	$conditions['=']['pid'] = 0;
	$conditions['AND =']['isactive'] = '1';
	$sqlObj = new MainSQL();
	$sqlmenu = $sqlObj->SQLCreator('S', 'menu', $columns, $conditions, '', '', '');
		
	$HTMLObj = new MainHTML();
	$htmlarray = array();
	$htmlarray[]['select']['name'] = 'pid';
	$htmlarray[]['select']['close'] = '';

	$htmlarray[]['option']['start'] = '';
	$htmlarray[]['option']['value'] = 0;
	$htmlarray[]['option']['close'] = '';
	$htmlarray[]['option']['data'] = '------------------';
	$htmlarray[]['option']['end'] = '';


	if($resultmenu = $sqlObj->FireSQL($sqlmenu)){
	while($resultsetmenu = $sqlObj->FetchResult($resultmenu)){

	$htmlarray[]['option']['start'] = '';
	$htmlarray[]['option']['value'] = $resultsetmenu->id;
	($resultsetmenu->id == $resultsetmenucontents->pid)?$htmlarray[]['option']['nonattribute'] = 'SELECTED':'';
	$htmlarray[]['option']['close'] = '';
	$htmlarray[]['option']['data'] = $sqlObj->getCleanData($resultsetmenu->name);
	$htmlarray[]['option']['end'] = '';

	}
	
	}

	$htmlarray[]['select']['end'] = '';

	$parent_menu_placeholder = $HTMLObj->HTMLCreator($htmlarray);

?>



<form id="editmenu" name="editmenu" method="post" action="<?php echo MainSystem::URLCreator('cms/saveMenu/'.$id.'/') ?>">
<table width="100%" border="0" bgcolor="#CC9933">
  <tr>
    <td width="17%" bgcolor="#CCCC66">Menu Name </td>
    <td width="83%" bgcolor="#CCCC66"><input type="text" name="name" size="95" value="<?php echo $menu_name_placeholder; ?>" /></td>
  </tr>
  <tr>
  <td width="17%" bgcolor="#CCCC66">Parent Menu </td>
    <td width="83%" bgcolor="#CCCC66"><?php echo $parent_menu_placeholder; ?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCC66" align="center"><input type="Submit" name="Submit" value="Save Menu" /></td>
  </tr>

</table>
</form>