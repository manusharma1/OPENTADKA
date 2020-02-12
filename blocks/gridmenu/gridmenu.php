<?php
class GridMenu
{

function createGridMenu($name,$mainpagefocusid=0){
	
	$dtstartertext = '';

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
	
	$columns = array('id','title','data');
	$conditions = array();
	$conditions['=']['menuid'] = $menuid;
	$conditions['AND =']['isactive'] = '1';
	$sql = $sqlObj->SQLCreator('S', 'content', $columns, $conditions, '', '', '');
	if($result = $sqlObj->FireSQL($sql)){
	$returndata .= '<dl>';
	while($resultset = $sqlObj->FetchResult($result)){
	$url = 'cms/getContent/'.$resultset->id.'/';
	$dtstartertxt = ($mainpagefocusid==$resultset->id)?'id=starter':'';
	$returndata .= '<dt '.$dtstartertxt.'>'.$sqlObj->getCleanData($resultset->title).'</dt>';
	$returndata .= '<dd>'.$sqlObj->limit_words($sqlObj->getCleanData($resultset->data)).'<a href="'.MainSystem::URLCreator($url).'">Read More...</a></dd>';
	}
	$returndata .= '</dl>';
	
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
	

function showAllGridMenus($mainpagefocusid)
{
	$actionviewresult = MainSystem::CallActionView($mainpagefocusid,__CLASS__,__FUNCTION__);
	return $actionviewresult;
}


} // class GridMenu
?>