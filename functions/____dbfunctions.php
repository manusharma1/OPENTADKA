<?php
class DBfunctionsF
{
	protected $pgid,$pgid2,$ctgid,$splpgid,$fspgid,$result,$securitysalt,$emailid,$password,$websiteuserid,$websiteentrid,$html;

	function setPage($id){
	$this->pgid = $id;
	} //function setPage

	function setPage2($id){
	$this->pgid2 = $id;
	} //function setPage2


	function setCat($id){
	$this->ctgid = $id;
	} //function setCat

	
	function setSPLPage($id){
	$this->splpgid = $id;
	} //function setFSPage
	
	function setFSPage($id){
	$this->fspgid = $id;
	} //function setFSPage

	function setWebsiteUserID($id){
	$this->websiteuserid = $id;
	} //function setWebUserID

	function setWebsiteEntry($id){
	$this->websiteentrid = $id;
	} //function setWebsiteEntry

	function get_mysqli_insert_id(){
	global $mysqli;
	return $mysqli->insert_id;
	} // function get_mysqli_insert_id

	function getPageData()
	{
		global $mysqli;

		$sql = "SELECT * FROM content WHERE id ='".$this->pgid."' AND isactive='1'";
		if ($this->result = $mysqli->query($sql)) {
		$resultset = mysqli_fetch_object($this->result);
		return $resultset;
		}else{
		return 0;
		}
	} // function getPageData




	function getReplies()
	{
		global $mysqli;
		$output = '';
		$sql = "SELECT * FROM contentreplies WHERE id ='".$this->pgid."' AND isactive='1' AND isspam='0'";
		if ($this->result = $mysqli->query($sql)) {
		while($resultset = mysqli_fetch_object($this->result)){
		$output .= '<hr /><h3>'.$resultset->title.'<h3><p>'.$resultset->data.'</p>';
		}
		}else{
		return 0;
		}
	} // function getReplies


	function getPageData2()
	{
		global $mysqli;

		$sql = "SELECT * FROM content2 WHERE id ='".$this->pgid2."' AND isactive='1'";
		if ($this->result = $mysqli->query($sql)) {
		$resultset = mysqli_fetch_object($this->result);
		return $resultset;
		}else{
		return 0;
		}
	} // function getPageData

	function getCataLinkData()
	{
		global $mysqli;

		$sql = "SELECT * FROM links WHERE subcatid ='".$this->ctgid."' AND isactive='1' ORDER BY orderid ASC";
		if ($this->result = $mysqli->query($sql)) {
		return $this->result;
		}else{
		return 0;
		}
	} // function getPageData


	function getCatPageData()
	{
		global $mysqli;

		$sql = "SELECT * FROM categories_content WHERE cid ='".$this->ctgid."' AND isactive='1'";
		if ($this->result = $mysqli->query($sql)) {
		$resultset = mysqli_fetch_object($this->result);
		return $resultset;
		}else{
		return 0;
		}
	} // function getCatPageData


	function getAllParents($parentid)
	{
	global $mysqli;
	$sql = "SELECT id,pid,name FROM categories WHERE pid ='".$parentid."'";
	if ($this->result = $mysqli->query($sql)){
	return $this->result;
	}else{
	return 0;
	}
	} // function getAllParents



	function showCatPagesandLinks($pid)
	{
	global $mysqli;
	$this->html = "";
	$sql = "SELECT id,title,data FROM content WHERE pid ='".$pid."' AND isactive = '1' ORDER BY orderid ASC";
	if ($this->result = $mysqli->query($sql)){
	
	while($resultdata = mysqli_fetch_object($this->result)){
	/*$this->html .= '<dt>'.$resultdata->title.'</dt>
          <dd>'.self::limit_words($resultdata->data,40).'<a href="view.php?id='.$resultdata->id.'"> More....</a></dd>';*/

	$this->html .= '<dt>'.$resultdata->title.'</dt>
          <dd>'.self::limit_words($resultdata->data,40).'<input type="Image" width="40" height="40" src="images/arrow.png" onclick="location.href=\'view.php?id='.$resultdata->id.'\'" align="right" style="cursor:hand"/></dd>';
	}
	return $this->html;
	}else{
	return 0;
	}
	} // function getAllParents

