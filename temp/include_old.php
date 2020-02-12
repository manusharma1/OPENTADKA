<?php
require_once('environment.php'); // To Be Changed after the creation of Install file
Environment::set_error_repoting();
Environment::set_seperator();
Environment::set_paths();
require_once('includes'._S.'config.php'); // Main Config File
error_reporting(PROJ_ERROR_REPORTING_SWITCH);
Environment::set_time_zone();
require_once('includes'._S.'db'._S.PROJ_DBTYPE.'.db.php'); // DB Connection File
require_once('functions'._S.'db'._S.PROJ_DBTYPE._S.'MainDB.php'); // Main DB Class and Functions
require_once('functions'._S.'db'._S.PROJ_DBTYPE._S.'MainSQL.php'); // Main SQL Formatter Class and Functions
require_once('functions'._S.'html'._S.'MainHTML.php'); // Main HTML Formatter Class and Functions
require_once('functions'._S.'system'._S.'MainSystem.php'); // Main System Functions
$DBConnection = mysqli_DBConnection::getDBInstance(); // Please edit the value of the DB type if you have different version other than mysqli
$DBConnectionObj = $DBConnection->getDBObj();
?>