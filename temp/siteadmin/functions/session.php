<?php
session_start();
require("../config.php"); // Main Config File
header("cache-control: private"); //IE 6 Fix
header("cache-Control: no-store, no-cache, must-revalidate");
header("cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); 
global $website_name;
if(isset($_SESSION['UserLoGGedIn']) && $_SESSION['UserLoGGedIn'] =="true" && isset($_SESSION['id']) && isset($_SESSION['WSName']) && $_SESSION['WSName'] == $website_name){
if(isset($_COOKIE["SiteAdmin"]) && $_COOKIE["SiteAdmin"]=="SA".$_SESSION['username']."sa"){
global $cookie_sesssion_timeout;
setcookie("SiteAdmin", "SA".$_SESSION['username']."sa", time()+$cookie_sesssion_timeout);
}else{
$_SESSION['sessionincrease'] = "true";
header("Location:sess_prompt.php");
}
}else{
header("Location:logout.php");
}
?>