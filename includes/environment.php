<?php
class EnvironmentFunctions {

function os_info() {
// the order of this array is important
$oses = array(
'Win311' => 'Win16',
'Win95' => '(Windows 95)|(Win95)|(Windows_95)',
'WinME' => '(Windows 98)|(Win 9x 4.90)|(Windows ME)',
'Win98' => '(Windows 98)|(Win98)',
'Win2000' => '(Windows NT 5.0)|(Windows 2000)',
'WinXP' => '(Windows NT 5.1)|(Windows XP)',
'WinServer2003' => '(Windows NT 5.2)',
'WinVista' => '(Windows NT 6.0)',
'Win7' => '(Windows NT 6.1)',
'WinNT' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
'OpenBSD' => 'OpenBSD',
'SunOS' => 'SunOS',
'Linux' => '(Linux)|(X11)',
'MacOS' => '(Mac_PowerPC)|(Macintosh)',
'QNX' => 'QNX',
'BeOS' => 'BeOS',
'OS2' => 'OS/2',
'SearchBot'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp)|(MSNBot)|(Ask Jeeves/Teoma)|(ia_archiver)'
);
$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
foreach($oses as $os=>$pattern)
if (preg_match('/'.$pattern.'/i', $agent))
return $os;
}else{
return 0;
}

static public function set_seperator(){
$os = self::os_info();
$seperator = '';
$backslash_os = array('Win311','Win95','WinME','Win98','Win2000','WinXP','WinServer2003','WinVista','Win7','WinNT');
$slash_os = array('OpenBSD','SunOS','Linux','MacOS','QNX','BeOS','OS2','SearchBot');

if(in_array($os,$backslash_os)){
$seperator = '\\';
}else if(in_array($os,$slash_os)){
$seperator = '/'
}else{
$seperator = '\\';
}
define('_S',$seperator);
}

} // class EnvironmentFunctions
?>