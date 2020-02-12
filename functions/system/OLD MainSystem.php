<?php
class MainSystem
{

static function SelectTemplate(){
	
	$columns = array('value');
	$conditions = array();
	$conditions['=']['name'] = 'template';
	$conditions['AND =']['isactive'] = '1';
	$sqlObj = new MainSQL();
	$sql = $sqlObj->SQLCreator('S', 'config', $columns, $conditions, '', '', '');
	$result = $sqlObj->FireSQL($sql);
	if($resultset = $sqlObj->FetchResult($result)){
	if(is_dir(PROJ_TEMPLATES_DIR._S.$resultset->value)){
	define('PROJ_DEFAULT_TEMPLATE_DIR',$resultset->value);
	}else{
	// Trigger Non Existing Directory Error
	return 0;
	}
	}
	else{
	// Trigger Error
	return 0;
	}
}

static function IncludeModules(){
	
	$columns = array('value');
	$conditions = array();
	$conditions['=']['name'] = 'module';
	$conditions['AND =']['isactive'] = '1';
	$sqlObj = new MainSQL();
	$sql = $sqlObj->SQLCreator('S', 'config', $columns, $conditions, '', '', '');
	$result = $sqlObj->FireSQL($sql);
	while($resultset = $sqlObj->FetchResult($result)){
	if(is_dir(PROJ_MODULES_DIR._S.$resultset->value)){
	include_once(PROJ_MODULES_DIR._S.$resultset->value._S.$resultset->value.'.php');
	}else{
	// Trigger Non Existing Module Directory Error
	return 0;
	}
	}

}


static function IncludeBlocks(){
	
	$columns = array('value');
	$conditions = array();
	$conditions['=']['name'] = 'block';
	$conditions['AND =']['isactive'] = '1';
	$sqlObj = new MainSQL();
	$sql = $sqlObj->SQLCreator('S', 'config', $columns, $conditions, '', '', '');
	$result = $sqlObj->FireSQL($sql);
	while($resultset = $sqlObj->FetchResult($result)){
	if(is_dir(PROJ_BLOCKS_DIR._S.$resultset->value)){
	include_once(PROJ_BLOCKS_DIR._S.$resultset->value._S.$resultset->value.'.php');
	}else{
	// Trigger Non Existing Module Directory Error
	return 0;
	}
	}
}



static function IncludeMainJSFunctions(){
	if(file_exists(PROJ_MAINSYSTEM_JS_DIR._S.'MainJS.js')){
	echo('<script type="text/javascript" src="'.PROJ_MAINSYSTEM_JS_WWW_DIR._WS.'MainJS.js"'.'></script>');
	}
}


public function CallModule($module = '', $method = '', $parameters = ''){
	
	$ModuleResultset = 0;
	if(class_exists($module)){
	$moduleObj = new $module;
	if(method_exists($moduleObj, $method)){
	$ModuleResultset = call_user_func_array(array($moduleObj,$method),$parameters);
	}else{
	trigger_error('Function Not Found');
	//trigger function not found error
	}
	}else{
	trigger_error('Class Not Found');
	//trigger class not found error
	}
	
	return $ModuleResultset;

}


function CallBlock($block = '', $method = '', $parameters = ''){
	
	$BlockResultset = 0;

	if(class_exists($block)){
	$blockObj = new $block;
	if(method_exists($block, $method)){
	$BlockResultset = call_user_func_array(array($blockObj,$method),$parameters);
	}else{
	trigger_error('Function Not Found');
	//trigger function not found error
	}
	}else{
	trigger_error('Class Not Found');
	//trigger class not found error
	}
	
	return $BlockResultset;

}


private static function getActionViewFileContents($actionviewfilename){

	ob_start();
	include_once($actionviewfilename);
	$contents = ob_get_contents();
	ob_end_clean();
	return $contents;

}


/*public static function CallActionView($actionviewparameterid = ''){
	
	if(!defined('_ACTION_VIEW_PARAMETER_ID')){
	define('_ACTION_VIEW_PARAMETER_ID', $actionviewparameterid);
	}

	if(_MODULE!='' && is_dir(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S._MODULE)){
	if(file_exists(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S._MODULE._S.PROJ_DEFAULT_ACTIONVIEWS_FOLDER._S._ACTION.'.php')){
	$actionviewfileresults = self::getActionViewFileContents(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S._MODULE._S.PROJ_DEFAULT_ACTIONVIEWS_FOLDER._S._ACTION.'.php');
	}else{
	trigger_error('Action Viewer File is not Present for the Module');
	}
	}else if(_MODULE!='' && !is_dir(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S._MODULE) && self::IsAdminLogged() && PROJ_OVERRIDE_ADMIN_TEMPLATE==1){
	if(file_exists(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S.PROJ_ADMIN_TEMPLATE_DIR._S.PROJ_DEFAULT_ACTIONVIEWS_FOLDER._S._MODULE._S._ACTION.'.php')){
	$actionviewfileresults = self::getActionViewFileContents(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S.PROJ_ADMIN_TEMPLATE_DIR._S.PROJ_DEFAULT_ACTIONVIEWS_FOLDER._S._MODULE._S._ACTION.'.php');
	}else{
	trigger_error('Action Viewer File is not Present for the Module');
	}
	}else{
	if(file_exists(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S.PROJ_DEFAULT_ACTIONVIEWS_FOLDER._S._ACTION.'.php')){
	$actionviewfileresults =  self::getActionViewFileContents(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S.PROJ_DEFAULT_ACTIONVIEWS_FOLDER._S._ACTION.'.php');
	}else{
	trigger_error('Action Viewer File is not Present for the Module');
	}
	}

	return $actionviewfileresults;

}*/


public static function CallActionView($actionviewparameterid = '', $block=false, $blockaction=false){
	
	if($block!=false){
	$block = strtolower($block);
	}

	if(!defined('_ACTION_VIEW_PARAMETER_ID')){
	define('_ACTION_VIEW_PARAMETER_ID', $actionviewparameterid);
	}

	if(_MODULE!='' && $block==false && $block==false && is_dir(PROJ_MODULES_DIR._S._MODULE._S.PROJ_DEFAULT_ACTIONVIEWS_FOLDER)){
	if(file_exists(PROJ_MODULES_DIR._S._MODULE._S.PROJ_DEFAULT_ACTIONVIEWS_FOLDER._S._ACTION.'.php')){
	$actionviewfileresults = self::getActionViewFileContents(PROJ_MODULES_DIR._S._MODULE._S.PROJ_DEFAULT_ACTIONVIEWS_FOLDER._S._ACTION.'.php');
	}else{
	trigger_error('Action Viewer File is not Present for the Module');
	}
	}


	if($block!=false && $blockaction!=false && is_dir(PROJ_BLOCKS_DIR._S.$block._S.PROJ_DEFAULT_ACTIONVIEWS_FOLDER)){
	if(file_exists(PROJ_BLOCKS_DIR._S.$block._S.PROJ_DEFAULT_ACTIONVIEWS_FOLDER._S.$blockaction.'.php')){
	$actionviewfileresults = self::getActionViewFileContents(PROJ_BLOCKS_DIR._S.$block._S.PROJ_DEFAULT_ACTIONVIEWS_FOLDER._S.$blockaction.'.php');
	}else{
	trigger_error('Action Viewer File is not Present for the Block');
	}
	}

	return $actionviewfileresults;

}


static function MainActionCaller(){
	if(isset($_GET)){
	if(isset($_GET['q'])){
	$q = htmlspecialchars_decode($_GET['q']);
	}else{
	$q = '';
	}
	
	$querystring = explode('/', $q);

	if(isset($querystring[0])){
	define('_MODULE', $querystring[0]);
	}else{
	define('_MODULE', '');
	}
	if(isset($querystring[1])){
	define('_ACTION', $querystring[1]);
	}else{
	define('_ACTION', '');
	}
	if(isset($querystring[2])){
	define('_PARAMETERS', $querystring[2]);
	}else{
	define('_PARAMETERS', '');
	}
	}
}



static function GetCurrentURL($fullurl = 0){
	$url = '';

	if(_MODULE!=''){
	$url = _MODULE;
	}
	if(_ACTION!=''){
	$url .= '/'._ACTION;
	}
	if(_PARAMETERS!=''){
	$url .= '/'._PARAMETERS;
	}

	
	if($fullurl == 1){
	return PROJ_MAIN_WWW_DIR._WS.self::URLCreator($url);
	}else{
	return self::URLCreator($url);
	}
}



static function MainTemplateControllerViewCaller(){

	if(file_exists(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S._MODULE._S.PROJ_DEFAULT_CONTROLLER_FILE)){
	include_once(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S._MODULE._S.PROJ_DEFAULT_CONTROLLER_FILE);
	}else if(self::IsAdminLogged() && PROJ_OVERRIDE_ADMIN_TEMPLATE == 1){
	if(file_exists(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S.PROJ_ADMIN_TEMPLATE_DIR._S.PROJ_DEFAULT_CONTROLLER_FILE)){
	include_once(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S.PROJ_ADMIN_TEMPLATE_DIR._S.PROJ_DEFAULT_CONTROLLER_FILE);
	}
	}else{
	include_once(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S.PROJ_DEFAULT_CONTROLLER_FILE);
	}

	if(file_exists(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S._MODULE._S.PROJ_DEFAULT_FOLDER_FILE)){
	include_once(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S._MODULE._S.PROJ_DEFAULT_FOLDER_FILE);
	}else if(self::IsAdminLogged() && PROJ_OVERRIDE_ADMIN_TEMPLATE == 1){
	if(file_exists(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S.PROJ_ADMIN_TEMPLATE_DIR._S.PROJ_DEFAULT_FOLDER_FILE)){
	include_once(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S.PROJ_ADMIN_TEMPLATE_DIR._S.PROJ_DEFAULT_FOLDER_FILE);
	}
	}else{
	include_once(PROJ_TEMPLATES_DIR._S.PROJ_DEFAULT_TEMPLATE_DIR._S.PROJ_DEFAULT_FOLDER_FILE);
	}
}



static function URLCreator($string, $method = 'post'){
	
	$stringbreak = explode('/',$string);
	$module = (isset($stringbreak[0]))?$stringbreak[0]:'';
	$action = (isset($stringbreak[1]))?$stringbreak[1]:'';
	$id = (isset($stringbreak[2]))?$stringbreak[2]:'';


	if(PROJ_FOLDERNAME==''){
	$urlpefix = PROJ_HOSTNAME._WS;
	}else{
	$urlpefix = PROJ_HOSTNAME._WS.PROJ_FOLDERNAME._WS;	
	}

	switch($method){
	
	case 'post' :

	if(PROJ_SEO_FRIENDLY_URLS == 0){
	$url = $urlpefix.'?q='.$string;
	}else{
	$url = $urlpefix.$string;
	}
	break;

	case 'get' : 

	if(PROJ_SEO_FRIENDLY_URLS == 0){
	$url = $urlpefix.'?q='.$string;
	}else{
	$url = $urlpefix.$string;
	}
	break;

	}

	switch(PROJ_SEO_FRIENDLY_URLS_SETTINGS){
	
	case 1 :
	if($module=='cms' && $action=='getContent'){
	$columns = array('title');
	$conditions = array();
	$conditions['=']['id'] = $id;
	$sqlObj = new MainSQL();
	$sql = $sqlObj->SQLCreator('S', 'content', $columns, $conditions, '', '', '');
	$result = $sqlObj->FireSQL($sql);
	if($resultset = $sqlObj->FetchResult($result)){
	$urlwithpagetitle = str_replace(' ', '_', $resultset->title);
	$urlwithpagetitle = str_replace('?', '', $urlwithpagetitle);
	$urlwithpagetitle = str_replace('&', '', $urlwithpagetitle);	
	$urlwithpagetitle = str_replace('-', '', $urlwithpagetitle);
	$urlwithpagetitle = str_replace(':', '', $urlwithpagetitle);
	$urlwithpagetitle = str_replace('__', '_', $urlwithpagetitle);
	}
	$url = $url.$urlwithpagetitle.'/';
	}
	break;

	}

	return $url;
	}



static function URLForwarder($url){
	if (!headers_sent($filename, $linenum)) {
	header('Location:'.$url);
	exit;
	}else{
	trigger_error('Headers already sent in'.$filename.'on line'.$linenum);
	exit;
	}

}


static function GetPreviousSessionMsg(){
	
	if(!self::IsSessionStarted()){
	session_start();
	}

	if(isset($_SESSION['message'])){
	$session_msg = $_SESSION['message'];
	}else{
	$session_msg = '';
	}
	session_unset();
	session_destroy();
	return $session_msg;

}


static function GetSessionMsg(){
	
	if(!self::IsSessionStarted()){
	session_start();
	}

	if(isset($_SESSION['message']) && $_SESSION['session_message_display_counter'] == 0 && $_SESSION['message'] !=''){
	$session_msg = $_SESSION['message'];
	$_SESSION['session_message_display_counter'] = 1;
	}else{
	$session_msg = '';
	$_SESSION['message'] = '';
	$_SESSION['session_message_display_counter'] = 0;
	}
return $session_msg;
}


static function CreateSession(){

	session_start();
	session_regenerate_id();
	$_SESSION['message'] = '';
	$_SESSION['session_message_display_counter'] = 0;

}

static function CheckSession(){

	if(!self::IsSessionStarted()){
	session_start();
	}

	header("cache-control: private"); //IE 6 Fix
	header("cache-Control: no-store, no-cache, must-revalidate");
	header("cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache"); 
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

	if(isset($_SESSION['UserLoGGedIn']) && $_SESSION['UserLoGGedIn'] == 'true' && isset($_SESSION['id']) && isset($_SESSION['WSName']) && $_SESSION['WSName'] == PROJ_NAME){
	if(isset($_COOKIE) && $_COOKIE['ProjectAdmin']=='PA'.$_SESSION['username'].'pa'){
	setcookie('ProjectAdmin', 'PA'.$_SESSION['username'].'pa', time()+PROJ_SESSION_TIME_LIMIT);
	}else{
	self::DestroySession();
	self::URLForwarder(self::URLCreator('admin/'));
	}
	}else{
	self::DestroySession();
	self::URLForwarder(self::URLCreator('admin/'));
	}

}


static function DestroySession(){

	MainDB::closeDBConnection(); // Close DB Connection

	setcookie("ProjectAdmin", "PA".$_SESSION['username']."pa", time()-3600); // Delete Cookie

	unset($_SESSION['LoginForm']);
	unset($_SESSION['username']);
	unset($_SESSION['id']);
	unset($_SESSION['UserLoGGedIn']);
	unset($_SESSION['message']);
	unset($_SESSION['session_message_display_counter']);


	$_SESSION = array();
	$_COOKIE = array();

	session_unset();
	session_destroy();

}


static function GetSessionUserID(){

return $_SESSION['id'];

}


static private function IsAdminLogged(){
if(!self::IsSessionStarted()){
session_start();
}

if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'true'){
return 1;
}else{
return 0;
}

}


