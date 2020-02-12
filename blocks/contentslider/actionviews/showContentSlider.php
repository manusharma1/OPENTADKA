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
<!-- thumbnail scroller markup begin -->
<div id="tS1" class="jThumbnailScroller" align="center">
	<div class="jTscrollerContainer">
		<div class="jTscroller">

<?php
	global $_ACTION_VIEW_PARAMETER_ID;
	$parentid = $_ACTION_VIEW_PARAMETER_ID;
	$columns = array('id','linktitle','linkvalue','linkdetails');
	$conditions = array();
	$conditions['=']['isactive'] = '1';
	$sqlObj = new MainSQL();
	$sql = $sqlObj->SQLCreator('S', 'links', $columns, $conditions, 'linktitle', '', '');
	if($result = $sqlObj->FireSQL($sql)){
	if($sqlObj->getNumRows($result) !=0){ // If Sub Page Exists
	?>
	<?php
	while($resultset = $sqlObj->FetchResult($result)){
	?>
	<a href="<?php echo $sqlObj->getCleanData($resultset->linkvalue); ?>" target="_blank" style="color:#000000;font-weight:bolder;"><?php echo $sqlObj->getCleanData($resultset->linktitle); ?><br /><?php echo $sqlObj->getCleanData($resultset->linkdetails); ?></a>
	<?php
	}
	}
	}
?>
		</div>
	</div>
	<a href="#" class="jTscrollerPrevButton"></a>
	<a href="#" class="jTscrollerNextButton"></a>
</div>

<!-- thumbnail scroller markup end -->
<script>
/* jQuery.noConflict() for using the plugin along with other libraries. 
   You can remove it if you won't use other libraries (e.g. prototype, scriptaculous etc.) or 
   if you include jQuery before other libraries in yourdocument's head tag. 
   [more info: http://docs.jquery.com/Using_jQuery_with_Other_Libraries] */
jQuery.noConflict(); 
/* calling thumbnailScroller function with options as parameters */
(function($){
window.onload=function(){ 
	$("#tS1").thumbnailScroller({ 
		scrollerType:"hoverAccelerate", 
		scrollerOrientation:"horizontal", 
		scrollSpeed:2, 
		scrollEasing:"easeOutCirc", 
		scrollEasingAmount:600, 
		acceleration:4, 
		scrollSpeed:800, 
		noScrollCenterSpace:10, 
		autoScrolling:0, 
		autoScrollingSpeed:2000, 
		autoScrollingEasing:"easeInOutQuad", 
		autoScrollingDelay:500 
	});
}
})(jQuery);
</script>