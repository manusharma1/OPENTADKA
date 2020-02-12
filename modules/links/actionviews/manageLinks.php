<?php
	
	// Define placeholders

	$linktitle_placeholder = '';
	$linkvalue_placeholder = '';
	$edit_link_placeholder = '';
	$delete_link_placeholder = '';
	
	
	$html_coutput = '';
	$tr_bg_value = 0;

	$html_coutput .= '<table width="100%" border="0" bgcolor="#CC9933">
	<tr>
    <td width="10%" bgcolor="#CCCC66"><b>Link Title</b></td>
	<td width="10%" bgcolor="#CCCC66"><b>Link Value</b></td>
    <td width="10%" bgcolor="#CCCC66"><b>Status</b></td>
    <td width="10%" bgcolor="#CCCC66"><b>Edit</b></td>
    <td width="5%" bgcolor="#CCCC66"><b>Delete </b></td>
	</tr>';

	// Get Page Data
	$columns = array('id','linktitle','linkvalue','isactive');
	$sqlObj = new MainSQL();
	$sql = $sqlObj->SQLCreator('S', 'links', $columns, '', '', '', '');
	if($result = $sqlObj->FireSQL($sql)){
	if($sqlObj->getNumRows($result) !=0){ // If Rows Exists
	
	while($resultset = $sqlObj->FetchResult($result)){
		
	$tr_bg_color = ($tr_bg_value==0)?'#FFFFAA':'#FFFF7F';
	$tr_bg_value = ($tr_bg_value==0)?1:0;

	$linktitle_placeholder = ($resultset->linktitle=='')?'':$resultset->linktitle;
	$linkvalue_placeholder = ($resultset->linkvalue=='')?'':$resultset->linkvalue;
	$id = $resultset->id;
	$linkisactive_link_placeholder = ($resultset->isactive==0)?MainSystem::URLCreator('links/changeLinkStatus/'.$id.'/'):MainSystem::URLCreator('links/changeLinksStatus/'.$id.'/');
	$linkisactive_text_placeholder = $linkisactive_placeholder = ($resultset->isactive==0)?'Not Active':'Active';

	$edit_link_placeholder = ($resultset->id=='')?'#':MainSystem::URLCreator('links/editLink/'.$resultset->id.'/');
	$delete_link_placeholder = ($resultset->id=='')?'#':MainSystem::URLCreator('news/deleteLink/'.$resultset->id.'/');
	
	$html_coutput .= '<tr bgcolor="'.$tr_bg_color.'">
    <td>'.$linktitle_placeholder.'</td>
    <td>'.$linkvalue_placeholder.'</td>
	<td><a href="'.$linkisactive_link_placeholder.'">'.$linkisactive_text_placeholder.'</a></td>
    <td><a href="'.$edit_link_placeholder.'">Edit </a></td>
    <td><a href="'.$delete_link_placeholder.'">Delete </a></td>
	</tr>';
	} // while

	}else{ // if Doesn't Exists
	$html_coutput .= '<tr>
    <td colspan="5" align="center"><h2>No Record</h2></td></tr>';
	}
	}else{
	trigger_error('SQL Error');
	}
	

	$html_coutput .= '</table>';

	echo $html_coutput;
