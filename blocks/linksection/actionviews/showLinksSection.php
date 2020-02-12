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
//////////////////////////////////////////////////////////////////////////
?>

<span class="txt1">Important Links</span><br />
<br style="line-height:13px;" />

<?php
	// Define PlaceHolders
	$newstitle_placeholder = '';
	$newstext_placeholder = '';
	$newsdate_placeholder = '';

	// Get News Data
	$columns = array('id','linktitle','linkvalue');
	$conditions = array();
	$conditions['=']['isactive'] = 1;
	$sqlObj = new MainSQL();
	$sql= $sqlObj->SQLCreator('S', 'links', $columns, $conditions, '', '', '');
	if($result = $sqlObj->FireSQL($sql)){
	if($sqlObj->getNumRows($result) !=0){ // If News Exists
	while($resultset = $sqlObj->FetchResult($result)){
	$linkstitle_placeholder = $sqlObj->getCleanData($resultset->linktitle);
	$linksvalue_placeholder = $sqlObj->getCleanData($resultset->linkvalue);
	?>
	<a href="<?php echo $linksvalue_placeholder;?>" target="_blank"><?php echo $linkstitle_placeholder;?></a><br />
	<?php
	}
	}
	}else{
	trigger_error('Data Fetch Error');
	}

?>