	function InsertNewPage($pagename,$pagetitle,$pagecontent,$pagemetakeys,$pagemetadesc,$parentid,$email,$postedbyname,$memberid)
	{
		global $mysqli;
		$this->error = 0;

			$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM content WHERE pid ='".$parentid."'";
			if ($this->result = $mysqli->query($sql4maximumorderid)) {
			$row4maximumorderid = mysqli_fetch_object($this->result);
			$maximumorderid = $row4maximumorderid->orderid + 1;
			/* free result set */
     		//$this->result->close();
			}else{
			$this->error = 1;
			}
		
			echo $sql = "INSERT INTO content(pid,name,title,data,metakey,metadesc,orderid,isactive,addedbyemail,addedbyname,addedbymemberid,addeddate) VALUES ('".$parentid."','".$pagename."','".$pagetitle."','".$pagecontent."','".$pagemetakeys."','".$pagemetadesc."','".$maximumorderid."','0','".$email."','".$postedbyname."','".$memberid."',NOW())";
			if ($this->result = $mysqli->query($sql)) {
			/* free result set */
     		//$this->result->close();
			}else{
			$this->error = 1;
			}
		

		if($this->error==1){
		return 0;
		}else{
		return 1;
		}
		

	} // function InsertNewPage


	function InsertNewReply($pagename,$pagetitle,$pagecontent,$pagemetakeys,$pagemetadesc,$parentid,$email,$postedbyname,$memberid)
	{
		global $mysqli;
		$this->error = 0;

			$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM contentreply WHERE pid ='".$parentid."'";
			if ($this->result = $mysqli->query($sql4maximumorderid)) {
			$row4maximumorderid = mysqli_fetch_object($this->result);
			$maximumorderid = $row4maximumorderid->orderid + 1;
			/* free result set */
     		//$this->result->close();
			}else{
			$this->error = 1;
			}
		
			echo $sql = "INSERT INTO content(pid,name,title,data,metakey,metadesc,orderid,isactive,addedbyemail,addedbyname,addedbymemberid,addeddate) VALUES ('".$parentid."','".$pagename."','".$pagetitle."','".$pagecontent."','".$pagemetakeys."','".$pagemetadesc."','".$maximumorderid."','0','".$email."','".$postedbyname."','".$memberid."',NOW())";
			if ($this->result = $mysqli->query($sql)) {
			/* free result set */
     		//$this->result->close();
			}else{
			$this->error = 1;
			}
		

		if($this->error==1){
		return 0;
		}else{
		return 1;
		}
		

	} // function InsertNewReply

	function getCatData()
	{
		global $mysqli;

		$sql = "SELECT * FROM categories WHERE pid ='".$this->ctgid."' ORDER BY orderid ASC";
		if ($this->result = $mysqli->query($sql)) {
		$resultset = $this->result;
		return $resultset;
		}else{
		return 0;
		}
	} // function getCatData

	function getAllFSData()
	{
		global $mysqli;

		$sql = "SELECT * FROM freestuff ORDER BY orderid ASC";
		if ($this->result = $mysqli->query($sql)) {
		$resultset = $this->result;
		return $resultset;
		}else{
		return 0;
		}
	} // function getCatData


	function getSpecialPageData()
	{
		global $mysqli;

		$sql = "SELECT * FROM splcat_content WHERE id ='".$this->splpgid."' AND isactive='1'";
		if ($this->result = $mysqli->query($sql)) {
		$resultset = mysqli_fetch_object($this->result);
		return $resultset;
		}else{
		return 0;
		}

	} // function getSpecialPageData


	function getFSPageData()
	{
		global $mysqli;

		$sql = "SELECT * FROM freestuff_content WHERE id ='".$this->fspgid."' AND isactive='1'";
		if ($this->result = $mysqli->query($sql)) {
		$resultset = mysqli_fetch_object($this->result);
		return $resultset;
		}else{
		return 0;
		}

	} // function getFSPageData


