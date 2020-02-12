<?php
error_reporting(E_ALL);
// this file is to include all the components that are required to start the application //
require("functions/session.php"); // Main Session File
//require("../config.php"); // Main Config File
require("../includes/db.php"); // DB Config File
require("functions/dbfunctions.php"); // DB Functions //
require("functions/secfunctions.php"); // Security Functions //
require("functions/pagingfunctions.php"); // Pagination Functions //

include_once("includes/fckeditor/fckeditor.php"); // FCK Editor //
?>