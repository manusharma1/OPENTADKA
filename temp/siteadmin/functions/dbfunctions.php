<?php
class DBfunctions
{
private $username, $password, $securitysalt, $value;


function setUserDetails($user,$pass){
	$this->username = $user;
	$this->password = $pass;
	} //function setUserDetails



function setSecuritySalt(){
	$this->securitysalt = "NHISALT";
	//return $this->securitysalt;
	} //function getSecuritySalt


function loginCheck(){
	global $mysqli;
	$sqllogin = "SELECT id,username FROM users WHERE username ='".$this->username."' AND password = '".md5($this->securitysalt.$this->password.$this->securitysalt)."' AND isactive='1'";
	if ($this->result = $mysqli->query($sqllogin)){
	if($this->result->num_rows>0){
	$rowlogin = mysqli_fetch_object($this->result);
	return $rowlogin;
	}else{
	return 0;
	}
	}
} //function loginCheck




function escape_protection($value) 
{ 
	global $mysqli;

    if (get_magic_quotes_gpc()) { 
        $value = stripslashes($value); 
    } 
    if (!is_numeric($value)) { 
        $value = htmlspecialchars($mysqli->real_escape_string(strip_tags($value)));
    } 
    return $value; 

} // function escape_protection

function escape_protection_v2($value) 
{ 
	global $mysqli;

    if (get_magic_quotes_gpc()) { 
        $value = stripslashes($value); 
    } 
    if (!is_numeric($value)) { 
        $value = htmlspecialchars($mysqli->real_escape_string($value));
    } 
    return $value; 

} // function escape_protection


function escape_protection_decode($value) 
{ 
	global $mysqli;

    if (!is_numeric($value)) { 
        $value = htmlspecialchars_decode($value);
    } 
    return $value; 

} // function escape_protection


function escape_protection_no_htmlsplchars($value) 
{ 
	global $mysqli;

    if (get_magic_quotes_gpc()) { 
        $value = stripslashes($value); 
    } 
    if (!is_numeric($value)) { 
        $value = $mysqli->real_escape_string(strip_tags($value));
    } 
    return $value; 

} // function escape_protection



function conditionsFormatter($conditions){

$conditionclose = 0;
$conditionvalue = '';
$setconditions = '';


foreach($conditions as $keys => $values){
	foreach($values as $key => $value){

		switch($keys){

			case 'AND()':
			case 'AND ()':

			$conditionvalue = '';
			$setconditions  .= ' AND (';
			$conditionclose = 1;
			break;

			case 'OR()':
			case 'OR ()':

			$conditionvalue = '';
			$setconditions  .= ' OR (';
			$conditionclose = 1;
			break;

			case 'INARR':
			case 'IN ARR':
			// need to check if the value coming is array // note this
			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= '`'.$key .'` IN (';
				
				foreach($value as $inkey => $invalue){
				$invalues  .= '\''.self::escape_protection($invalue).'\', ';
				}
			
			$invalues = substr($invalues,0,-2);
			$setconditions .=  $invalues.')';
			break;

			case '!INARR':
			case '!IN ARR':

			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= '`'.$key .'` NOT IN (';
				
				foreach($value as $inkey => $invalue){
				$invalues  .= '\''.self::escape_protection($invalue).'\', ';
				}
			
			$invalues = substr($invalues,0,-2);
			$setconditions .=  $invalues.')';
			break;


			case 'ANDINARR':
			case 'AND IN ARR':
			// need to check if the value coming is array // note this
			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= ' AND `'.$key .'` IN (';
				
				foreach($value as $inkey => $invalue){
				$invalues  .= '\''.self::escape_protection($invalue).'\', ';
				}
			
			$invalues = substr($invalues,0,-2);
			$setconditions .=  $invalues.')';
			break;

			case 'AND!INARR':
			case 'AND !IN ARR':

			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= ' AND `'.$key .'` NOT IN (';
				
				foreach($value as $inkey => $invalue){
				$invalues  .= '\''.self::escape_protection($invalue).'\', ';
				}
			
			$invalues = substr($invalues,0,-2);
			$setconditions .=  $invalues.')';
			break;


		case 'ORINARR':
			case 'OR IN ARR':
			// need to check if the value coming is array // note this
			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= ' OR `'.$key .'` IN (';
				
				foreach($value as $inkey => $invalue){
				$invalues  .= '\''.self::escape_protection($invalue).'\', ';
				}
			
			$invalues = substr($invalues,0,-2);
			$setconditions .=  $invalues.')';
			break;

			case 'OR!INARR':
			case 'OR !IN ARR':

			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= ' OR `'.$key .'` NOT IN (';

				foreach($value as $inkey => $invalue){
				$invalues  .= '\''.self::escape_protection($invalue).'\', ';
				}

			$invalues = substr($invalues,0,-2);
			$setconditions .=  $invalues.')';
			break;

			case 'INCON':
			case 'IN CON':
			// need to check if the value coming is NOT AN ARRAY // note this
			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= '`'.$key .'` IN ('.$value.')';			
			break;

			case '=':
			$setconditions .= '`'.$key .'` = '. '\''.self::escape_protection($value).'\'';
			break;

			case '!=':
			$setconditions .= '`'.$key .'` != '. '\''.self::escape_protection($value).'\'';
			break;

			case 'AND=':
			case 'AND =':

		    $setconditions .= ' AND `'. $key .'` = '. '\''.self::escape_protection($value).'\'';
			break;

			case 'OR=':
			case 'OR =':

		    $setconditions .= ' OR `'. $key .'` = '. '\''.self::escape_protection($value).'\'';
			break;

			case 'AND!=':
			case 'AND !=':

		    $setconditions .= ' AND `'. $key .'` != '. '\''.self::escape_protection($value).'\'';
			break;

			case 'OR!=':
			case 'OR !=':

		    $setconditions .= ' OR `'. $key .'` != '. '\''.self::escape_protection($value).'\'';
			break;

			
		}

		if($conditionclose == 1){
		$setconditions  .= ' '.$conditionvalue.' `'.$key.'` = ' . '\''.self::escape_protection($value).'\'';
		}

		if($conditionclose == 2){
		$setconditions  .= ')';
		}
	
		if($conditionclose == 1){
		$conditionclose = $conditionclose+1;
		}
	}

}

return $setconditions;

} // function conditionsFormatter



function conditionsFormatterJ($conditions){

$conditionclose = 0;
$conditionvalue = '';
$setconditions = '';


foreach($conditions as $keys => $values){
	foreach($values as $key => $value){

		switch($keys){

			case 'AND()':
			case 'AND ()':

			$conditionvalue = '';
			$setconditions  .= ' AND (';
			$conditionclose = 1;
			break;

			case 'OR()':
			case 'OR ()':

			$conditionvalue = '';
			$setconditions  .= ' OR (';
			$conditionclose = 1;
			break;

			case 'INARR':
			case 'IN ARR':
			// need to check if the value coming is array // note this
			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= $key .' IN (';
				
				foreach($value as $inkey => $invalue){
				$invalues  .= '\''.self::escape_protection($invalue).'\', ';
				}
			
			$invalues = substr($invalues,0,-2);
			$setconditions .=  $invalues.')';
			break;

			case '!INARR':
			case '!IN ARR':

			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= $key .' NOT IN (';
				
				foreach($value as $inkey => $invalue){
				$invalues  .= '\''.self::escape_protection($invalue).'\', ';
				}
			
			$invalues = substr($invalues,0,-2);
			$setconditions .=  $invalues.')';
			break;


			case 'ANDINARR':
			case 'AND IN ARR':
			// need to check if the value coming is array // note this
			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= ' AND '.$key .' IN (';
				
				foreach($value as $inkey => $invalue){
				$invalues  .= '\''.self::escape_protection($invalue).'\', ';
				}
			
			$invalues = substr($invalues,0,-2);
			$setconditions .=  $invalues.')';
			break;

			case 'AND!INARR':
			case 'AND !IN ARR':

			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= ' AND '.$key .' NOT IN (';
				
				foreach($value as $inkey => $invalue){
				$invalues  .= '\''.self::escape_protection($invalue).'\', ';
				}
			
			$invalues = substr($invalues,0,-2);
			$setconditions .=  $invalues.')';
			break;


		case 'ORINARR':
			case 'OR IN ARR':
			// need to check if the value coming is array // note this
			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= ' OR '.$key .' IN (';
				
				foreach($value as $inkey => $invalue){
				$invalues  .= '\''.self::escape_protection($invalue).'\', ';
				}
			
			$invalues = substr($invalues,0,-2);
			$setconditions .=  $invalues.')';
			break;

			case 'OR!INARR':
			case 'OR !IN ARR':

			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= ' OR '.$key .' NOT IN (';

				foreach($value as $inkey => $invalue){
				$invalues  .= '\''.self::escape_protection($invalue).'\', ';
				}

			$invalues = substr($invalues,0,-2);
			$setconditions .=  $invalues.')';
			break;

			case 'INCON':
			case 'IN CON':
			// need to check if the value coming is NOT AN ARRAY // note this
			$conditionvalue = '';
			$invalues = '';
			$setconditions  .= $key .' IN ('.$value.')';			
			break;

			case '=':
			$setconditions .= $key .' = '. '\''.self::escape_protection($value).'\'';
			break;

			case '!=':
			$setconditions .= $key .' != '. '\''.self::escape_protection($value).'\'';
			break;

			case 'AND=':
			case 'AND =':

		    $setconditions .= ' AND '. $key .' = '. '\''.self::escape_protection($value).'\'';
			break;

			case 'OR=':
			case 'OR =':

		    $setconditions .= ' OR '. $key .' = '. '\''.self::escape_protection($value).'\'';
			break;

			case 'AND!=':
			case 'AND !=':

		    $setconditions .= ' AND '. $key .' != '. '\''.self::escape_protection($value).'\'';
			break;

			case 'OR!=':
			case 'OR !=':

		    $setconditions .= ' OR '. $key .' != '. '\''.self::escape_protection($value).'\'';
			break;

			case 'K=':
			case 'K =':

			$setconditions .= $key .' = '.self::escape_protection($value);
			break;

			case 'K!=':
			case 'K !=':

			$setconditions .= $key .' != '.self::escape_protection($value);
			break;

			case 'KAND=':
			case 'K AND =':

		    $setconditions .= ' AND '. $key .' = '.self::escape_protection($value);
			break;

			case 'KOR=':
			case 'K OR =':

		    $setconditions .= ' OR '. $key .' = '.self::escape_protection($value);
			break;

			case 'KAND!=':
			case 'K AND !=':

		    $setconditions .= ' AND '. $key .' != '.self::escape_protection($value);
			break;

			case 'KOR!=':
			case 'K OR !=':

		    $setconditions .= ' OR '. $key .' != '.self::escape_protection($value);
			break;
			
		}

		if($conditionclose == 1){
		$setconditions  .= ' '.$conditionvalue.' `'.$key.'` = ' . '\''.self::escape_protection($value).'\'';
		}

		if($conditionclose == 2){
		$setconditions  .= ')';
		}
	
		if($conditionclose == 1){
		$conditionclose = $conditionclose+1;
		}
	}

}

return $setconditions;

} // function conditionsFormatterJ

function DBomni($type, $table, $cols, $conditions, $orderby, $startlimit, $endlimit){

$sql = '';

switch($type){

//Insert Case 

case 'I':
case 'i':

$dbcolsnames = '';
$dbcolsvalues = '';

foreach($cols as $key => $value){
$dbcolsnames .= '`'.$key.'`, ';
$dbcolsvalues .= '\''.self::escape_protection($value).'\', ';
}

$dbcolsnames = substr($dbcolsnames, 0, -2);
$dbcolsvalues = substr($dbcolsvalues, 0, -2);

$sql = "INSERT INTO `".$table."` (".$dbcolsnames.") VALUES (".$dbcolsvalues.")";
break;

// Update Case

case 'U':
case 'u':

$setvalues = '';


foreach($cols as $key => $value){
$setvalues  .= '`'.$key.'` = ' . '\''.self::escape_protection($value).'\', ';
}

$setvalues = substr($setvalues, 0, -2);

$setconditions = self::conditionsFormatter($conditions);

$sql = "UPDATE `".$table."` SET ".$setvalues." WHERE ".$setconditions;

break;


// Select Case

case 'S':
case 's':

$dbcolsnames = '';

foreach($cols as $key => $value){
$dbcolsnames .= '`'.$value.'`, ';
}

$dbcolsnames = substr($dbcolsnames, 0, -2);

$setconditions = self::conditionsFormatter($conditions);


$sql = "SELECT ".$dbcolsnames." FROM `".$table."` WHERE ".$setconditions;

if($orderby != ''){
$sql .= " ORDER BY ".$orderby;
}

if($startlimit != ''){
$sql .=  " LIMIT ".$startlimit;
}

if($endlimit !=''){
$sql .= " , ".$endlimit;
}

break;


// Delete Case

case 'D':
case 'd':

$setconditions = self::conditionsFormatter($conditions);


$sql = "DELETE FROM `".$table."` WHERE ".$setconditions;

break;


} // end of the case - I = Insert , U = Update, S = Select, D = Delete

return $sql;

}



function DBomniJ($type, $tables, $cols, $conditions, $orderby, $startlimit, $endlimit){

// UPDATE users u, content c SET u.phone = '676776' where u.isactive='1' AND u.id = c.id
// INSERT INTO users(phone) SELECT content.id FROM content WHERE content.id = '1'

$sql = '';

switch($type){

//Insert Case // Needs to be discussed

case 'I':
case 'i':

$dbtablesnamesandaliasis = '';

foreach($tables as $key => $value){
$dbtablesnamesandaliasis .= $key.' '.$value.', ';
}

$dbtablesnamesandaliasis = substr($dbtablesnamesandaliasis, 0, -2);

$dbcolsnames = '';
$dbcolsvalues = '';

foreach($cols as $key => $value){
$dbcolsnames .= '`'.$key.'`, ';
$dbcolsvalues .= '\''.self::escape_protection($value).'\', ';
}

$dbcolsnames = substr($dbcolsnames, 0, -2);
$dbcolsvalues = substr($dbcolsvalues, 0, -2);

$sql = "INSERT INTO `".$dbtablesnamesandaliasis."` (".$dbcolsnames.") VALUES (".$dbcolsvalues.")";
break;

// Update Case

case 'U':
case 'u':

$setvalues = '';

$dbtablesnamesandaliasis = '';

foreach($tables as $key => $value){
$dbtablesnamesandaliasis .= '`'.$key.'` '.$value.', ';
}

$dbtablesnamesandaliasis = substr($dbtablesnamesandaliasis, 0, -2);

foreach($cols as $key => $value){
$setvalues  .= ''.$key.' = ' . '\''.self::escape_protection($value).'\', ';
}

$setvalues = substr($setvalues, 0, -2);

$setconditions = self::conditionsFormatterJ($conditions);

$sql = "UPDATE ".$dbtablesnamesandaliasis." SET ".$setvalues." WHERE ".$setconditions;

break;


// Select Case

case 'S':
case 's':

$dbtablesnamesandaliasis = '';

foreach($tables as $key => $value){
$dbtablesnamesandaliasis .= '`'.$key.'` '.$value.', ';
}

$dbcolsnames = '';

foreach($cols as $key => $value){
$dbcolsnames .= $value.', ';
}

$dbcolsnames = substr($dbcolsnames, 0, -2);

$setconditions = self::conditionsFormatterJ($conditions);


$sql = "SELECT ".$dbcolsnames." FROM ".$dbtablesnamesandaliasis." WHERE ".$setconditions;

if($orderby != ''){
$sql .= " ORDER BY ".$orderby;
}

if($startlimit != ''){
$sql .=  " LIMIT ".$startlimit;
}

if($endlimit != ''){
$sql .= " , ".$endlimit;
}

break;


// Delete Case

case 'D':
case 'd':

$setconditions = self::conditionsFormatter($conditions);


$sql = "DELETE FROM `".$table."` WHERE ".$setconditions;

break;


} // end of the case - I = Insert , U = Update, S = Select, D = Delete

return $sql;

}





} // class DBfunctions
?>