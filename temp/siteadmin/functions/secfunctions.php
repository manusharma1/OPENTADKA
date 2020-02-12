<?php
class SECfunctions
{
var $result;

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


} // class SECfunctions
?>