	function getSpecialPageLinksData($start,$end)
	{
		global $mysqli;

		$sql = "SELECT * FROM splcat_links WHERE catid ='".$this->splpgid."' AND isactive='1' ORDER BY orderid  LIMIT ".$start.",".$end;
		if ($this->result = $mysqli->query($sql)) {
		return $this->result;
		}else{
		return 0;
		}

	} // function getSpecialPageLinksData



	function getSpecialPageLinksCount()
	{
		global $mysqli;

		$sql = "SELECT * FROM splcat_links WHERE catid ='".$this->splpgid."' AND isactive='1' ORDER BY orderid";
		if ($this->result = $mysqli->query($sql)) {
		return $this->result->num_rows;
		}else{
		return 0;
		}

	} // function getSpecialPageLinksCount


	function getCatLinksCount()
	{
		global $mysqli;

		$sql = "SELECT * FROM links WHERE subcatid ='".$this->ctgid."' AND isactive='1' ORDER BY orderid";
		if ($this->result = $mysqli->query($sql)) {
		return $this->result->num_rows;
		}else{
		return 0;
		}

	} // function getCatLinksCount


	function getFSPageLinksData($start,$end)
	{
		global $mysqli;

		$sql = "SELECT * FROM freestuff_links WHERE catid ='".$this->fspgid."' AND isactive='1' ORDER BY orderid  LIMIT ".$start.",".$end;
		if ($this->result = $mysqli->query($sql)) {
		return $this->result;
		}else{
		return 0;
		}

	} // function getFSPageLinksData


	function getCatLinksData($start,$end)
	{
		global $mysqli;

		$sql = "SELECT * FROM links WHERE subcatid ='".$this->ctgid."' AND isactive='1' ORDER BY orderid  LIMIT ".$start.",".$end;
		if ($this->result = $mysqli->query($sql)) {
		return $this->result;
		}else{
		return 0;
		}

	} // function getCatLinksData


	function getFSPageLinksCount()
	{
		global $mysqli;

		$sql = "SELECT * FROM freestuff_links WHERE catid ='".$this->fspgid."' AND isactive='1' ORDER BY orderid";
		if ($this->result = $mysqli->query($sql)) {
		return $this->result->num_rows;
		}else{
		return 0;
		}

	} // function getFSPageLinksCount


