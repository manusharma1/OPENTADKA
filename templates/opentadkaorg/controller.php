<?php
if(_MODULE == ''){
$module = 'cms';
}else{
$module = _MODULE;
}


if(_ACTION == ''){
$action = 'getContent';
}else{
$action = _ACTION;
}

if(_PARAMETERS == ''){
$parameters = array('1'); // Default Value // Home Page ID
}else{
$parameters = explode(',', _PARAMETERS);
}

define('_TEMPLATE_IMG_DIR',PROJ_TEMPLATES_WWW_DIR._WS.PROJ_DEFAULT_TEMPLATE_DIR._WS.'images');
define('_TEMPLATE_CSS_DIR',PROJ_TEMPLATES_WWW_DIR._WS.PROJ_DEFAULT_TEMPLATE_DIR._WS.'css');
define('_TEMPLATE_JS_DIR',PROJ_TEMPLATES_WWW_DIR._WS.PROJ_DEFAULT_TEMPLATE_DIR._WS.'js');


// DEFINE PLACEHOLDERS

$title_placeholder='';
$meta_description_placeholder='';
$meta_keywords_placeholder='';
$main_content_placeholder='';
$contentslider_page_placeholder='';


//Allowed Modules, Please add your allowed Modules, in the array

$admin_allowed_modules = array('cms');

//Allowed Actions, Please add your allowed actions, in the array

$admin_allowed_actions = array('getContent','errorPage');

// Main Caller 
$MainSystemObj = new MainSystem();

if(in_array($module,$admin_allowed_modules)){

if(in_array($action,$admin_allowed_actions)){

$resultset = $MainSystemObj->CallModule($module,$action,$parameters); // ClassName , Method Name, Parameters in Array

	if(isset($resultset['title_placeholder'])){
	$title_placeholder = $resultset['title_placeholder'];
	}else{
	$title_placeholder = '';
	}

	if(isset($resultset['meta_description_placeholder'])){
	$meta_description_placeholder = $resultset['meta_description_placeholder'];
	}else{
	$meta_description_placeholder = '';
	}

	if(isset($resultset['meta_keywords_placeholder'])){
	$meta_keywords_placeholder = $resultset['meta_keywords_placeholder'];
	}else{
	$meta_keywords_placeholder = '';
	}

	if(isset($resultset['main_content_placeholder'])){
	$main_content_placeholder = $resultset['main_content_placeholder'];
	}else{
	$main_content_placeholder = '';
	}

}else{
MainSystem::URLForwarder(MainSystem::URLCreator('cms/errorPage/1/'));
}
}else{
MainSystem::URLForwarder(MainSystem::URLCreator('cms/errorPage/1/'));
}

if($module=='cms' && $action=='getContent'){
$pageid = $parameters[0];
}

if($pageid=='1'){
$contentslider_page_placeholder = $MainSystemObj->CallBlock('contentslider','showContentSlider', array()); // ClassName , Method Name, Parameters in Array 
}else{
$contentslider_page_placeholder = '';
}
?>