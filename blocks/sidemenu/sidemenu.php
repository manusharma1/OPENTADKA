<?php
class SideMenu
{

function CreateULLIMenu($name){
	
	$returndata = '';
	$columns = array('id');
	$conditions = array();
	$conditions['=']['name'] = $name;
	$conditions['AND =']['isactive'] = '1';
	$sqlObj = new MainSQL();
	$sql = $sqlObj->SQLCreator('S', 'menu', $columns, $conditions, '', '', '');
	if($result = $sqlObj->FireSQL($sql)){
	if($sqlObj->getNumRows($result)>0){
	if($resultset = $sqlObj->FetchResult($result)){
	$menuid = $resultset->id;
	
	$columns = array('title','id');
	$conditions = array();
	$conditions['=']['menuid'] = $menuid;
	$conditions['AND =']['isactive'] = '1';
	$sql = $sqlObj->SQLCreator('S', 'content', $columns, $conditions, '', '', '');
	if($result = $sqlObj->FireSQL($sql)){
	$returndata .= '<ul>';
	while($resultset = $sqlObj->FetchResult($result)){
	$url = 'cms/getContent/'.$resultset->id.'/';
	$returndata .= '<li><a href="'.MainSystem::URLCreator($url).'">'.$resultset->title.'</a></li>';
	}
	$returndata .= '</ul>';
	
	return $returndata;

	}else{
	trigger_error('SQL Error'); /* The Error Reporting (For Mysql query and fetch) in this senario needs to be well coded*/ 
	// Trigger DB Error
	return '';
	}
	}else{
	trigger_error('DB Fetch Error');
	// Trigger DB Error
	return '';
	}
	}else{
	return '';
	}
	}else{
	trigger_error('SQL Error'); /* The Error Reporting (For Mysql query and fetch) in this senario needs to be well coded*/ 
	// Trigger DB Error
	return '';
	}

}
	

} // class SideMenu
?>