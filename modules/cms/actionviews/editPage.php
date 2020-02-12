<?php
	$id = _ACTION_VIEW_PARAMETER_ID;
	
	// Define PlaceHolders
	$page_name_placeholder = '';
	$page_title_placeholder = '';
	$menu_placeholder = '';
	$input_data_placeholder = '';
	$meta_keys_placeholder = '';
	$meta_desc_placeholder = '';

	// Get Page Data
	$columns = array('id','pid','menuid','name','title','data','data2','metadesc','metakeys');
	$conditions = array();
	$conditions['=']['id'] = $id;
	$sqlObj = new MainSQL();
	$sqlpagecontents = $sqlObj->SQLCreator('S', 'content', $columns, $conditions, '', '', '');
	if($resultpagecontents = $sqlObj->FireSQL($sqlpagecontents)){
	if($sqlObj->getNumRows($resultpagecontents) !=0){ // If Page Exists
	if($resultsetpagecontents = $sqlObj->FetchResult($resultpagecontents)){
	
	$page_name_placeholder = $sqlObj->getCleanData($resultsetpagecontents->name);
	$page_title_placeholder = $sqlObj->getCleanData($resultsetpagecontents->title);
	$meta_keys_placeholder = $sqlObj->getCleanData($resultsetpagecontents->metakeys);
	$meta_desc_placeholder = $sqlObj->getCleanData($resultsetpagecontents->metadesc);
	
	}else{
	trigger_error('Data Fetch Error');
	}
	}else{ // if Page Doesn't Exists
	$_SESSION['message'] = 'Page Does Not Exists';
	MainSystem::URLForwarder(MainSystem::URLCreator('cms/getAdminArea/'));
	}
	}else{
	trigger_error('SQL Error');
	}
	
	// Create Menu and Get Menu Data

	$columns = array('id','name');
	$conditions = array();
	$conditions['=']['pid'] = 0;
	$conditions['AND =']['isactive'] = '1';
	$sqlObj = new MainSQL();
	$sqlmenu = $sqlObj->SQLCreator('S', 'menu', $columns, $conditions, '', '', '');
		
	$HTMLObj = new MainHTML();
	$htmlarray = array();
	$htmlarray[]['select']['name'] = 'menuid';
	$htmlarray[]['select']['close'] = '';

	$htmlarray[]['option']['start'] = '';
	$htmlarray[]['option']['value'] = '';
	$htmlarray[]['option']['close'] = '';
	$htmlarray[]['option']['data'] = '------------------';
	$htmlarray[]['option']['end'] = '';


	if($resultmenu = $sqlObj->FireSQL($sqlmenu)){
	while($resultsetmenu = $sqlObj->FetchResult($resultmenu)){

	$htmlarray[]['option']['start'] = '';
	$htmlarray[]['option']['value'] = $resultsetmenu->id;
	($resultsetmenu->id == $resultsetpagecontents->menuid)?$htmlarray[]['option']['nonattribute'] = 'SELECTED':'';
	$htmlarray[]['option']['close'] = '';
	$htmlarray[]['option']['data'] = $sqlObj->getCleanData($resultsetmenu->name);
	$htmlarray[]['option']['end'] = '';

	}
	
	}

	$htmlarray[]['select']['end'] = '';

	$menu_placeholder = $HTMLObj->HTMLCreator($htmlarray);

	$input_data_placeholder = MainSystem::HTMLEditorInit('data',$sqlObj->getCleanData($resultsetpagecontents->data));

	$input_data2_placeholder = MainSystem::HTMLEditorInit('data2',$sqlObj->getCleanData($resultsetpagecontents->data2));


?>



<form id="editpage" name="editpage" method="post" action="<?php echo MainSystem::URLCreator('cms/savePage/'.$id.'/') ?>" enctype="multipart/form-data" onsubmit="return JSMainFunction();">
<table width="100%" border="0" bgcolor="#CC9933">
  <tr>
    <td width="17%" bgcolor="#CCCC66">SEO URL </td>
    <td width="83%" bgcolor="#CCCC66"><?php echo MainSystem::URLCreator('cms/getContent/'.$id.'/');?></td>
  </tr>  
  
  <tr>
    <td width="17%" bgcolor="#CCCC66">Page Name </td>
    <td width="83%" bgcolor="#CCCC66"><input type="text" name="name" size="95" value="<?php echo $page_name_placeholder; ?>" /></td>
  </tr>
  <tr>
    <td width="17%" bgcolor="#CCCC66">Page Title </td>
    <td width="83%" bgcolor="#CCCC66"><input type="text" name="title" size="95" value="<?php echo $page_title_placeholder; ?>" /></td>
  </tr>

  <tr>
    <td bgcolor="#CCCC66">Menu </td>
    <td bgcolor="#CCCC66"><?php echo $menu_placeholder; ?></td>
  </tr>
  <tr>
    <td bgcolor="#CCCC66">Page Content </td>
    <td bgcolor="#CCCC66"><?php  echo $input_data_placeholder; ?></td>
  </tr>
  <tr>
    <td bgcolor="#CCCC66">Page Content (MORE OPTION) </td>
    <td bgcolor="#CCCC66"><?php  echo $input_data2_placeholder; ?></td>
  </tr>
   <tr>
    <td bgcolor="#CCCC66">Meta Keywords </td>
    <td bgcolor="#CCCC66"><textarea name="metakeys" cols="73" width="5"><?php echo $meta_keys_placeholder; ?></textarea></td>
  </tr>

   <tr>
    <td bgcolor="#CCCC66">Meta Description </td>
    <td bgcolor="#CCCC66"><textarea name="metadesc" cols="73" width="5"><?php echo $meta_desc_placeholder; ?></textarea></td>
  </tr>

  <tr>
    <td colspan="2" bgcolor="#CCCC66" align="center"><input type="Submit" name="Submit" value="Save Page" /></td>
  </tr>

</table>
</form>

<?php
unset($htmlarray);
$htmlarray = array();

$htmlarray[]['js']['js'] = 'notempty=name,title:onsubmit=editpage:alert:default';
$validation = $HTMLObj->HTMLCreator($htmlarray);

echo $validation;
?>