static private function IsSessionStarted(){
    
return (isset($_SESSION))?true:false;

}



static function SystemPasswordReturn($password){

return(sha1(PROJ_SEC_SALT.$password.PROJ_SEC_SALT));

}


static function HTMLEditorInit($name = 'projeditor', $value = ''){

if(PROJ_HTML_EDITOR == 'ckeditor'){

// Include CKEditor class.
include_once(PROJ_3RDPARTY_DIR._S.'ckeditor'._S.'ckeditor.php');

// Create class instance.
$CKEditor = new CKEditor();

// Do not print the code directly to the browser, return it instead
$CKEditor->returnOutput = true;

// Path to CKEditor directory, ideally instead of relative dir, use an absolute path:
//   $CKEditor->basePath = '/ckeditor/'
// If not set, CKEditor will try to detect the correct path.

$CKEditor->basePath = PROJ_3RDPARTY_WWW_DIR._WS.'ckeditor'._WS;

// Set global configuration (will be used by all instances of CKEditor).
$CKEditor->config['width'] = 600;

//$CKEditor->config['language'] = 'hi';


// Change default textarea attributes
$CKEditor->textareaAttributes = array("cols" => 80, "rows" => 10);

// The initial value to be displayed in the editor.
$initialValue = '<p>This is some <strong>sample text</strong>. You are using <a href="http://ckeditor.com/">CKEditor</a>.</p>';

// Create first instance.
return $CKEditor->editor($name, $value);


}else if(PROJ_HTML_EDITOR == 'tinymce'){

echo '<!-- TinyMCE -->
<script type="text/javascript" src="'.PROJ_3RDPARTY_WWW_DIR._WS.'tinymce'._WS.'jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		editor_selector : "'.$name.'"
	});
</script>
<!-- /TinyMCE -->';

}
return '<textarea name="'.$name.'" class="'.$name.'" style="width:100%">
        </textarea>';
}


} // class MainSystem
?>