<?php
///////////////////////////////////////////////////////////////////////////
//                                                                       //
// NOTICE OF COPYRIGHT  - DO NOT REMOVE THIS NOTICE                      //
//                                                                       //
// OPENTADKA FRAMEWORK											         //
//          http://www.opentadka.org                                     //
//                                                                       //
// Copyright (C) 2010 onwards  Manu Sharma  http://www.opentadka.org     //
//                                                                       //
// This program is free software; you can redistribute it and/or modify  //
// it under the terms of the GNU General Public License as published by  //
// the Free Software Foundation; either version 2 of the License, or     //
// (at your option) any later version.                                   //
//                                                                       //
// This program is distributed in the hope that it will be useful,       //
// but WITHOUT ANY WARRANTY; without even the implied warranty of        //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         //
// GNU General Public License for more details:                          //
//                                                                       //
//          http://www.gnu.org/copyleft/gpl.html                         //
//                                                                       //
///////////////////////////////////////////////////////////////////////////
class links
{

public function addNewLink(){
	
	$functionreturnarray = array(); // array that will return to the controller, having all the required data of the placeholders

	$actionviewresult = MainSystem::CallActionView();
	$functionreturnarray['title_placeholder'] = 'Add New Link';
	$functionreturnarray['main_content_placeholder'] = $actionviewresult;
	return $functionreturnarray;
	
}


public function saveLink($parameters){

	$id = $parameters[0];

	$data = array();
	$data['id'] = $id;
	$data['linktitle'] = $_POST['linktitle'];
	$data['linkvalue'] = $_POST['linkvalue'];
	$data['linkdetails'] = $_POST['linkdetails'];

	if($id == ''){
	$data['addeddate'] = date('Y-m-d H:i:s');
	$data['addedby'] = MainSystem::GetSessionUserID();
	}else{
	$data['modifieddate'] = date('Y-m-d H:i:s');
	$data['modifiedby'] = MainSystem::GetSessionUserID();
	}


	// Conditions in case of Edit //
	$conditions = array();
	$conditions['=']['id'] = $id;

	$sqlObj = new MainSQL();
	
	$sql = ($id=='')?$sqlObj->SQLCreator('I', 'links', $data, '', '', '', ''):$sqlObj->SQLCreator('U', 'links', $data, $conditions, '', '', '');

	if($result = $sqlObj->FireSQL($sql)){
	$_SESSION['message'] = 'Link Saved';
	$returnid = ($id=='')?$sqlObj->getLastInsertID():$id;
	MainSystem::URLForwarder(MainSystem::URLCreator('links/editLink/'.$returnid.'/'));
	}else{
	$_SESSION['message'] = 'Link cannot be Saved';
	MainSystem::URLForwarder(MainSystem::URLCreator('links/addNewLink/'));
	}
	

}


public function editLink($parameters){	
	
	$id = $parameters[0];

	$functionreturnarray = array(); // array that will return to the controller, having all the required data of the placeholders

	$actionviewresult = MainSystem::CallActionView($id);
	$functionreturnarray['title_placeholder'] = 'Edit Link';
	$functionreturnarray['main_content_placeholder'] = $actionviewresult;
	return $functionreturnarray;
	
}



public function manageLinks(){
	
	$functionreturnarray = array(); // array that will return to the controller, having all the required data of the placeholders

	$actionviewresult = MainSystem::CallActionView();
	$functionreturnarray['title_placeholder'] = 'Manage Links';
	$functionreturnarray['main_content_placeholder'] = $actionviewresult;
	return $functionreturnarray;
	
}

public function changeLinkStatus($parameters){

	$id = $parameters[0];

	$columns = array('isactive');
	$conditions = array();
	$conditions['=']['id'] = $id;
	$sqlObj = new MainSQL();
	$sqllinkcontents = $sqlObj->SQLCreator('S', 'links', $columns, $conditions, '', '', '');
	if($resultlinkcontents = $sqlObj->FireSQL($sqllinkcontents)){
	if($sqlObj->getNumRows($resultlinkcontents) !=0){ // If link Exists
	if($resultsetlinkcontents = $sqlObj->FetchResult($resultlinkcontents)){
	$change_link_status = ($resultsetlinkcontents->isactive==0)?1:0;
	
	$data = array();
	$data['isactive'] = $change_link_status;

	// Conditions in case of Edit //
	$conditions = array();
	$conditions['=']['id'] = $id;

	$sqlObj = new MainSQL();
	
	$sql = $sqlObj->SQLCreator('U', 'links', $data, $conditions, '', '', '');
	if($result = $sqlObj->FireSQL($sql)){
	$_SESSION['message'] = 'Link Status Changed';
	MainSystem::URLForwarder(MainSystem::URLCreator('links/manageLinks/'));
	}
	}
	}
	}

}

} // class links