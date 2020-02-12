<?php
session_start();
require("config.php"); // Main Config File
header("cache-control: private"); //IE 6 Fix
header("cache-Control: no-store, no-cache, must-revalidate");
header("cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); 
global $website_name;
if(isset($_SESSION['UserLoGGedIn']) && $_SESSION['UserLoGGedIn'] =="true" && isset($_SESSION['id']) && isset($_SESSION['WSName']) && $_SESSION['WSName'] == $website_name){
if(isset($_COOKIE["SiteUser"]) && $_COOKIE["SiteUser"]=="WSU".$_SESSION['useremailid']."wsu"){
global $cookie_sesssion_timeout;
setcookie("SiteUser", "WSU".$_SESSION['useremailid']."wsu", time()+$cookie_sesssion_timeout);
}else{
header("Location:logout.php");
}
}else{
header("Location:logout.php");
}
?>