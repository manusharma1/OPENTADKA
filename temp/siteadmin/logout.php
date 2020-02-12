<?php
session_start();
require("../config.php"); // Main Config File
require("../includes/db.php"); // DB Config File

global $mysqli;
$mysqli->close(); // Close Mysqli Connection

unset($_SESSION['LoginForm']);
unset($_SESSION['username']);
unset($_SESSION['id']);
unset($_SESSION['UserLoGGedIn']);
unset($_SESSION['message']);
unset($_SESSION['entrydelid']);
unset($_SESSION['pagedelid']);
unset($_SESSION['pagedelid2']);
unset($_SESSION['catdelid']);
unset($_SESSION['fsdelid']);
unset($_SESSION['sppagedelid']);
unset($_SESSION['sessionincrease']);
unset($_SESSION['fsentrydelid']);
unset($_SESSION['splcatentrydelid']);

setcookie("SiteAdmin", "SA".$returnresult->username."sa", time()-3600); // Delete Cookie

$_SESSION = array();
$_COOKIE = array();

session_unset();
session_destroy();
header("Location:login.php");
?>