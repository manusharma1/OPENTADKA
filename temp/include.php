<?php
require_once("environment.php"); // To Be Changed after the creation of Install file
Environment::set_seperator();
Environment::set_paths();
require_once('includes'._S.'config.php'); // Main Config File
error_reporting(PROJ_ERROR_REPORTING_SWITCH);
Environment::set_time_zone();
//require_once('includes'._S.'db'._S.PROJ_DBTYPE.'.db.php'); // DB Connection File
require_once('includes'._S.'db.php'); // DB Connection File
require_once('functions'._S.'db'._S.PROJ_DBTYPE._S.'MainDB.php'); // Main DB Class and Functions
require_once('functions'._S.'db'._S.PROJ_DBTYPE._S.'MainSQL.php'); // Main SQL Formatter Class and Functions
require_once('functions'._S.'html'._S.'MainHTML.php'); // Main HTML Formatter Class and Functions
require_once('functions'._S.'system'._S.'MainSystem.php'); // Main System Functions

$DBFilename = DBSelector::selectDB(PROJ_DBTYPE);
$DBConnection = $DBFilename::getDBInstance();
$DBConnectionObj = $DBConnection->getDBObj();
?>