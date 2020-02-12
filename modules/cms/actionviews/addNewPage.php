<?php
	$columns = array('id','name');
	$conditions = array();
	$conditions['=']['pid'] = 0;
	$conditions['AND =']['isactive'] = '1';
	$sqlObj = new MainSQL();
	$sql = $sqlObj->SQLCreator('S', 'menu', $columns, $conditions, '', '', '');
		
	$HTMLObj = new MainHTML();
	$htmlarray = array();
	$htmlarray[]['select']['nameid'] = 'menuid';
	$htmlarray[]['select']['title'] = 'Menu';
	$htmlarray[]['select']['close'] = '';

	$htmlarray[]['option']['start'] = '';
	$htmlarray[]['option']['value'] = '';
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

	$input_data_placeholder = MainSystem::HTMLEditorInit('data');
	$input_data2_placeholder = MainSystem::HTMLEditorInit('data2');

?>



<form id="addnewpage" name="addnewpage" method="post" enctype="multipart/form-data" action="<?php echo MainSystem::URLCreator('cms/savePage/') ?>" onsubmit="return JSMainFunction();">
<table width="100%" border="0" bgcolor="#CC9933">
  <tr>
    <td width="17%" bgcolor="#CCCC66">Page Name </td>
    <td width="83%" bgcolor="#CCCC66"><input type="text" name="name" id="name" size="95"/></td>
  </tr>
  <tr>
    <td width="17%" bgcolor="#CCCC66">Page Title </td>
    <td width="83%" bgcolor="#CCCC66"><input type="text" name="title" id="title" size="95"/></td>
  </tr>

  <tr>
    <td bgcolor="#CCCC66">Menu</td>
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
    <td bgcolor="#CCCC66"><textarea name="metakeys" id="metakeys" cols="73" rows="5"></textarea></td>
  </tr>

   <tr>
    <td bgcolor="#CCCC66">Meta Description </td>
    <td bgcolor="#CCCC66"><textarea name="metadesc" id="metadesc" cols="73" rows="5"></textarea></td>
  </tr>

  <tr>
    <td colspan="2" bgcolor="#CCCC66" align="center"><input type="Submit" name="Submit" value="Add New Page" /></td>
  </tr>

</table>
</form>


<?php
unset($htmlarray);
$htmlarray = array();

$htmlarray[]['js']['js'] = 'notempty=name,title:onsubmit=addnewpage:alert:default';
$validation = $HTMLObj->HTMLCreator($htmlarray);

echo $validation;
?>