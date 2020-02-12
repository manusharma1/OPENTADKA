<?php
	$columns = array('id','name');
	$conditions = array();
	$conditions['=']['pid'] = 0;
	$conditions['AND =']['isactive'] = '1';
	$sqlObj = new MainSQL();
	$sql = $sqlObj->SQLCreator('S', 'menu', $columns, $conditions, '', '', '');
		
	$HTMLObj = new MainHTML();
	$htmlarray = array();
	$htmlarray[]['select']['name'] = 'pid';
	$htmlarray[]['select']['close'] = '';

	$htmlarray[]['option']['start'] = '';
	$htmlarray[]['option']['value'] = 0;
	$htmlarray[]['option']['close'] = '';
	$htmlarray[]['option']['data'] = '------------------';
	$htmlarray[]['option']['end'] = '';


	if($result = $sqlObj->FireSQL($sql)){
	while($resultset = $sqlObj->FetchResult($result)){

	$htmlarray[]['option']['start'] = '';
	$htmlarray[]['option']['value'] = $resultset->id;
	$htmlarray[]['option']['close'] = '';
	$htmlarray[]['option']['data'] = $resultset->name;
	$htmlarray[]['option']['end'] = '';

	}
	
	}

	$htmlarray[]['select']['end'] = '';

	$menu_placeholder = $HTMLObj->HTMLCreator($htmlarray);

?>



<form id="addnewpage" name="addnewpage" method="post" action="<?php echo MainSystem::URLCreator('cms/saveMenu/') ?>">
<table width="100%" border="0" bgcolor="#CC9933">
  <tr>
    <td width="17%" bgcolor="#CCCC66">Menu Name </td>
    <td width="83%" bgcolor="#CCCC66"><input type="text" name="name" size="95"/></td>
  </tr>

    <tr>
    <td width="17%" bgcolor="#CCCC66">Parent Menu </td>
    <td width="83%" bgcolor="#CCCC66"><?php echo $menu_placeholder; ?></td>
  </tr>

  <tr>
    <td colspan="2" bgcolor="#CCCC66" align="center"><input type="Submit" name="Submit" value="Add New Menu" /></td>
  </tr>

</table>
</form>