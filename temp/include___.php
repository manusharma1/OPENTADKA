<?php
error_reporting(E_ALL);
require("config.php"); // Main Config File
require("includes/db.php"); // DB Config File
require("functions/dbfunctions.php"); // DB Functions //
require("functions/secfunctions.php"); // Data Security Functions //
require("functions/pagingfunctions.php"); // Pagination Functions //
include_once("includes/fckeditor/fckeditor.php"); // FCK Editor //


$DBObjectF = new DBfunctionsF();
$SecObjectF = new SECfunctionsF();

// Pagination Init()
$PGObjectF = new PaginationfunctionsF();

global $pagination_num_limit;
global $pagination_num_limit_cat;

	if(isset($_GET['pg'])){
	$DT_PGBREAK = $_GET['pg'];
	}
	
	/*if($DT_PGBREAK == "" || $DT_PGBREAK == 0 || !is_numeric($DT_PGBREAK)){
	$DT_PGBREAK = 1;
	}

    $DT_END = $DT_PGBREAK*$pagination_num_limit;
	$DT_START = $DT_END-$pagination_num_limit;
	
// Pagination


$AllFSListResult  = $DBObjectF->getAllFSData();

*/
?>