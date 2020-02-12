<?php
include("include.php");
$DBObject = new DBfunctions();

$pid =  $_GET['id'];
if($pid !="" || $pid !=0){
		$output = '<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  <td width="30%" class="normaltext">Choose your Sub Department</td>
          <td width="70%"><select name="subdepartment" id="subdepartment">';
			$parentobject = $DBObject->getAllCatParents($pid);
			while ($resultobj = $parentobject->fetch_object()) {
			$output .= '<option value="'.$resultobj->id.'">'.$resultobj->name.'</option>';
			}
           $output .=  '</select></td>
		  </tr>
		</table>';
}else{
		$output = '<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  <td width="30%" class="normaltext">Choose your Sub Department</td>
          <td width="70%"><select name="subdepartment" id="subdepartment">
		  </select></td>
		  </tr>
		</table>';
}
echo $output;

?>