	function checkPageExistance(){
	global $mysqli;
	$sql = "SELECT name FROM content WHERE id ='".$this->pgid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkPageExistance


	function checkCatPageExistance(){
	global $mysqli;
	$sql = "SELECT name FROM categories_content WHERE cid ='".$this->catpgid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkPageExistance

	function checkPageExistanceSpecial(){
	global $mysqli;
	$sql = "SELECT name FROM special_content WHERE id ='".$this->pgsplid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkPageExistanceSpecial

	function checkCatExistance(){
	global $mysqli;
	$sql = "SELECT name FROM categories WHERE id ='".$this->ctgid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkCatExistance

	function getCatSelfData($catid)
	{
		global $mysqli;

		$sql = "SELECT pid,name FROM categories WHERE id ='".$catid."'";
		if ($this->result = $mysqli->query($sql)) {
		$resultset = mysqli_fetch_object($this->result);
		return $resultset;
		}else{
		return 0;
		}

	} // function getSpecialPageData


	function getRightPanelBanners($catid,$number)
	{
		global $mysqli;

		$sql = "SELECT image,link FROM categories_banners WHERE cid ='".$catid."' AND number='".$number."'";
		if ($this->result = $mysqli->query($sql)) {
		$resultset = mysqli_fetch_object($this->result);
		return $resultset;
		}else{
		return 0;
		}

	} // function getRightPanelBanners

	
	function getRightPanelBanners4SplCat($catid,$number)
	{
		global $mysqli;

		$sql = "SELECT image,link FROM splcat_banners WHERE cid ='".$catid."' AND number='".$number."'";
		if ($this->result = $mysqli->query($sql)) {
		$resultset = mysqli_fetch_object($this->result);
		return $resultset;
		}else{
		return 0;
		}

	} // function getRightPanelBanners


	function GetSPLCATData($id){
		global $mysqli;
		$sql = "SELECT * FROM splcat WHERE id ='".$id."'";
		if ($this->result = $mysqli->query($sql)) {
		$resultset = mysqli_fetch_object($this->result);
		return $resultset;
		}else{
		return 0;
		}
	} //function GetSPLCATData



	function GetHeaderData($id){
		global $mysqli;
		$sql = "SELECT * FROM header_banners WHERE id ='".$id."'";
		if ($this->result = $mysqli->query($sql)) {
		$resultset = mysqli_fetch_object($this->result);
		return $resultset;
		}else{
		return 0;
		}
	} //function GetHeaderData



	function GetSiteOfTheWeek(){
		global $mysqli;

		$sql = "SELECT * FROM siteoftheweek WHERE  id='1'";

		if ($this->result = $mysqli->query($sql)){
		$resultset = mysqli_fetch_object($this->result);
		return $resultset;
		}
		else{
		return 0;
		}
	} //function InsertSiteOfTheWeek


	function GetFreeStuffCMSData(){
		global $mysqli;

		$sql = "SELECT id,name FROM content WHERE  pid='0' AND isactive='1' ORDER BY orderid ASC";

		if ($this->result = $mysqli->query($sql)){
		return $this->result;
		}
		else{
		return 0;
		}
	} //function GetFreeStuffCMSData


	function GetUsefulWebsitesCMSData(){
		global $mysqli;

		$sql = "SELECT id,name FROM content2 WHERE  pid='0' AND isactive='1' ORDER BY orderid ASC LIMIT 0,10";

		if ($this->result = $mysqli->query($sql)){
		return $this->result;
		}
		else{
		return 0;
		}
	} //function GetUsefulWebsitesCMSData


	function GetUsefulWebsitesCMSData2(){
		global $mysqli;

		$sql = "SELECT id,name FROM content2 WHERE  pid='0' AND isactive='1' ORDER BY orderid ASC";

		if ($this->result = $mysqli->query($sql)){
		return $this->result;
		}
		else{
		return 0;
		}
	} //function GetUsefulWebsitesCMSData2




		function getAllCatParents($parentid)
		{
		global $mysqli;
		$sql = "SELECT id,name FROM categories WHERE pid ='".$parentid."'";
		if ($this->result = $mysqli->query($sql)){
		return $this->result;
		}else{
		return 0;
		}
		} // function getAllCatParents


		function InsertNewEntry($latestsiteuserid,$companyname,$companyphone,$companyfax,$companyaddress,$companyaddress2,$companyaddress3,$companycity,$companycountry,$companyemail,$companywebsite,$description,$billingphone,$billingfax,$billingaddress,$billingaddress2,$billingaddress3,$billingcity,$billingcountry,$billingemail,$package){
		global $mysqli;

	    $sql = "INSERT INTO links (siteuserid,company_name,company_phone,company_fax,company_address,company_address2,company_address3,company_city,company_country,company_email,company_website,description,company_bphone,company_bfax,company_baddress,company_baddress2,company_baddress3,company_bcity,company_bcountry,company_bemail,package,isactive) VALUES ('".$latestsiteuserid."','".$companyname."','".$companyphone."','".$companyfax."','".$companyaddress."','".$companyaddress2."','".$companyaddress3."','".$companycity."','".$companycountry."','".$companyemail."','".$companywebsite."','".$description."','".$billingphone."','".$billingfax."','".$billingaddress."','".$billingaddress2."','".$billingaddress3."','".$billingcity."','".$billingcountry."','".$billingemail."','".$package."','0')";
		if($this->result = $mysqli->query($sql)){
		return 1;
		}else{
		return 0;
		}
	
	} //function InsertNewEntry


function InsertNewSiteUserEntry($name,$phone,$email,$address,$address2,$address3,$city,$country,$finalpassword){
		global $mysqli;

	    $sql = "INSERT INTO siteusers(contact_name,contact_phone,contact_email,contact_address,contact_address2,contact_address3,contact_city,  contact_country ,password ) VALUES ('".$name."','".$phone."','".$email."','".$address."','".$address2."','".$address3."','".$city."','".$country."','".$finalpassword."')";
		if($this->result = $mysqli->query($sql)){
		return 1;
		}else{
		return 0;
		}
	
	} //function InsertNewEntry


	function getSearchData($start,$end,$what,$where,$who)
	{
		global $mysqli;
		
		$sql_sub_string = "";
		$ids_string = "";

		if($what !=""){
		$search_keys_what = explode(" ",$what);
		$keyscount_what = count($search_keys_what);
		for($ii=0;$ii<$keyscount_what;$ii++){
		$sql= "SELECT id FROM categories WHERE name LIKE '%".$search_keys_what[$ii]."%'";
		if ($result = $mysqli->query($sql)) {
		while($data= mysqli_fetch_object($result)){
		$ids_string  .= $data->id.',';
		$sql2= "SELECT id FROM categories WHERE pid ='".$data->id."'";
		if ($result2 = $mysqli->query($sql2)) {
		while($data2= mysqli_fetch_object($result2)){
		$ids_string  .= $data2->id.',';
		}
		}
		}
		}
		}
		$ids_array = array_unique(explode(",",$ids_string));
		$ids_string_unique = substr(implode(',',$ids_array),0,-1);
			if($ids_string_unique != ""){
			$sql_sub_string .= "subcatid IN (".$ids_string_unique.")";
			}else{
			$sql_sub_string .="subcatid IN (-99999.99999)"; // taking non existance value // just to apply the logic and there is no other simple way to do this thing
			}
		}


		if($where !=""){
		if($what !="" && $sql_sub_string !=""){
		$sql_sub_string .= " OR ";
		}
		$search_keys_where = explode(" ",$where);
		$keyscount_where = count($search_keys_where);
		for($ii=0;$ii<$keyscount_where;$ii++){
		if($ii<$keyscount_where-1){
		$sql_sub_string .= "company_address LIKE '%".$search_keys_where[$ii]."%' OR ";
		$sql_sub_string .= "company_address2 LIKE '%".$search_keys_where[$ii]."%' OR ";
		$sql_sub_string .= "company_address3 LIKE '%".$search_keys_where[$ii]."%' OR ";
		}else if($ii<$keyscount_where){
		$sql_sub_string .= "company_address LIKE '%".$search_keys_where[$ii]."%' OR ";
		$sql_sub_string .= "company_address2 LIKE '%".$search_keys_where[$ii]."%' OR ";
		$sql_sub_string .= "company_address3 LIKE '%".$search_keys_where[$ii]."%'";
		}
		}
		}

		if($who !=""){
		if($what !="" || $where !=""){
		$sql_sub_string .= " OR ";
		}
		$search_keys_who = explode(" ",$who);
		$keyscount_who = count($search_keys_who);
		for($ii=0;$ii<$keyscount_who;$ii++){
		if($ii<$keyscount_who-1){
		$sql_sub_string .= "company_name LIKE '%".$search_keys_who[$ii]."%' OR ";
		}else if($ii<$keyscount_who){
		$sql_sub_string .= "company_name LIKE '%".$search_keys_who[$ii]."%'";
		}
		}
		}

		if($what != "" ||  $where != "" || $who != ""){
		$sql_final ="SELECT DISTINCT(id),subcatid,company_name,company_email,company_website,description,isecom FROM links WHERE ".$sql_sub_string." AND isactive = '1' ORDER BY orderid  LIMIT ".$start.",".$end;
		}else{
		$sql_final="SELECT id FROM links where id = '-99999.99999'";// taking non existance value // just to apply the logic and there is no other simple way to do this thing
		}

		if ($this->result = $mysqli->query($sql_final)) {
		return $this->result;
		}else{
		return 0;
		}

	} // function getSearchData


	function getSearchCount($what,$where,$who)
	{
		global $mysqli;

		$sql_sub_string = "";
		$ids_string = "";

		if($what !=""){
		$search_keys_what = explode(" ",$what);
		$keyscount_what = count($search_keys_what);
		for($ii=0;$ii<$keyscount_what;$ii++){
		$sql= "SELECT id FROM categories WHERE name LIKE '%".$search_keys_what[$ii]."%'";
		if ($result = $mysqli->query($sql)) {
		while($data= mysqli_fetch_object($result)){
		$ids_string  .= $data->id.',';
		$sql2= "SELECT id FROM categories WHERE pid ='".$data->id."'";
		if ($result2 = $mysqli->query($sql2)) {
		while($data2= mysqli_fetch_object($result2)){
		$ids_string  .= $data2->id.',';
		}
		}
		}
		}
		}
		$ids_array = array_unique(explode(",",$ids_string));
		$ids_string_unique = substr(implode(',',$ids_array),0,-1);
			if($ids_string_unique != ""){
			$sql_sub_string .= "subcatid IN (".$ids_string_unique.")";
			}else{
			$sql_sub_string .="subcatid IN (-99999.99999)"; // taking non existance value // just to apply the logic and there is no other simple way to do this thing
			}
		}


		if($where !=""){
		if($what !="" && $sql_sub_string !=""){
		$sql_sub_string .= " OR ";
		}
		$search_keys_where = explode(" ",$where);
		$keyscount_where = count($search_keys_where);
		for($ii=0;$ii<$keyscount_where;$ii++){
		if($ii<$keyscount_where-1){
		$sql_sub_string .= "company_address LIKE '%".$search_keys_where[$ii]."%' OR ";
		$sql_sub_string .= "company_address2 LIKE '%".$search_keys_where[$ii]."%' OR ";
		$sql_sub_string .= "company_address3 LIKE '%".$search_keys_where[$ii]."%' OR ";
		}else if($ii<$keyscount_where){
		$sql_sub_string .= "company_address LIKE '%".$search_keys_where[$ii]."%' OR ";
		$sql_sub_string .= "company_address2 LIKE '%".$search_keys_where[$ii]."%' OR ";
		$sql_sub_string .= "company_address3 LIKE '%".$search_keys_where[$ii]."%'";
		}
		}
		}

		if($who !=""){
		if($what !="" || $where !=""){
		$sql_sub_string .= " OR ";
		}
		$search_keys_who = explode(" ",$who);
		$keyscount_who = count($search_keys_who);
		for($ii=0;$ii<$keyscount_who;$ii++){
		if($ii<$keyscount_who-1){
		$sql_sub_string .= "company_name LIKE '%".$search_keys_who[$ii]."%' OR ";
		}else if($ii<$keyscount_who){
		$sql_sub_string .= "company_name LIKE '%".$search_keys_who[$ii]."%'";
		}
		}
		}

		if($what != "" ||  $where != "" || $who != ""){
		$sql_final ="SELECT DISTINCT(id),subcatid,company_name,company_email,company_website,description,isecom FROM links WHERE ".$sql_sub_string." AND isactive = '1' ORDER BY orderid";
		}else{
		$sql_final="SELECT id FROM links where id = '-99999.99999'";// taking non existance value // just to apply the logic and there is no other simple way to do this thing
		}

		if ($this->result = $mysqli->query($sql_final)) {
		return $this->result->num_rows;
		}else{
		return 0;
		}

	} // function getSearchCount


	function getAnEmailFromLink($id){
	global $mysqli;

	$sql = "SELECT company_email,company_name FROM links WHERE  id='".$id."'";

	if ($this->result = $mysqli->query($sql)){
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}
	else{
	return 0;
	}

	} // function getAnEmailFromLink

	
	function limit_words($str, $n = 100, $end_char = '&#8230;')
	{
	
	if (strlen($str) < $n){
		return $str;
	}
	$words = explode(' ', preg_replace("/\s+/", ' ', preg_replace("/(\r\n|\r|\n)/", " ", $str)));
	if (count($words) <= $n){
		return $str;
	}	
	$str = '';
	for ($i = 0; $i < $n; $i++){
		$str .= $words[$i].' ';
	}
	return trim($str).$end_char;

	} //function limit_words


	function checkUniqueSiteuserEmail($email)
	{
		global $mysqli;

		$sql = "SELECT id FROM siteusers WHERE contact_email='".$email."'";
		if ($this->result = $mysqli->query($sql)){
		return $this->result->num_rows;
		}else{
		return 0;
		}
	} // function checkUniqueSiteuserEmail


function createRandomPassword($length) {
	$chars = "234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*<>";
	$i = 0;
	$password = "";
	while ($i <= $length) {
		$password .= $chars{mt_rand(0,strlen($chars))};
		$i++;
	}
	return $password;
} // function createRandomPassword
 

function setSecuritySalt(){
	$this->securitysalt = "DOTCOMCENTRE";
	} //function setSecuritySalt


function getSecuritySalt(){
	return $this->securitysalt;
	} //function getSecuritySalt


function setSiteUserDetails($email,$password){
	$this->emailid = $email;
	$this->password = $password;
	} //function setSiteUserDetails


function loginCheck(){
	global $mysqli;
	$sqllogin = "SELECT id,contact_name,contact_email FROM siteusers WHERE contact_email='".$this->emailid."' AND password = '".md5($this->securitysalt.$this->password.$this->securitysalt)."' AND isactive='1'";
	if ($this->result = $mysqli->query($sqllogin)){
	if($this->result->num_rows>0){
	$rowlogin = mysqli_fetch_object($this->result);
	return $rowlogin;
	}else{
	return 0;
	}
	}
} //function loginCheck



function DrawSiteUserWebsitesManager(){
	global $mysqli;
	$sql = "SELECT * FROM links WHERE siteuserid='".$this->websiteuserid."' ORDER BY orderid ASC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 


		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="normaltext" bgcolor="#FFFF2A">
		  	<td width="10%"><div align="center"><b>No.</b></div></td>
			<td width="30%"><div align="center"><b>Webite Details</b></div></td>
			<td width="10%"><div align="center"><b>Status</b></div></td>
			<td width="15%"><div align="center"><b>Edit Website Details</b></div></td>
			<td width="15%"><div align="center"><b>Modified Date</b></div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$ii = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'">
				<td><div align="center">'.$ii.'</div></td>
				<td><div align="center"><img src="http://open.thumbshots.org/image.aspx?url='.$resultset->company_website.'" width="80" height="80" border = "0"/><br><b>'.$resultset->company_name.'</b><br><b>'.$resultset->company_website.'</b></div></td>';
				
				$this->htmldata .= '<td>';
		
				if($resultset->isactive == 1){
				$statusstyleclass = "greentext";
				$statusstyletext = "Active";
				}else{
				$statusstyleclass = "redtext";
				$statusstyletext = "Deactive";
				}

				$this->htmldata .= '<div align="center" class="'.$statusstyleclass.'">'.$statusstyletext.'</div></a></td><td><div align="center"><a href="siteuser_edit_website_entry.php?id='.$resultset->id.'" class="" >Edit</a></div></td><td><div align="center">'.$resultset->timestamp.'</div></td>
			  </tr>';
			
			$ii++;
		
		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawSiteUserWebsitesManager


	function checkWebsiteEntryExistance(){
	global $mysqli;
	$sql = "SELECT company_website FROM links WHERE id ='".$this->websiteentrid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkWebsiteEntryExistance


	function checkWebsiteEntryExistanceForUser($uid){
	global $mysqli;
	$sql = "SELECT company_website FROM links WHERE id ='".$this->websiteentrid."' AND siteuserid='".$uid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkWebsiteEntryExistanceForUser


	function editWebsiteEntryContent(){
	global $mysqli;
	$sql = "SELECT * FROM links WHERE id ='".$this->websiteentrid."'";
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function editWebsiteEntryContent


} // Class 
?>