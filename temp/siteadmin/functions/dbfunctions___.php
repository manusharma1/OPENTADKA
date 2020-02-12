<?php
class DBfunctions
{
private $pgid, $pgid2, $bchid, $catpgid, $pgsplid, $fsid, $districtid, $centreid, $fspgid, $moduleid, $deleteid, $blockid, $userid, $ctid, $feedid, $testimonialid, $entrid, $fsentrid, $siteuserid, $result, $result2, $result3, $result4, $result5, $result6,$result7, $subresult, $error, $colorchange, $htmldata, $username, $password,$securitysalt;


// Data Security Function
function escape_protection_decode($value) 
{ 
	global $mysqli;

    if (!is_numeric($value)) { 
        $value = htmlspecialchars_decode($value);
    } 
    return $value; 

} // function escape_protection


	function setModule($id){
	$this->moduleid = $id;
	} //function setModule

	function setDelete($id){
	$this->deleteid = $id;
	} //function setDelete

	function setDistrict($id){
	$this->districtid = $id;
	} //function setDistrict

	function setCentre($id){
	$this->centreid = $id;
	} //function setCentre

	function setBlock($id){
	$this->blockid = $id;
	} //function setDistrict

	function setUser($id){
	$this->userid = $id;
	} //function setUser

	function setFeedback($id){
	$this->feedid = $id;
	} //function setFeedback
	
	function setTestimonial($id){
	$this->testimonialid = $id;
	} //function setTestimonial



	function checkModuleExistance(){
	global $mysqli;
	$sql = "SELECT id FROM module WHERE id ='".$this->moduleid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkModuleExistance


	function checkDistrictExistance(){
	global $mysqli;
	$sql = "SELECT id FROM district WHERE id ='".$this->districtid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkDistrictExistance

	
	function checkBlockExistance(){
	global $mysqli;
	$sql = "SELECT id FROM block WHERE id ='".$this->blockid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkBlockExistance


	function checkBatchExistance()
	{
	global $mysqli;
	$sql = "SELECT id FROM batch WHERE id ='".$this->bchid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkBatchExistance


	function checkCentreExistance()
	{
	global $mysqli;
	$sql = "SELECT id FROM centre WHERE id ='".$this->centreid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkCentreExistance

	function checkParticipantExistance(){
	global $mysqli;
	$sql = "SELECT id FROM users WHERE id ='".$this->userid."'";
    if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows; 
	return $row_cnt; 
	}else{
	return 0;
	}
	} //function checkParticipantExistance


	function editBatchDetails(){
	global $mysqli;
	$sql = "SELECT * FROM batch WHERE id ='".$this->bchid."'";
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function editBatchDetails


	function editCentreDetails(){
	global $mysqli;
	$sql = "SELECT c.id as id, c.name as name, b.id as blockid, d.id as districtid, d.division as divisionid  FROM centre c, block b, district d WHERE c.id ='".$this->centreid."' AND c.block = b.id AND d.id=b.pid";
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function editBatchDetails


	function editBatchScheduleDetails($batchscheduleid){
	global $mysqli;
	$sql = "SELECT * FROM batchschedule WHERE id ='".$batchscheduleid."'";
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function editBatchDetails

	
	function editFeedbackDetails(){
	global $mysqli;
	$sql = "SELECT * FROM feedback WHERE id ='".$this->feedid."'";
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function editFeedbackDetails


	function editTestimonialDetails(){
	global $mysqli;
	$sql = "SELECT * FROM testimonial WHERE id ='".$this->testimonialid."'";
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function editTestimonialDetails


	function editModuleDetails(){
	global $mysqli;
	$sql = "SELECT * FROM module WHERE id ='".$this->moduleid."'";
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //editModuleDetails


	function editDistrictDetails(){
	global $mysqli;
	
	$sql = "SELECT * FROM district WHERE id ='".$this->districtid."'";
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function editDistrictDetails


	function editBlockDetails(){
	global $mysqli;
	
	$sql = "SELECT * FROM block WHERE id ='".$this->blockid."'";
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function editBlockDetails

	
	function EditModule($moduleid, $catname, $phase){
	global $mysqli;

	$sql = "UPDATE module SET name = '".$catname."', phase = '".$phase."', modified = NOW() WHERE id = '".$moduleid."'";
	if ($this->result = $mysqli->query($sql)) {
	return 1;
	}else{
	return 0;
	}

	} // function EditModule



	function EditDistrict($districtid,$name,$division){
	global $mysqli;
			
	$sql = "UPDATE district SET  name='".$name."', division='".$division."', modified=NOW() WHERE id = '".$districtid."'";
					
	if ($this->result = $mysqli->query($sql)) {
	return 1;
	}else{
	return 0;
	}

	}// function EditDistrict



	function EditBlock($catparent,$catname,$blockid){
	global $mysqli;
			
	$sql = "UPDATE block SET  name='".$catname."', pid='".$catparent."', modified=NOW() WHERE id = '".$blockid."'";
					
	if ($this->result = $mysqli->query($sql)) {
	return 1;
	}else{
	return 0;
	}

	}// function EditDistrict



	function EditBatch($batchid, $phase, $type, $division, $district, $block){
			global $mysqli;

			$sql="UPDATE batch SET phase='".$phase."', district='".$district."', division='".$division."',type='".$type."', block='".$block."', modified=NOW() WHERE id = '".$batchid."'";
			
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function EditBatch


	function EditCentre($block,$name,$centreid){
			global $mysqli;

			$sql="UPDATE centre SET name='".$name."', block='".$block."', modified=NOW() WHERE id = '".$centreid."'";
			
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function EditBatch




	function EditFeedback($id, $fname, $lname, $designation, $postinglocation, $batchstartdate, $batchenddate, $email, $phone, $district, $block, $feedback){
			global $mysqli;

			$sql="UPDATE feedback SET fname='".$fname."', lname='".$lname."',  designation='".$designation."',  postinglocation='".$postinglocation."',  batchstartdate='".$batchstartdate."',  batchenddate='".$batchenddate."',  email='".$email."',  phone='".$phone."', district='".$district."', block='".$block."', feedback='".$feedback."', modified=NOW() WHERE id = '".$id."'";
			
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function EditFeedback


	function EditTestimonial($id, $fname, $lname, $designation, $postinglocation, $batchstartdate, $batchenddate, $email, $phone, $district, $block, $testimonial){
			global $mysqli;

			$sql="UPDATE testimonial SET fname='".$fname."', lname='".$lname."',  designation='".$designation."',  postinglocation='".$postinglocation."',  batchstartdate='".$batchstartdate."',  batchenddate='".$batchenddate."',  email='".$email."',  phone='".$phone."', district='".$district."', block='".$block."', testimonial='".$testimonial."', modified=NOW() WHERE id = '".$id."'";
			
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function EditTestimonial

	function editParticipantDetails(){
	global $mysqli;
	$sql = "SELECT * FROM users WHERE id ='".$this->userid."'";
	
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function editParticipantDetails


	function checkFacilitatorExistance()
	{
		global $mysqli;
		$sql = "SELECT id FROM users WHERE id ='".$this->userid."' AND usertype='2'";
		if ($this->result = $mysqli->query($sql)) {
		$row_cnt = $this->result->num_rows;
		return $row_cnt;
		}else{
		return 0;
	}
	} //function checkFacilitatorExistance


	function checkLoggedUserExistance()
	{
		global $mysqli;
		$sql = "SELECT id FROM users WHERE id ='".$this->userid."'";
		if ($this->result = $mysqli->query($sql)) {
		$row_cnt = $this->result->num_rows;
		return $row_cnt;
		}else{
		return 0;
	}
	} //function checkLoggedUserExistance

	
	function editFacilitatorDetails(){
	global $mysqli;
	$sql = "SELECT * FROM users WHERE id ='".$this->userid."'";
	
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function editFacilitatorDetails


	function editLoggedUserDetails(){
	global $mysqli;
	$sql = "SELECT * FROM users WHERE id ='".$this->userid."'";
	
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function editFacilitatorDetails


	function ModuleDelete(){
	global $mysqli;
	$sql = "DELETE FROM module WHERE id ='".$this->deleteid."'";
	if ($this->result = $mysqli->query($sql)) {
	return 1;
	}else{
	return 0;
	}

	} //function ModuleDelete


	function DistrictDelete(){
	global $mysqli;
	$sql = "DELETE FROM district WHERE id ='".$this->deleteid."'";
	if ($this->result = $mysqli->query($sql)) {
	return 1;
	}else{
	return 0;
	}

	} //function DistrictDelete


	function BlockDelete(){
	global $mysqli;
	$sql = "DELETE FROM block WHERE id ='".$this->deleteid."'";
	if ($this->result = $mysqli->query($sql)) {
	return 1;
	}else{
	return 0;
	}

	} //function BlockDelete


	function ParticipantDelete(){
	global $mysqli;
	$sql = "DELETE FROM users WHERE id ='".$this->deleteid."' AND usertype='3'";
	if ($this->result = $mysqli->query($sql)) {
	return 1;
	}else{
	return 0;
	}

	} //function ParticipantDelete


	function FacilitatorDelete(){
	global $mysqli;
	$sql = "DELETE FROM users WHERE id ='".$this->deleteid."' AND usertype='2'";
	if ($this->result = $mysqli->query($sql)) {
	return 1;
	}else{
	return 0;
	}

	} //function FacilitatorDelete

	function BatchDelete()
	{
		global $mysqli;
		$sql = "DELETE FROM batch WHERE id ='".$this->deleteid."'";
		if ($this->result = $mysqli->query($sql)) {
		return 1;
		}else{
		return 0;
		}

	} //function BatchDelete


	function FeedbackDelete()
	{
		global $mysqli;
		$sql = "DELETE FROM feedback WHERE id ='".$this->deleteid."'";
		if ($this->result = $mysqli->query($sql)) {
		return 1;
		}else{
		return 0;
		}

	} //function FeedbackDelete

	function TestimonialDelete()
	{
		global $mysqli;
		$sql = "DELETE FROM testimonial WHERE id ='".$this->deleteid."'";
		if ($this->result = $mysqli->query($sql)) {
		return 1;
		}else{
		return 0;
		}

	} //function TestimonialDelete

	function CentreDelete()
	{
		global $mysqli;
		$sql = "DELETE FROM centre WHERE id ='".$this->deleteid."'";
		if ($this->result = $mysqli->query($sql)) {
		return 1;
		}else{
		return 0;
		}

	} //function CentreDelete

	function BatchScheduleDelete()
	{
		global $mysqli;
		$sql = "DELETE FROM batchschedule WHERE id ='".$this->deleteid."'";
		if ($this->result = $mysqli->query($sql)) {
		return 1;
		}else{
		return 0;
		}

	} //function BatchScheduleDelete



	function GetInsertID(){
	global $mysqli;
	return $mysqli->insert_id;
	}


	function ReturnTimeStamp($inputdate){

	$hour = $minute = $second = 0;
	list($year, $month, $day) = explode('-', $inputdate);
	$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
	return $timestamp;
	
	}


	function ReturnTimeStampDDMMYYYY($inputdate){

	$hour = $minute = $second = 0;
	list($day, $month, $year) = explode('-', $inputdate);
	$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
	return $timestamp;
	
	}
	
	
	function InsertNewPage($pagename,$pagetitle,$pagecontent,$pagemetakeys,$pagemetadesc,$parentid)
	{
		global $mysqli;
		$this->error = 0;
		if($parentid==0){
		
			$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM content WHERE pid ='".$parentid."'";
			if ($this->result = $mysqli->query($sql4maximumorderid)) {
			$row4maximumorderid = mysqli_fetch_object($this->result);
			$maximumorderid = $row4maximumorderid->orderid +1;
			/* free result set */
    		//$this->result->close();
			}else{
			$this->error = 1;
			}
		
			$sql = "INSERT INTO content(pid,name,title,data,metakey,metadesc,orderid) VALUES ('0','".$pagename."','".$pagetitle."','".$pagecontent."','".$pagemetakeys."','".$pagemetadesc."','".$maximumorderid."')";
			if ($this->result = $mysqli->query($sql)) {
			/* free result set */
     		//$this->result->close();
			}else{
			$this->error = 1;
			}

		}else{

			$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM content WHERE pid ='".$parentid."'";
			if ($this->result = $mysqli->query($sql4maximumorderid)) {
			$row4maximumorderid = mysqli_fetch_object($this->result);
			$maximumorderid = $row4maximumorderid->orderid + 1;
			/* free result set */
     		//$this->result->close();
			}else{
			$this->error = 1;
			}
		
			$sql = "INSERT INTO content(pid,name,title,data,metakey,metadesc,orderid) VALUES ('".$parentid."','".$pagename."','".$pagetitle."','".$pagecontent."','".$pagemetakeys."','".$pagemetadesc."','".$maximumorderid."')";
			if ($this->result = $mysqli->query($sql)) {
			/* free result set */
     		//$this->result->close();
			}else{
			$this->error = 1;
			}
		}

		if($this->error==1){
		return 0;
		}else{
		return 1;
		}
		

	} // function InsertNewPage



	function MarkParicipantAbsent($id,$absentdate,$addedby)
	{
			global $mysqli;

			$sql = "INSERT INTO absents(userid,absentdate,added,addedby) VALUES ('".$id."','".$absentdate."',NOW(),'".$addedby."')";
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function MarkParicipantAbsent


	function MarkParicipantAbsentByBatch($id,$absentdate,$addedby,$batchid)
	{
			global $mysqli;

			$sql = "INSERT INTO absents(userid,batchid, absentdate,added,addedby) VALUES ('".$id."','".$batchid."','".$absentdate."',NOW(),'".$addedby."')";
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function MarkParicipantAbsentByBatch


	function InsertNewDisctrict($catparent,$catname)
	{
			global $mysqli;

			$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM district WHERE pid ='".$catparent."'";
			if ($this->result = $mysqli->query($sql4maximumorderid)) {
			$row4maximumorderid = mysqli_fetch_object($this->result);
			$maximumorderid = $row4maximumorderid->orderid +1;
			}

			$sql = "INSERT INTO district (division,name,orderid,added,isactive) VALUES ('".$catparent."','".$catname."','".$maximumorderid."',NOW(),'1')";
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function InsertNewDisctrict

	function InsertNewFacilitator($username, $password, $usertype, $fname, $lname, $address1, $address2, $city, $state, $email, $phone, $dob, $qualifications, $subject, $postinglocation, $iscomputersavy, $batchid, $remarks)
	{
			global $mysqli;

			$sql = "INSERT INTO users (username,password,usertype,fname,lname,address1,address2,city,state,email,phone,dob,qualifications,subject,postinglocation,iscomputersavy,batchid,added,isactive,remarks) VALUES ('".$username."','".md5($this->securitysalt.$password.$this->securitysalt)."','".$usertype."','".$fname."','".$lname."','".$address1."','".$address2."','".$city."','".$state."','".$email."','".$phone."','".$dob."','".$qualifications."','".$subject."','".$postinglocation."','".$iscomputersavy."','".$batchid."',NOW(),'1','".$remarks."')";
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function InsertNewFacilitator



	function InsertNewParticipant($usertype, $fname, $lname, $address1, $address2, $city, $state, $email, $phone, $dob, $qualifications, $subject, $postinglocation, $iscomputersavy, $batchid, $remarks)
	{
			global $mysqli;


			$sql4maximumuserregid= "SELECT MAX(userregid) as userregid FROM users WHERE batchid ='".$batchid."'";
			if ($this->result = $mysqli->query($sql4maximumuserregid)) {
			$row4maximumuserregid = mysqli_fetch_object($this->result);
			$maximumuserregid = $row4maximumuserregid->userregid +1;
			}


			$sql = "INSERT INTO users (usertype,userregid,fname,lname,address1,address2,city,state,email,phone,dob,qualifications,subject,postinglocation,iscomputersavy,batchid,added,isactive,remarks) VALUES ('".$usertype."','".$maximumuserregid."','".$fname."','".$lname."','".$address1."','".$address2."','".$city."','".$state."','".$email."','".$phone."','".$dob."','".$qualifications."','".$subject."','".$postinglocation."','".$iscomputersavy."','".$batchid."',NOW(),'1','".$remarks."')";
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function InsertNewParticipant



	function InsertMassParticipants($linemysql){
		
		global $mysqli;
		$sql = "insert into users(id,usertype,fname,lname,address1,address2,city,state,email,phone,dob,qualifications,subject,postinglocation,iscomputersavy,batchid,remarks,added,isactive,addedby) values('','3','".$linemysql.")";
		if ($this->result = $mysqli->query($sql)) {
		return 1;
		}else{
		return 0;
		}
	} //function InsertMassParticipants



	function deleteBatchUsers($userbatchid){
		
		global $mysqli;
		$sql = "DELETE FROM users WHERE batchid = '".$userbatchid."' AND usertype='3'";
		if ($this->result = $mysqli->query($sql)) {
		return 1;
		}else{
		return 0;
		}
	} //function deleteBatchUsers



	function deleteBatchUsersAttendence($userbatchid){
		
		global $mysqli;
		$sql = "DELETE FROM absents WHERE batchid = '".$userbatchid."'";
		if ($this->result = $mysqli->query($sql)) {
		return 1;
		}else{
		return 0;
		}
	} //function deleteBatchUsersAttendence


	function deleteBatchSchedule($id){
		
		global $mysqli;
		$sql = "DELETE FROM batchschedule WHERE id = '".$id."'";
		if ($this->result = $mysqli->query($sql)) {
		return 1;
		}else{
		return 0;
		}
	} //function deleteBatchSchedule


	function deleteBatchSchedulebyBatch(){
		
		global $mysqli;
		$sql = "DELETE FROM batchschedule WHERE batch = '".$this->deleteid."'";
		if ($this->result = $mysqli->query($sql)) {
		return 1;
		}else{
		return 0;
		}
	} //function deleteBatchSchedulebyBatch

	
	function deleteBatchUsersbyBatch(){
		
		global $mysqli;
		$sql = "DELETE FROM users WHERE batchid = '".$this->deleteid."' AND usertype='3'";
		if ($this->result = $mysqli->query($sql)) {
		return 1;
		}else{
		return 0;
		}
	} //function deleteBatchUsersbyBatch


	function InsertBulkParticipantByExcel($insertvalues,$addedby,$userbatchid){
		
		global $mysqli;

		$sql4maximumuserregid= "SELECT MAX(userregid) as userregid FROM users WHERE batchid ='".$userbatchid."'";
		if ($this->result = $mysqli->query($sql4maximumuserregid)) {
		$row4maximumuserregid = mysqli_fetch_object($this->result);
		$maximumuserregid = $row4maximumuserregid->userregid +1;
		}


		$sql = "insert into users(id,usertype,batchid,fname,lname,address1,address2,city,state,email,phone,dob,qualifications,subject,postinglocation,iscomputersavy,remarks,added,isactive,addedby,userregid) values('','3',".$insertvalues.",NOW(),'1','".$addedby."','".$maximumuserregid."')";
		if ($this->result = $mysqli->query($sql)) {
		return 1;
		}else{
		return 0;
		}
	} //function InsertBulkParticipantByExcel


	function getPhaseFromBatch($userbatchid){
	
		global $mysqli;

		$sql= "SELECT phase FROM batch WHERE id ='".$userbatchid."'";
		if ($this->result = $mysqli->query($sql)) {
		$row = mysqli_fetch_object($this->result);
		return $row->phase;
		}



	} // getPhaseFromBatch

	function ExportBulkParticipantByExcel($userbatchid, $phase){
		
		global $mysqli;

			$sql = "SELECT b.id, u.userregid, u.fname,u.lname FROM batch b, users u WHERE u.batchid = '".$userbatchid."' AND b.id=u.batchid ORDER BY u.userregid ASC";
			
			if($phase == 1){
			$sqlfieldname = 'module1,module2,module3,module4,module5,module6,module7';
			}else{
			$sqlfieldname = 'module8,module9,module10,module11,module12,module13,module14';
			}

			$sql2 = "SELECT ".$sqlfieldname." FROM batchschedule WHERE batch='".$userbatchid."'";
			

			if($this->result2 = $mysqli->query($sql2)){ 
			
			if($row2 = mysqli_fetch_object($this->result2)){

				if($phase == 1){
				$module1title = 'Module 1 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module1));
				$module2title = 'Module 2 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module2));
				$module3title = 'Module 3 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module3));
				$module4title = 'Module 4 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module4));
				$module5title = 'Module 5 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module5));
				$module6title = 'Module 6 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module6));
				$module7title = 'Module 7 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module7));
				}else{
				$module8title = 'Module 8 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module8));
				$module9title = 'Module 9 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module9));
				$module10title = 'Module 10 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module10));
				$module11title = 'Module 11 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module11));
				$module12title = 'Module 12 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module12));
				$module13title = 'Module 13 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module13));
				$module14title = 'Module 14 :'. date('d-m-Y', self::ReturnTimeStamp($row2->module14));
				}

			if($phase == '1'){
			$headingarray = array('Batch Code','Unique Participant ID','First Name','Last Name',$module1title,$module2title,$module3title,$module4title,$module5title,$module6title,$module7title);
			$data = '';
			$totalnum = 11;			
			}else{
			$headingarray = array('Batch Code','Unique Participant ID','First Name','Last Name',$module8title,$module9title,$module10title,$module11title,$module12title,$module13title,$module14title);
			$totalnum = 11;			
			}
			}
			
			
			for ($i = 0; $i < $totalnum; $i++) {
				$data .=  $headingarray[$i]. "\t";
			}
			$data .= "\n";

			

			if($this->result = $mysqli->query($sql)){
			
			while($row = mysqli_fetch_object($this->result)) {
				$line = '';
				foreach($row as $value) {
					if ((!isset($value)) OR ($value == "")) {
						$value = "\t"; 
					} else {
						$value = str_replace('"', '""', $value);
						$value = '"' . $value . '"' . "\t"; 
					}
					$line .= $value;
				}
				$data .= trim($line)."\n";
			}
			
			$data = str_replace("\r","",$data);

		return $data;
		}
		}else{
		return 0;
		}
	} //function ExportBulkParticipantByExcel




	function InsertNewBlock($catparent,$catname)
	{
			global $mysqli;

			$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM block WHERE pid ='".$catparent."'";
			if ($this->result = $mysqli->query($sql4maximumorderid)) {
			$row4maximumorderid = mysqli_fetch_object($this->result);
			$maximumorderid = $row4maximumorderid->orderid +1;
			}

			$sql = "INSERT INTO block (pid,name,orderid,added,isactive) VALUES ('".$catparent."','".$catname."','".$maximumorderid."',NOW(),'1')";
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function InsertNewBlock

		
		
	function InsertNewModule($catname,$phase)
	{
			global $mysqli;

			$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM module";
			if ($this->result = $mysqli->query($sql4maximumorderid)) {
			$row4maximumorderid = mysqli_fetch_object($this->result);
			$maximumorderid = $row4maximumorderid->orderid +1;
			}

			$sql = "INSERT INTO module (name,phase,orderid,added,isactive) VALUES ('".$catname."','".$phase."','".$maximumorderid."',NOW(),'1')";
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function InsertNewModule

		
	
	function InsertNewBatch($phase,$type,$division,$district,$block,$centre,$addedby)
	{
			global $mysqli;

			$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM batch";
			if ($this->result = $mysqli->query($sql4maximumorderid)) {
			$row4maximumorderid = mysqli_fetch_object($this->result);
			$maximumorderid = $row4maximumorderid->orderid +1;
			}

			$sql = "INSERT INTO batch(phase,division,type,district,block,centre,orderid,added,addedby,isactive) VALUES ('".$phase."','".$division."','".$type."','".$district."','".$block."','".$centre."','".$maximumorderid."', NOW(), '".$addedby."', '1')";
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function InsertNewBatch


	function InsertNewCentre($block,$name,$addedby)
	{
			global $mysqli;

			$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM centre";
			if ($this->result = $mysqli->query($sql4maximumorderid)) {
			$row4maximumorderid = mysqli_fetch_object($this->result);
			$maximumorderid = $row4maximumorderid->orderid +1;
			}

			$sql = "INSERT INTO centre(name,block,orderid,added,addedby,isactive) VALUES ('".$name."','".$block."','".$maximumorderid."', NOW(), '".$addedby."', '1')";
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function InsertNewCentre


	function InsertNewBatchSchedule($batch,$phase,$facilitator,$startdate)
	{
			global $mysqli;

			$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM batchschedule";
			if ($this->result = $mysqli->query($sql4maximumorderid)) {
			$row4maximumorderid = mysqli_fetch_object($this->result);
			$maximumorderid = $row4maximumorderid->orderid +1;
			}


			if($phase == '1'){
			$modulename = 'module1';
			}else{
			$modulename = 'module8';
			}

			$sql = "INSERT INTO batchschedule(batch,facilitator,startdate,".$modulename.",orderid,added,isactive) VALUES ('".$batch."','".$facilitator."','".$startdate."','".$startdate."','".$maximumorderid."',NOW(),'1')";

			
			if ($this->result = $mysqli->query($sql)) {
			
			$generatedid = self::GetInsertID();

			if($phase == '1'){
			$periodend = 7;
			}else if ($phase == '2'){
			$periodend = 14;
			}

			$datearray = explode("-", $startdate);
			$finalyear = $datearray[0];
			$finalmonth = $datearray[1];
			$finalday = $datearray[2];

			if(count_chars($finalmonth)>1 && $finalmonth<10){ // Clear the difference for 8  && 08, that can cuase problem in the below array
			$finalmonth = substr($finalmonth,-1);
			}


			if(date('L', strtotime($finalyear.'-01-01'))){ // if Leap Year
			$monthdaysarray = array('1'=>'31','2'=>'29','3'=>'31','4'=>'30','5'=>'31','6'=>'30','7'=>'31','8'=>'31','9'=>'30','10'=>'31','11'=>'30','12'=>'31');
			}else{
			$monthdaysarray = array('1'=>'31','2'=>'28','3'=>'31','4'=>'30','5'=>'31','6'=>'30','7'=>'31','8'=>'31','9'=>'30','10'=>'31','11'=>'30','12'=>'31');
			}

			$currentmonthdays = $monthdaysarray[$finalmonth];

			
			if($phase == 1){
			for($i=2;$i<=$periodend;$i++){
			$modulename = 'module'.$i;
			
			$finalday = $finalday+1;
			if($finalday>$currentmonthdays){
			$finalmonth = $finalmonth+1;
			$finalday = '01';
			}


			if($finalmonth>12){
			$finalmonth = '01';
			$finalday = '01';
			$finalyear = $finalyear+1;
			}


			$finaldate = $finalyear.':'.$finalmonth.':'.$finalday;
			$sql2 = "UPDATE batchschedule SET ".$modulename."='".$finaldate."' WHERE id ='".$generatedid."'";
			if ($this->result2 = $mysqli->query($sql2)) {
			}
			if($periodend == 7){
			$sql3 = "UPDATE batchschedule SET enddate ='".$finaldate."' WHERE id ='".$generatedid."'";
			if ($this->result3 = $mysqli->query($sql3)) {
			}
			}

			}
			
			
			}else{

	
			for($i=9;$i<=$periodend;$i++){
			$modulename = 'module'.$i;
			
			$finalday = $finalday+1;
			if($finalday>$currentmonthdays){
			$finalmonth = $finalmonth+1;
			$finalday = '01';
			}


			if($finalmonth>12){
			$finalmonth = '01';
			$finalday = '01';
			$finalyear = $finalyear+1;
			}


			$finaldate = $finalyear.':'.$finalmonth.':'.$finalday;
			$sql2 = "UPDATE batchschedule SET ".$modulename."='".$finaldate."' WHERE id ='".$generatedid."'";
			if ($this->result2 = $mysqli->query($sql2)) {
			}
			
			if($periodend == 14){
			$sql3 = "UPDATE batchschedule SET enddate ='".$finaldate."' WHERE id ='".$generatedid."'";
			if ($this->result3 = $mysqli->query($sql3)) {
			}
			}
			
			}
			}
		
			return 1;
			}else{
			return 0;
			}


	} // function InsertNewBatchSchedule




function EditBatchSchedule($batch,$module,$startdatefinal,$editedby)
	{
			global $mysqli;

			$modulename = 'module'.$module;

			$datearray = explode("-", $startdatefinal);
			
			$finalyear = $datearray[0];
			$finalmonth = $datearray[1];
			$finalday = $datearray[2];

			$finaldate = $finalyear.'-'.$finalmonth.'-'.$finalday;

			$sql = "UPDATE batchschedule SET ".$modulename."='".$finaldate."' WHERE id ='".$batch."'";
			if ($this->result = $mysqli->query($sql)) {
			$this->error = 0;
			}else{
			$this->error = 1;
			}

			if($module == 1 || $module ==8){
			$sql1 = "UPDATE batchschedule SET startdate ='".$finaldate."' WHERE id ='".$batch."'";
			if ($this->result1 = $mysqli->query($sql1)) {
			$this->error = 0;
			}else{
			$this->error = 1;
			}
			}
	
			if($module>=1 && $module<=7){
			$periodend = 7;
			}else if ($module>=8 && $module<=14){
			$periodend = 14;
			}

			$periodstart = $module+1;



			if(count_chars($finalmonth)>1 && $finalmonth<10){ // Clear the difference for 8  && 08, that can cuase problem in the below array
			$finalmonth = substr($finalmonth,-1);
			}

			if(date('L', strtotime($finalyear.'-01-01'))){ // if Leap Year
			$monthdaysarray = array('1'=>'31','2'=>'29','3'=>'31','4'=>'30','5'=>'31','6'=>'30','7'=>'31','8'=>'31','9'=>'30','10'=>'31','11'=>'30','12'=>'31');
			}else{
			$monthdaysarray = array('1'=>'31','2'=>'28','3'=>'31','4'=>'30','5'=>'31','6'=>'30','7'=>'31','8'=>'31','9'=>'30','10'=>'31','11'=>'30','12'=>'31');
			}


			$currentmonthdays = $monthdaysarray[$finalmonth];

			
			for($i=$periodstart;$i<=$periodend;$i++){
			$modulename = 'module'.$i;
			
			$finalday = $finalday+1;
			if($finalday>$currentmonthdays){
			$finalmonth = $finalmonth+1;
			$finalday = '01';
			}


			if($finalmonth>12){
			$finalmonth = '01';
			$finalday = '01';
			$finalyear = $finalyear+1;
			}

			$finaldate = $finalyear.'-'.$finalmonth.'-'.$finalday;

			$sql2 = "UPDATE batchschedule SET ".$modulename."='".$finaldate."' WHERE id ='".$batch."'";
			
			if ($this->result2 = $mysqli->query($sql2)) {
			$this->error = 0;
			}else{
			$this->error = 1;
			}
			
			if($periodend == 7 || $periodend ==14){
			$sql3 = "UPDATE batchschedule SET enddate ='".$finaldate."' WHERE id ='".$batch."'";
			if ($this->result3 = $mysqli->query($sql3)) {
			$this->error = 0;
			}else{
			$this->error = 1;
			}
			}


	  } // for 


		if($this->error == 0){
		return 1;
		}else{
		return 0;
		}

	} // function EditBatchSchedule




	function EditFacilitator($userid,$password,$fname,$lname,$address1,$address2,$city,$state,$email,$phone,$dob,$qualifications,$subject,$postinglocation,$iscomputersavy,$batchid,$remarks)
	{
			global $mysqli;

			if(password==""){
			$sql = "UPDATE users SET  fname='".$fname."', lname='".$lname."', address1='".$address1."', address2='".$address2."', city='".$city."', state='".$state."', email='".$email."', phone='".$phone."', dob='".$dob."', qualifications='".$qualifications."', subject='".$subject."', postinglocation='".$postinglocation."', iscomputersavy='".$iscomputersavy."',remarks='".$remarks."', modified=NOW() WHERE id = '".$userid."'";
			}
			else{
			$sql = "UPDATE users SET  password='".md5($this->securitysalt.$password.$this->securitysalt)."', fname='".$fname."', lname='".$lname."', address1='".$address1."', address2='".$address2."', city='".$city."', state='".$state."', email='".$email."', phone='".$phone."', dob='".$dob."', qualifications='".$qualifications."', subject='".$subject."', postinglocation='".$postinglocation."', iscomputersavy='".$iscomputersavy."',remarks='".$remarks."', modified=NOW() WHERE id = '".$userid."'";
			}
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function EditFacilitator



	function EditLoggedUserProfile($userid,$fname,$lname,$address1,$address2,$city,$state,$email,$phone,$dob,$qualifications,$subject,$postinglocation,$iscomputersavy,$remarks)
	{
			global $mysqli;

			$sql = "UPDATE users SET  fname='".$fname."', lname='".$lname."', address1='".$address1."', address2='".$address2."', city='".$city."', state='".$state."', email='".$email."', phone='".$phone."', dob='".$dob."', qualifications='".$qualifications."', subject='".$subject."', postinglocation='".$postinglocation."', iscomputersavy='".$iscomputersavy."',remarks='".$remarks."', modified=NOW() WHERE id = '".$this->userid."'";
			
			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function EditLoggedUserProfile


	function EditParticipant($userid,$username,$password,$fname,$lname,$address1,$address2,$city,$state,$email,$phone,$dob,$qualifications,$subject,$postinglocation,$iscomputersavy,$batchid,$remarks)
	{
			global $mysqli;

			$sql1 = "SELECT batchid FROM users WHERE id ='".$userid."'";
			if ($result = $mysqli->query($sql1)) {
			$row1 = mysqli_fetch_object($result);
			$batchid2 = $row1->batchid;
			}

			if($batchid != $batchid2){
			$sql4maximumregid = "SELECT MAX(userregid) as userregid FROM users WHERE batchid ='".$batchid2."'";
			if ($result = $mysqli->query($sql4maximumregid)) {
			$row4maximumregid = mysqli_fetch_object($result);
			$maximumregid = $row4maximumregid->userregid +1;
			}
			$sql = "UPDATE users SET  fname='".$fname."', lname='".$lname."', address1='".$address1."', address2='".$address2."', city='".$city."', state='".$state."', email='".$email."', phone='".$phone."', dob='".$dob."', qualifications='".$qualifications."', subject='".$subject."', postinglocation='".$postinglocation."', batchid='".$batchid."', iscomputersavy='".$iscomputersavy."',remarks='".$remarks."', userregid='".$maximumregid."', modified=NOW() WHERE id = '".$userid."'";
			}else{
			$sql = "UPDATE users SET  fname='".$fname."', lname='".$lname."', address1='".$address1."', address2='".$address2."', city='".$city."', state='".$state."', email='".$email."', phone='".$phone."', dob='".$dob."', qualifications='".$qualifications."', subject='".$subject."', postinglocation='".$postinglocation."', batchid='".$batchid."', iscomputersavy='".$iscomputersavy."',remarks='".$remarks."', modified=NOW() WHERE id = '".$userid."'";
			}

			if ($this->result = $mysqli->query($sql)) {
			return 1;
			}else{
			return 0;
			}

	} // function EditParticipant

	function EditCat($catname,$catid)
	{
			global $mysqli;

			$sql = "UPDATE categories  SET name = '".$catname."' WHERE id = '".$catid."'";
	
			if ($this->result = $mysqli->query($sql)) {
			$sql2 = "UPDATE categories_content  SET name = '".$catname."' WHERE pid = '".$catid."'";
			if ($this->result = $mysqli->query($sql2)) {
				$sql = "UPDATE categories_content  SET name = '".$catname."', pid = '".$pid."' WHERE cid = '".$catid."'";
				if ($this->result = $mysqli->query($sql)) {
				return 1;
				}else{
				return 0;
				}
			}
			}
	} // function EditCat


	

	function EditSubCat($catname,$catid,$pid)
	{
			global $mysqli;

			if($pid == "0"){

				$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM categories WHERE pid ='".$pid."'";
				if ($result = $mysqli->query($sql4maximumorderid)) {
				$row4maximumorderid = mysqli_fetch_object($result);
				$maximumorderid = $row4maximumorderid->orderid +1;
				}

			$sql = "UPDATE categories  SET name = '".$catname."', pid = '".$pid."', orderid = '".$maximumorderid."' WHERE id = '".$catid."'";
			}else{
			$sql = "UPDATE categories  SET name = '".$catname."', pid = '".$pid."' WHERE id = '".$catid."'";
			}
			if ($this->result = $mysqli->query($sql)) {
						$sql = "UPDATE categories_content  SET name = '".$catname."', pid = '".$pid."' WHERE cid = '".$catid."'";
						if ($this->result = $mysqli->query($sql)) {
						return 1;
						}else{
						return 0;
						}
			}
		
	} // function EditSubCat



	function GetParticipantName($id)
	{
	global $mysqli;
	$sql = "SELECT fname,lname FROM users WHERE id='".$id."'";
	if ($this->result = $mysqli->query($sql)){
	if($resultset = mysqli_fetch_object($this->result)){
	return $resultset;
	}
	}else{
	return 0;
	}
	} // function GetParticipantName


	function getUniqueUserId($participantid,$batchid)
	{
	global $mysqli;
	$sql = "SELECT id FROM users WHERE userregid='".$participantid."' AND batchid='".$batchid."'";
	if ($this->result = $mysqli->query($sql)){
	if($resultset = mysqli_fetch_object($this->result)){
	return $resultset;
	}
	}else{
	return 0;
	}
	} // function getUniqueUserId

	
	function getAllDistricts()
	{
	global $mysqli;
	$sql = "SELECT id,name FROM district";
	if ($this->result = $mysqli->query($sql)){
	return $this->result;
	}else{
	return 0;
	}
	} // function getAllDistricts


	function getAllModules()
	{
	global $mysqli;
	$sql = "SELECT id,name FROM module";
	if ($this->result = $mysqli->query($sql)){
	return $this->result;
	}else{
	return 0;
	}
	} // function getAllModules

	function getAllFacilitators()
	{
	global $mysqli;
	$sql = "SELECT id,username,fname,lname FROM users WHERE usertype='2'";
	if ($this->result = $mysqli->query($sql)){
	return $this->result;
	}else{
	return 0;
	}
	} // function getAllFacilitators

	function getAllBatches()
	{
	global $mysqli;
	$sql = "SELECT id FROM batch ORDER BY id ASC";
	if ($this->result = $mysqli->query($sql)){
	return $this->result;
	}else{
	return 0;
	}
	} // function getAllBatches


	function getAllBatches4Facilitator($fid)
	{
	global $mysqli;
	$sql = "SELECT DISTINCT b.id FROM batch b, batchschedule bs WHERE (bs.facilitator ='".$fid."' AND b.id = bs.batch) OR b.addedby = '".$fid."' ORDER BY b.id ASC";
	if ($this->result = $mysqli->query($sql)){
	return $this->result;
	}else{
	return 0;
	}
	} // function getAllBatches4Facilitator

	function getAllNonScheduleBatches()
	{
	global $mysqli;
	$sql = "SELECT id FROM batch WHERE id NOT IN(SELECT batch FROM batchschedule) ORDER BY id ASC";
	if ($this->result = $mysqli->query($sql)){
	return $this->result;
	}else{
	return 0;
	}
	} // function getAllNonScheduleBatches

	function getAllNonScheduleBatches4Facilitator($fid)
	{
	global $mysqli;
	$sql = "SELECT id FROM batch WHERE addedby = '".$fid."' AND id NOT IN(SELECT batch FROM batchschedule) ORDER BY id ASC";
	if ($this->result = $mysqli->query($sql)){
	return $this->result;
	}else{
	return 0;
	}
	} // function getAllNonScheduleBatches




	function checkFacilitatorBatchExistance($fid, $batchid)
	{
	global $mysqli;
	$sql = "SELECT DISTINCT b.id FROM batch b, batchschedule bs WHERE (bs.facilitator='".$fid."'  AND bs.batch = '".$batchid."' AND b.id=bs.batch) OR (b.addedby = '".$fid."' AND b.id = '".$batchid."')";
	if ($this->result = $mysqli->query($sql)){
	if($resultset = mysqli_fetch_object($this->result)){
	return $resultset;
	}
	}else{
	return 0;
	}
	} // function checkFacilitatorBatchExistance


	
	function GetBatchIdbyCode($bcodevalue)
	{
	global $mysqli;
	$sql = "SELECT id FROM batch WHERE name='".$bcodevalue."'";
	if ($this->result = $mysqli->query($sql)){
	if($resultset = mysqli_fetch_object($this->result)){
	return $resultset;
	}
	}else{
	return 0;
	}
	} // function GetBatchIdbyCode



	function GetBatchIdbyParticipant($id)
	{
	global $mysqli;
	$sql = "SELECT batchid FROM users WHERE id='".$id."'";
	if ($this->result = $mysqli->query($sql)){
	if($resultset = mysqli_fetch_object($this->result)){
	return $resultset;
	}
	}else{
	return 0;
	}
	} // function GetBatchIdbyParticipant


	function GetBatchIdbyBatchScheduleId($id)
	{
	global $mysqli;
	$sql = "SELECT batch FROM batchschedule WHERE id='".$id."'";
	if ($this->result = $mysqli->query($sql)){
	if($resultset = mysqli_fetch_object($this->result)){
	return $resultset;
	}
	}else{
	return 0;
	}
	} // function GetBatchIdbyBatchScheduleId


	function GetPhaseIdbyBatch($batchid)
	{
	global $mysqli;
	$sql = "SELECT phase FROM batch WHERE id='".$batchid."'";
	if ($this->result = $mysqli->query($sql)){
	if($resultset = mysqli_fetch_object($this->result)){
	return $resultset;
	}
	}else{
	return 0;
	}
	} // function GetPhaseIdbyBatch


	function getFacilitatorBatch($fid)
	{
	global $mysqli;
	$sql = "SELECT b.id FROM batch b, batchschedule bs WHERE bs.facilitator='".$fid."' AND bs.batch=b.id ORDER BY b.id ASC";
	if ($this->result = $mysqli->query($sql)){
	return $this->result;
	}else{
	return 0;
	}
	} // function getFacilitatorBatch

	function getFacilitatorBatchId($fid)
	{
	global $mysqli;
	$sql = "SELECT batch FROM batchschedule where facilitator='".$fid."'";
	if ($this->result = $mysqli->query($sql)){
	while($resultset = mysqli_fetch_object($this->result)){
	$returnoutput .= $resultset->batch .',';
	}
	$returnoutput = substr($returnoutput, 0, -1);  
	return $returnoutput;
	}else{
	return 0;
	}
	} // function getFacilitatorBatchId

	function getAllDistrictsByDivision($id)
	{
	global $mysqli;
	$sql = "SELECT id,name FROM district WHERE division='".$id."'";
	if ($this->result = $mysqli->query($sql)){
	return $this->result;
	}else{
	return 0;
	}
	} // function getAllDistrictsByDivision


	function getDivisionFromDistrictId($id)
	{
	global $mysqli;
	$sql = "SELECT division FROM district WHERE id='".$id."'";
	if ($this->result = $mysqli->query($sql)){
	if($resultset = mysqli_fetch_object($this->result)){
	return $resultset;
	}
	}else{
	return 0;
	}
	} // function getDivisionFromDistrictId


	function getAllBlocksByDistrict($id)
	{
	global $mysqli;
	$sql = "SELECT id,name FROM block WHERE pid='".$id."'";
	if ($this->result = $mysqli->query($sql)){
	return $this->result;
	}else{
	return 0;
	}
	} // function getAllBlocksByDistrict


	function getAllCentresByBlock($id)
	{
	global $mysqli;
	$sql = "SELECT id,name FROM centre WHERE block='".$id."'";
	if ($this->result = $mysqli->query($sql)){
	return $this->result;
	}else{
	return 0;
	}
	} // function getAllBlocksByDistrict



	function getCatParent($id)
	{
	global $mysqli;
	$sql = "SELECT pid FROM categories WHERE id ='".$id."'";
	if ($result = $mysqli->query($sql)){
	$row = mysqli_fetch_object($result);
	return $row->pid;
	}else{
	return 0;
	}
	} // function getCatParent


	
	function setPage($id){
	$this->pgid = $id;
	} //function setPage


	function setBatch($id){
	$this->bchid = $id;
	} //function setBatch

	
	function setBatchSchedule($id){
	$this->bchid = $id;
	} //function setBatch


	function setCatPage($id){
	$this->catpgid = $id;
	} //function setCatPage

	
	function setCat($id){
	$this->ctid = $id;
	} //function setCat

	
	function SetSiteUser($id){
	$this->siteuserid = $id;
	} //function SetSiteUser



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


	function checkFeedbackExistance(){
	global $mysqli;
	$sql = "SELECT fname FROM feedback WHERE id ='".$this->feedid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkFeedbackExistance

	function checkTestimonialExistance(){
	global $mysqli;
	$sql = "SELECT fname FROM testimonial WHERE id ='".$this->testimonialid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkTestimonialExistance


	function checkBatchScheduleExistance(){
	global $mysqli;
	$sql = "SELECT id FROM batchschedule WHERE batch ='".$this->bchid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkBatchScheduleExistance

	
	function checkBatchScheduleExistance2(){
	global $mysqli;
	$sql = "SELECT id FROM batchschedule WHERE id ='".$this->bchid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkBatchScheduleExistance


	function checkBatchExistance4Facilitator($fid,$batchid){
	global $mysqli;
	$sql = "SELECT * FROM batch b, batchschedule bs WHERE (bs.facilitator ='".$fid."' AND bs.batch = '".$batchid."' AND b.id = bs.batch) OR  (b.addedby = '".$fid."' AND b.id='".$batchid."')";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkBatchExistance4Facilitator


	function checkUserExistance4Facilitator($fid,$userid){
	global $mysqli;
	$sql = "SELECT * FROM users WHERE id = ".$userid."  AND batchid IN (SELECT b.id FROM batch b, batchschedule bs WHERE (bs.facilitator ='".$fid."' AND  bs.batch = b.id) OR b.addedby = '".$fid."')";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkBatchExistance4Facilitator

	function checkBatchScheduleExistance4Facilitator($fid){
	global $mysqli;
	$sql = "SELECT id FROM batchschedule  WHERE facilitator ='".$fid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkBatchExistance4Facilitator

	
	function checkUsernameExistance($username){
	global $mysqli;
	$sql = "SELECT username FROM users WHERE username ='".$username."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkUsernameExistance


	
	function checkCatExistance(){
	global $mysqli;
	$sql = "SELECT name FROM categories WHERE id ='".$this->ctid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkCatExistance


	function checkFSExistance(){
	global $mysqli;
	$sql = "SELECT name FROM freestuff WHERE id ='".$this->fsid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkFSExistance

	function checkSPLCATExistance(){
	global $mysqli;
	$sql = "SELECT name FROM splcat WHERE id ='".$this->splcatid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkSPLCATExistance

	function checkCatEntryExistance(){
	global $mysqli;
	$sql = "SELECT company_website FROM links WHERE id ='".$this->entrid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkCatEntryExistance


	function checkFSEntryExistance(){
	global $mysqli;
	$sql = "SELECT website FROM freestuff_links WHERE id ='".$this->fsentrid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkFSEntryExistance

	function checkSPLCATEntryExistance(){
	global $mysqli;
	$sql = "SELECT website FROM splcat_links WHERE id ='".$this->splcatentrid."'";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkFSEntryExistance


	function checkSubPageExistance(){
	global $mysqli;
	$sql = "SELECT name FROM content WHERE id ='".$this->pgid."' AND pid !=0";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkSubPageExistance


	function checkSubPageExistance2(){
	global $mysqli;
	$sql = "SELECT name FROM content2 WHERE id ='".$this->pgid2."' AND pid !=0";
	if ($this->result = $mysqli->query($sql)) {
	$row_cnt = $this->result->num_rows;
	return $row_cnt;
	}else{
	return 0;
	}
	} //function checkSubPageExistance2

	
	function editPageContent(){
	global $mysqli;
	$sql = "SELECT * FROM content WHERE id ='".$this->pgid."'";
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function editPageContent


	function getEditBatchScheduleDate($batchid,$moduleid){
	global $mysqli;
	$sql = "SELECT module".$moduleid." FROM batchschedule WHERE id ='".$batchid."'";
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function editPageContent
	

	function GetSiteUserDetails(){
	global $mysqli;
	$sql = "SELECT contact_name,contact_phone FROM siteusers WHERE id ='".$this->siteuserid."'";
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	return $resultset;
	}else{
	return 0;
	}
	} //function GetSiteUserDetails



	
	function EditPage($pageid,$pagename,$pagetitle,$pagecontent,$pagemetakeys,$pagemetadesc){
	global $mysqli;
	$sql = "UPDATE content SET name='".$pagename."', title='".$pagetitle."', data='".$pagecontent."' , metakey='".$pagemetakeys."', metadesc='".$pagemetadesc."' WHERE id ='".$pageid."'";
	if ($this->result = $mysqli->query($sql)) {
	return 1;
	}else{
	return 0;
	}
	} //function EditPage


	function EditCatPage($pageid,$pagetitle,$pagecontent,$pagemetakeys,$pagemetadesc){
	global $mysqli;
	$sql = "UPDATE categories_content SET title='".$pagetitle."', data='".$pagecontent."' , metakey='".$pagemetakeys."', metadesc='".$pagemetadesc."' WHERE id ='".$pageid."'";
	if ($this->result = $mysqli->query($sql)) {
	return 1;
	}else{
	return 0;
	}
	} //function EditCatPage

	
	function EditSubPage($pageid,$pagename,$pagetitle,$pagecontent,$pagemetakeys,$pagemetadesc,$parentid,$changedparent){
	global $mysqli;
	
	if($changedparent = 1){
		$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM content WHERE pid ='".$parentid."'";
		if ($this->result = $mysqli->query($sql4maximumorderid)) {
		$row4maximumorderid = mysqli_fetch_object($this->result);
		$maximumorderid = $row4maximumorderid->orderid +1;
		}
	$sql = "UPDATE content SET name='".$pagename."', title='".$pagetitle."', data='".$pagecontent."' , metakey='".$pagemetakeys."', metadesc='".$pagemetadesc."' , pid='".$parentid."' , orderid='".$maximumorderid."' WHERE id ='".$pageid."'";	
	}else{
	$sql = "UPDATE content SET name='".$pagename."', title='".$pagetitle."', data='".$pagecontent."' , metakey='".$pagemetakeys."', metadesc='".$pagemetadesc."' , pid='".$parentid."' WHERE id ='".$pageid."'";
	}
		
	if ($this->result = $mysqli->query($sql)) {
	return 1;
	}else{
	return 0;
	}
	} //function EditSubPage


	function DrawCMSManager(){
	global $mysqli;
	$sql = "SELECT * FROM content WHERE pid = '0' ORDER BY orderid ASC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="normaltext" bgcolor="#ECE9D8">
			<td width="50%"><div align="center">Page Details </div></td>
			<td width="20%"><div align="center">Order</div></td>
			<td width="10%"><div align="center">Status</div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){

			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'">
				<td>'.$resultset->name.' - <span class="smallitalic">'.$resultset->title.'</span><br></td>';
				
				$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM content WHERE pid ='0'";
				if ($result4maxorderid = $mysqli->query($sql4maximumorderid)){
				$row4maximumorderid = mysqli_fetch_object($result4maxorderid);
				$maximumorderid = $row4maximumorderid->orderid;
				}

				$sql4minimumorderid = "SELECT MIN(orderid) as orderid FROM content WHERE pid ='0'";
				if ($result4minorderid = $mysqli->query($sql4minimumorderid)){
				$row4minimumorderid = mysqli_fetch_object($result4minorderid);
				$minimumorderid = $row4minimumorderid->orderid;
				}

				$this->htmldata .= '<td><div align="center">';

				$this->htmldata .= '<span class="redtext">--<span>';

				$this->htmldata .='</div></td>';
				
				if($resultset->isactive == 1){
				$statusstyleclass = "greentext";
				$statusstyletext = "Active";
				}else{
				$statusstyleclass = "redtext";
				$statusstyletext = "Deactive";
				}

				$this->htmldata .= '<td><a href="change_status.php?id='.$resultset->id.'"><div align="center" class="'.$statusstyleclass.'">'.$statusstyletext.'</div></a></td>
				<td><div align="center"><a href="edit_page.php?id='.$resultset->id.'">Edit</a></div></td>
				<td><div align="center"><span class="redtext">Not Available<span></div></td>
			  </tr>';


		     $this->DrawCMSManagerSubPage($resultset->id);
		
		} // while
		
		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}
		
		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawCMSManager



 function DrawCMSManagerSubPage($parentid){
	global $mysqli;
	$sql = "SELECT * FROM content WHERE pid='".$parentid."' ORDER BY orderid ASC";
		if ($this->subresult = $mysqli->query($sql)) {
			
			if($this->subresult->num_rows >0){

				while($subresultset = mysqli_fetch_object($this->subresult)){
					
					if($this->colorchange==0){
					$this->colorchange=1;
					$bgstyleclass = "bgnormalgray";
					}else{
					$this->colorchange=0;
					$bgstyleclass = "bgnormalwhite";
					}
			
			
				$this->htmldata .= '<tr class="'.$bgstyleclass.'">
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$subresultset->name.' - <span class="smallitalic">'.$subresultset->title.'</span><br></td>';


				$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM content WHERE pid ='".$parentid."'";
				if ($result4maxorderid = $mysqli->query($sql4maximumorderid)){
				$row4maximumorderid = mysqli_fetch_object($result4maxorderid);
				$maximumorderid = $row4maximumorderid->orderid;
				}

				$sql4minimumorderid = "SELECT MIN(orderid) as orderid FROM content WHERE pid ='".$parentid."'";
				if ($result4minorderid = $mysqli->query($sql4minimumorderid)){
				$row4minimumorderid = mysqli_fetch_object($result4minorderid);
				$minimumorderid = $row4minimumorderid->orderid;
				}

				$this->htmldata .= '<td><div align="center">';

				if($subresultset->orderid!=$minimumorderid){ // We don't need UP for the Mimumum record
				$this->htmldata .= '<a href="change_page_order.php?d=1&id='.$subresultset->id.'" class="ahrefpink">Up</a>';
				}
				
				$this->htmldata .= '  '; 

				if($subresultset->orderid != $maximumorderid){
				$this->htmldata .= '<a href="change_page_order.php?d=2&id='.$subresultset->id.'" class="ahrefpink">Down</a>';
				} // if current orderid is not maximum orderid

				$this->htmldata .='</div></td>';
				

				if($subresultset->isactive == 1){
				$statusstyleclass = "greentext";
				$statusstyletext = "Active";
				}else{
				$statusstyleclass = "redtext";
				$statusstyletext = "Deactive";
				}

				$this->htmldata .= '<td><a href="change_status.php?id='.$subresultset->id.'"><div align="center" class="'.$statusstyleclass.'">'.$statusstyletext.'</div></a></td>
				<td><div align="center"><a href="edit_sub_page.php?id='.$subresultset->id.'" class="ahrefpink">Edit</a></div></td>
				<td><div align="center"><a href="delete_page.php?id='.$subresultset->id.'" class="ahrefpink">Delete</a></div></td>
			    </tr>';

			
			} // While
		
		} // If
	
	} // if

} //function DrawCMSManagerSubPage



function DrawBlockManager($districtid){
	global $mysqli;
	if($districtid==99999){
	$sql = "SELECT * FROM block ORDER BY pid, name, orderid ASC";
	}else{
	$sql = "SELECT * FROM block WHERE pid = '".$districtid."' ORDER BY pid, name, orderid ASC";
	}
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
			<td width="5%"><div align="center">S.No.</div></td>
			<td width="30%"><div align="center">Block Name </div></td>
			<td width="30%"><div align="center">District Name </div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){

			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center">
				<td><b>'.$countno.'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->name).'</b></td>';
				
				$sql2 = "SELECT name FROM district WHERE id ='".$resultset->pid."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}
				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->name).'</b></td>';

				$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM categories WHERE pid ='0'";
				if ($result4maxorderid = $mysqli->query($sql4maximumorderid)){
				$row4maximumorderid = mysqli_fetch_object($result4maxorderid);
				$maximumorderid = $row4maximumorderid->orderid;
				}

				$sql4minimumorderid = "SELECT MIN(orderid) as orderid FROM categories WHERE pid ='0'";
				if ($result4minorderid = $mysqli->query($sql4minimumorderid)){
				$row4minimumorderid = mysqli_fetch_object($result4minorderid);
				$minimumorderid = $row4minimumorderid->orderid;
				}

		
				$this->htmldata .= '<td><div align="center"><a href="edit_block.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_block.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';

		$countno++;
		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawBlockManager



function DrawFacilitatorManager(){
	global $mysqli;
	$sql = "SELECT * FROM users WHERE usertype='2' ORDER BY fname,lname ASC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="normaltext">
			<td width="20%"><div align="center">Facilitator Name </div></td>
			<td width="20%"><div align="center">Batch</div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){

			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'"><td><b>'.self::escape_protection_decode($resultset->fname).' '.self::escape_protection_decode($resultset->lname).'</b></td>';
				
				$batchnamestring = "";
			
				$sql2 = "SELECT b.id FROM batch b, batchschedule bs WHERE bs.facilitator ='".$resultset->id."' AND b.id = bs.batch";
					if ($this->result2 = $mysqli->query($sql2)) {
					while($resultset2 = mysqli_fetch_object($this->result2)){
					$batchnamestring .= $resultset2->id.' | ';
					}
					}
				
				$this->htmldata .= '<td><b>'.self::escape_protection_decode($batchnamestring).'</b></td>';

						
				$this->htmldata .= '<td><div align="center"><a href="edit_facilitator.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_facilitator.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';

		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawFacilitatorManager


function DrawParticipantManager($batchid){
	global $mysqli;
	
	if($batchid==99999){
	$sql = "SELECT * FROM users WHERE usertype='3' ORDER BY batchid, userregid, fname,lname ASC";
	}else{
	$sql = "SELECT * FROM users WHERE batchid = '".$batchid."' AND usertype='3' ORDER BY batchid, userregid, fname,lname ASC";
	}
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
		  	<td width="5%"><div align="center">S.No.</div></td>
			<td width="15%"><div align="center">Participant Name </div></td>
			<td width="20%"><div align="center">Participant Registration Number</div></td>
			<td width="10%"><div align="center">Facilitator Name </div></td>
			<td width="10%"><div align="center">Batch Code</div></td>
			<td width="10%"><div align="center">Phase</div></td>
			<td width="10%"><div align="center">View Attendence</div></td>
			<td width="10%"><div align="center">Mark Absent</div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}


				$sql2 = "SELECT id,phase FROM batch WHERE id ='".$resultset->batchid."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}

				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center">
				<td><b>'.$countno.'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->fname).' '.self::escape_protection_decode($resultset->lname).'</b></td>';

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->id).':'.$resultset->userregid.'</b></td>';
			
				$sql3 = "SELECT u.fname, u.lname FROM users u , batchschedule bs WHERE bs.batch ='".$resultset->batchid."' AND bs.facilitator = u.id AND u.usertype='2'";
					if ($this->result3 = $mysqli->query($sql3)) {
					$resultset3 = mysqli_fetch_object($this->result3);
					}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset3->fname).' '.self::escape_protection_decode($resultset3->lname).'</b></td>';


				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->id).'</b></td>';

				if($resultset2->id == 1){
				$phasetext = "Phase 1";
				}else{
				$phasetext = "Phase 2";
				}

				$this->htmldata .= '<td><b>'.$phasetext.'</b></td>';
				$this->htmldata .= '<td><div align="center"><a href="view_participant_attendence.php?id='.$resultset->batchid.'&uid='.$resultset->id.'" class="" >View Participant Attendence</a></div></td>';
				$this->htmldata .= '<td><div align="center"><a href="mark_participant_attendence.php?id='.$resultset->batchid.'&uid='.$resultset->id.'" class="" >Mark Participant Attendence</a></div></td>';
						
				$this->htmldata .= '<td><div align="center"><a href="edit_participant.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_participant.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';
		
		$countno++;
		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawParticipantManager



function DrawBatchParticipantManager($id){
	global $mysqli;
	$sql = "SELECT * FROM users WHERE usertype='3' AND batchid = '".$id."' ORDER BY userregid, fname,lname ASC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
			<td width="10%"><div align="center">Participant Name </div></td>
			<td width="10%"><div align="center">Participant Registration Number</div></td>
			<td width="10%"><div align="center">Facilitator Name </div></td>
			<td width="10%"><div align="center">Batch Code</div></td>
			<td width="10%"><div align="center">View Attendence</div></td>
			<td width="10%"><div align="center">Manage Attendence</div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){

			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		



				$sql2 = "SELECT id FROM batch WHERE id ='".$resultset->batchid."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}

				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center"><td align="left"><b>'.self::escape_protection_decode($resultset->fname).' '.self::escape_protection_decode($resultset->lname).'</b></td>';

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->id).':'.$resultset->userregid.'</b></td>';
			
				$sql3 = "SELECT u.fname, u.lname FROM users u , batchschedule bs WHERE bs.batch ='".$resultset->batchid."' AND bs.facilitator = u.id AND u.usertype='2'";
					if ($this->result3 = $mysqli->query($sql3)) {
					$resultset3 = mysqli_fetch_object($this->result3);
					}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset3->fname).' '.self::escape_protection_decode($resultset3->lname).'</b></td>';



				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->id).'</b></td>';
				$this->htmldata .= '<td><div align="center"><a href="view_participant_attendence.php?id='.$resultset->batchid.'&uid='.$resultset->id.'" class="" >View Participant Attendence</a></div></td>';
				$this->htmldata .= '<td><div align="center"><a href="mark_participant_attendence.php?id='.$resultset->batchid.'&uid='.$resultset->id.'" class="" >Mark Participant Attendence</a></div></td>';
						
				$this->htmldata .= '<td><div align="center"><a href="edit_participant.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_participant.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';

		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="8" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawBatchParticipantManager



function DrawBatchParticipantManager4Facilitator($id){
	global $mysqli;
	$sql = "SELECT * FROM users WHERE usertype='3' AND batchid = '".$id."' ORDER BY userregid, fname,lname ASC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
			<td width="10%"><div align="center">Participant Name </div></td>
			<td width="10%"><div align="center">Participant Registration Number</div></td>
			<td width="10%"><div align="center">Facilitator Name </div></td>
			<td width="10%"><div align="center">Batch Code</div></td>
			<td width="10%"><div align="center">View Attendence</div></td>
			<td width="10%"><div align="center">Manage Attendence</div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){

			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		



				$sql2 = "SELECT id FROM batch WHERE id ='".$resultset->batchid."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}

				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center"><td align="left"><b>'.self::escape_protection_decode($resultset->fname).' '.self::escape_protection_decode($resultset->lname).'</b></td>';

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->id).':'.$resultset->userregid.'</b></td>';
			
				$sql3 = "SELECT u.fname, u.lname FROM users u , batchschedule bs WHERE bs.batch ='".$resultset->batchid."' AND bs.facilitator = u.id AND u.usertype='2'";
					if ($this->result3 = $mysqli->query($sql3)) {
					$resultset3 = mysqli_fetch_object($this->result3);
					}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset3->fname).' '.self::escape_protection_decode($resultset3->lname).'</b></td>';



				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->id).'</b></td>';
				$this->htmldata .= '<td><div align="center"><a href="view_participant_attendence4facilitator.php?id='.$resultset->batchid.'&uid='.$resultset->id.'" class="" >View Participant Attendence</a></div></td>';
				$this->htmldata .= '<td><div align="center"><a href="mark_participant_attendence4facilitator.php?id='.$resultset->batchid.'&uid='.$resultset->id.'" class="" >Mark Participant Attendence</a></div></td>';
						
				$this->htmldata .= '<td><div align="center"><a href="edit_participant4facilitator.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_participant4facilitator.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';

		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="8" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawBatchParticipantManager4Facilitator


function DrawParticipantManager4Facilitator($batchid,$fid){
	global $mysqli;
	if($batchid==99999){
	$sql = "SELECT *, u.id as id FROM users u, batchschedule bs WHERE u.usertype='3' AND u.batchid = bs.batch AND bs.facilitator = '".$fid."' ORDER BY batchid, userregid, fname, lname ASC";
	}else{
	$sql = "SELECT * , u.id as id FROM users u, batchschedule bs WHERE u.usertype='3' AND batchid IN(".$batchid.") AND u.batchid = bs.batch AND bs.facilitator = '".$fid."' ORDER BY batchid, userregid, fname, lname ASC";
	}

	$this->colorchange = 0;
			if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
		  	<td width="5%"><div align="center">S.No.</div></td>
			<td width="15%"><div align="center">Participant Name </div></td>
			<td width="20%"><div align="center">Participant Registration Number</div></td>
			<td width="10%"><div align="center">Facilitator Name </div></td>
			<td width="10%"><div align="center">Batch Code</div></td>
			<td width="10%"><div align="center">Phase</div></td>
			<td width="10%"><div align="center">View Attendence</div></td>
			<td width="10%"><div align="center">Mark Absent</div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}


				$sql2 = "SELECT id,phase FROM batch WHERE id ='".$resultset->batchid."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}

				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center">
				<td><b>'.$countno.'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->fname).' '.self::escape_protection_decode($resultset->lname).'</b></td>';

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->id).':'.$resultset->userregid.'</b></td>';
			
				$sql3 = "SELECT u.fname, u.lname FROM users u , batchschedule bs WHERE bs.batch ='".$resultset->batchid."' AND bs.facilitator = u.id AND u.usertype='2'";
					if ($this->result3 = $mysqli->query($sql3)) {
					$resultset3 = mysqli_fetch_object($this->result3);
					}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset3->fname).' '.self::escape_protection_decode($resultset3->lname).'</b></td>';


				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->id).'</b></td>';

				if($resultset2->id == 1){
				$phasetext = "Phase 1";
				}else{
				$phasetext = "Phase 2";
				}

				$this->htmldata .= '<td><b>'.$phasetext.'</b></td>';
				$this->htmldata .= '<td><div align="center"><a href="view_participant_attendence4facilitator.php?id='.$resultset->batchid.'&uid='.$resultset->id.'" class="" >View Participant Attendence</a></div></td>';
				$this->htmldata .= '<td><div align="center"><a href="mark_participant_attendence4facilitator.php?id='.$resultset->batchid.'&uid='.$resultset->id.'" class="" >Mark Participant Absent</a></div></td>';
						
				$this->htmldata .= '<td><div align="center"><a href="edit_participant4facilitator.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_participant4facilitator.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';
		
		$countno++;
		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawParticipantManager4Facilitator



function DrawBatchScheduleManager(){
	global $mysqli;
	$sql = "SELECT * FROM batchschedule ORDER BY ORDER BY batch,startdate DESC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
			<td width="5%"><div align="center">S.No.</div></td>
			<td width="10%"><div align="center">Batch Code</div></td>
			<td width="10%"><div align="center">Phase</div></td>
			<td width="20%"><div align="center">Module Details</div></td>
			<td width="20%"><div align="center">Facilitator Name </div></td>
			<td width="10%"><div align="center">Start Date</div></td>
			<td width="10%"><div align="center">End Date</div></td>
			<td width="10%"><div align="center">View Batch Attendence</div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			
			$countno = 1;

			while($resultset = mysqli_fetch_object($this->result)){

				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		

			
				$sql2 = "SELECT id,phase FROM batch WHERE id ='".$resultset->batch."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center">
				<td><b>'.$countno.'</b></td>
				<td><b>'.self::escape_protection_decode($resultset2->id).'</b></td>';
				
				
				if($resultset2->phase=='1'){
				$phasename = 'Phase 1';
				}else{
				$phasename = 'Phase 2';
				}

				$this->htmldata .= '<td><b>'.$phasename.'</b></td>';
				
				$this->htmldata .= '<td><div align="center"><a href="show_module_details_of_batch.php?id='.$resultset->batch.'" class="" >Show Modules Schedule</a></td>';

				$sql4 = "SELECT u.fname, u.lname FROM users u, batchschedule bs WHERE bs.facilitator=u.id AND bs.batch ='".$resultset->batch."'";
					if ($this->result4 = $mysqli->query($sql4)) {
					$resultset4 = mysqli_fetch_object($this->result4);
					}


				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset4->fname).' '.self::escape_protection_decode($resultset4->lname).'</b></td>';


				$this->htmldata .= '<td><b>'.self::escape_protection_decode(date('d-m-Y',self::ReturnTimeStamp($resultset->startdate))).'</b></td>';
				$this->htmldata .= '<td><b>'.self::escape_protection_decode(date('d-m-Y',self::ReturnTimeStamp($resultset->enddate))).'</b></td>';
				$this->htmldata .= '<td><a href="view_batch_attendence.php?id='.$resultset->batch.'" class="" >View Attendence</a></td>';
						
				$this->htmldata .= '<td><div align="center"><a href="edit_batch_schedule.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_batch_schedule.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';

		$countno++;
		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawBatchScheduleManager




function DrawBatchScheduleManager4Facilitator($fid){
	global $mysqli;
	$sql = "SELECT DISTINCT * FROM batchschedule WHERE facilitator = '".$fid."' ORDER BY batch,startdate DESC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
			<td width="5%"><div align="center">S.No.</div></td>
			<td width="10%"><div align="center">Batch Code</div></td>
			<td width="10%"><div align="center">Phase</div></td>
			<td width="20%"><div align="center">Module Details</div></td>
			<td width="20%"><div align="center">Facilitator Name </div></td>
			<td width="10%"><div align="center">Start Date</div></td>
			<td width="10%"><div align="center">End Date</div></td>
			<td width="10%"><div align="center">View Batch Attendence</div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			
			$countno = 1;

			while($resultset = mysqli_fetch_object($this->result)){

				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		

			
				$sql2 = "SELECT id,phase FROM batch WHERE id ='".$resultset->batch."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center">
				<td><b>'.$countno.'</b></td>
				<td><b>'.self::escape_protection_decode($resultset2->id).'</b></td>';
				
				
				if($resultset2->phase=='1'){
				$phasename = 'Phase 1';
				}else{
				$phasename = 'Phase 2';
				}

				$this->htmldata .= '<td><b>'.$phasename.'</b></td>';
				
				$this->htmldata .= '<td><div align="center"><a href="show_module_details_of_batch4facilitator.php?id='.$resultset->batch.'" class="" >Show Modules Schedule</a></td>';

				$sql4 = "SELECT u.fname, u.lname FROM users u, batchschedule bs WHERE bs.facilitator=u.id AND bs.batch ='".$resultset->batch."'";
					if ($this->result4 = $mysqli->query($sql4)) {
					$resultset4 = mysqli_fetch_object($this->result4);
					}


				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset4->fname).' '.self::escape_protection_decode($resultset4->lname).'</b></td>';


				$this->htmldata .= '<td><b>'.self::escape_protection_decode(date('d-m-Y',self::ReturnTimeStamp($resultset->startdate))).'</b></td>';
				$this->htmldata .= '<td><b>'.self::escape_protection_decode(date('d-m-Y',self::ReturnTimeStamp($resultset->enddate))).'</b></td>';
				$this->htmldata .= '<td><a href="view_batch_attendence4facilitator.php?id='.$resultset->batch.'" class="" >View Attendence</a></td>';
						
				$this->htmldata .= '<td><div align="center"><a href="edit_batch_schedule4facilitator.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_batch_schedule4facilitator.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';

		$countno++;
		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawBatchScheduleManager4Facilitator


function DrawBatchModuleScheduleManager($id){
	global $mysqli;
	$sql = "SELECT * FROM batchschedule WHERE batch = '".$id."' ORDER BY orderid ASC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred" align="center">
		  	<td width="5%"><div align="center">S.No.</div></td>
			<td width="20%"><div align="center">Module Name </div></td>
			<td width="20%"><div align="center">Date</div></td>
			<td width="20%"><div align="center">Day</div></td>			
			<td width="20%"><div align="center">Edit Schedule</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			

			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}

				$sql1= "SELECT phase FROM batch WHERE id ='".$id."'";
		
				if ($this->result1 = $mysqli->query($sql1)) {
				$resultset1 = mysqli_fetch_object($this->result1);
				}

				$sql2 = "SELECT name,phase FROM module WHERE phase ='".$resultset1->phase."' ORDER BY orderid ASC";
					
					
					if($resultset1->phase=='1'){
					$ii = 1;
					}else{
					$ii = 8;
					}

					if ($this->result2 = $mysqli->query($sql2)) {

					$countno = 1;

					while($resultset2 = mysqli_fetch_object($this->result2)){
					$module = 'module'.$ii;

					$timestamp = self::ReturnTimeStamp($resultset->$module);
					
					$moduleformatteddate = date('d-M-Y',$timestamp);
					$moduleformattedday = date('l',$timestamp);

					$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center">';
					$this->htmldata .= '<td><b>'.$countno.'</b></td>';
					$this->htmldata .= '<td align="left"><b>'.self::escape_protection_decode($resultset2->name).'</b></td>';
					$this->htmldata .= '<td><b>'.$moduleformatteddate.'</b></td>';
						
						if($moduleformattedday=="Sunday"){
						$sundayclass="redtext";
						}else{
						$sundayclass="";
						}

					$this->htmldata .= '<td class="'.$sundayclass.'"><b>'.$moduleformattedday.'</b></td>';
					$this->htmldata .= '<td><div align="center"><a href="edit_module_schedule.php?id='.$resultset->id.'&mod='.$ii.'&bid='.$id.'" class="" >Edit</a></div></td>';
					$this->htmldata .= '</tr>';
					$ii++;

					$countno++;

					}
					}

		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawBatchModuleScheduleManager



function DrawBatchModuleScheduleManager4Facilitator($id){
	global $mysqli;
	$sql = "SELECT * FROM batchschedule WHERE batch = '".$id."' ORDER BY orderid ASC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred" align="center">
		  	<td width="5%"><div align="center">S.No.</div></td>
			<td width="20%"><div align="center">Module Name </div></td>
			<td width="20%"><div align="center">Date</div></td>
			<td width="20%"><div align="center">Day</div></td>			
			<td width="20%"><div align="center">Edit Schedule</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			

			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}

				$sql1= "SELECT phase FROM batch WHERE id ='".$id."'";
		
				if ($this->result1 = $mysqli->query($sql1)) {
				$resultset1 = mysqli_fetch_object($this->result1);
				}

				$sql2 = "SELECT name,phase FROM module WHERE phase ='".$resultset1->phase."' ORDER BY orderid ASC";
					
					
					if($resultset1->phase=='1'){
					$ii = 1;
					}else{
					$ii = 8;
					}

					if ($this->result2 = $mysqli->query($sql2)) {

					$countno = 1;

					while($resultset2 = mysqli_fetch_object($this->result2)){
					$module = 'module'.$ii;

					$timestamp = self::ReturnTimeStamp($resultset->$module);
					
					$moduleformatteddate = date('d-M-Y',$timestamp);
					$moduleformattedday = date('l',$timestamp);

					$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center">';
					$this->htmldata .= '<td><b>'.$countno.'</b></td>';
					$this->htmldata .= '<td align="left"><b>'.self::escape_protection_decode($resultset2->name).'</b></td>';
					$this->htmldata .= '<td><b>'.$moduleformatteddate.'</b></td>';
						
						if($moduleformattedday=="Sunday"){
						$sundayclass="redtext";
						}else{
						$sundayclass="";
						}

					$this->htmldata .= '<td class="'.$sundayclass.'"><b>'.$moduleformattedday.'</b></td>';
					$this->htmldata .= '<td><div align="center"><a href="edit_module_schedule4facilitator.php?id='.$resultset->id.'&mod='.$ii.'&bid='.$id.'" class="" >Edit</a></div></td>';
					$this->htmldata .= '</tr>';
					$ii++;

					$countno++;

					}
					}

		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawBatchModuleScheduleManager4Facilitator


function DrawBatchAttendenceManager($id){
	global $mysqli;
	
	$sql4batch = "SELECT b.id as id, d.name as districtname, bl.name as blockname FROM batch b, district d, block bl WHERE b.id ='".$id."' AND b.district=d.id AND b.block=bl.id";
	if ($result4batch = $mysqli->query($sql4batch)) {
	$resultset4batch = mysqli_fetch_object($result4batch);
	}

	// Start Drawing 

	$this->htmldata = '<p align="right"><input type="button" name="Print" onclick="JavaScript:print();" value="   Print   ">&nbsp;&nbsp;&nbsp;&nbsp;</p>';
	$this->htmldata .= '<table width="25%" align="center"><tr><td><span class="bheading">Batch Code: <span></td><td><span class="bheading">'.$resultset4batch->id.'</span></td></tr><tr><td><span class="bheading">District : <span></td><td><span class="bheading">'.$resultset4batch->districtname.'</span></td></tr><tr><td><span class="bheading">Block : </td><td><span class="bheading">'.$resultset4batch->blockname.'</span></td></tr></table><hr/>';

	
	$sql = "SELECT phase FROM batch WHERE id='".$id."'";
	
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	}


	$row_cnt = $this->result->num_rows;
	if($row_cnt>0){


	$sql2 = "SELECT name from module where phase = '".$resultset->phase."' ORDER BY orderid ASC";
	if($this->result2 = $mysqli->query($sql2)){
		

		
	$this->htmldata .= '<table width="100%"  border="0">
	<tr class="normaltext" bgcolor="#FFFF7F">';

	$this->htmldata .= '<td width="5%"><div align="center">S.No.</div></td>';
	$this->htmldata .= '<td width="10%"><div align="center">Participant Name</div></td>';
	$this->htmldata .= '<td width="10%"><div align="center">Participant ID</div></td>';
	while($resultset2 = mysqli_fetch_object($this->result2)){	
	$this->htmldata .= '<td width="10%"><div align="center">'.$resultset2->name.'</div></td>';

	}
		 

	if($resultset->phase=='1'){
	$startcount = 1;
	$endcount = 7;
	}else{
	$startcount = 8;
	$endcount = 14;
	}
	
	
	if($resultset->phase == 1){
	$sqlfieldname = 'module1,module2,module3,module4,module5,module6,module7';
	}else{
	$sqlfieldname = 'module8,module9,module10,module11,module12,module13,module14';
	}

	$sql3 = "SELECT ".$sqlfieldname." from batchschedule WHERE batch='".$id."'";
	if($this->result3 = $mysqli->query($sql3)){
	$resultset3 = mysqli_fetch_object($this->result3);
	}

	$this->htmldata .= '</tr><tr class="normaltext">';
	$this->htmldata .= '<td width="5%"><div align="center"></div></td>';
	$this->htmldata .= '<td width="10%"><div align="center"></div></td>';
	$this->htmldata .= '<td width="10%"><div align="center"></div></td>';

		

	for($ii=$startcount;$ii<=$endcount;$ii++){

	$modulename = 'module'.$ii;
	$this->htmldata .= '<td width="10%" bgcolor="#FFFFAA"><div align="center">'.date('d-m-Y',self::ReturnTimeStamp($resultset3->$modulename)).'</div></td>';
	}
		
		 

	$this->htmldata .= '</tr><tr><td colspan="10"><hr/></td></tr>';
	
	
	$this->colorchange = 0;
	$sql4 = "SELECT * from users WHERE batchid='".$id."' ORDER BY userregid ASC";
	if($this->result4 = $mysqli->query($sql4)){
	
	if($this->result4->num_rows >0){
	$countno = 1;
	while($resultset4 = mysqli_fetch_object($this->result4)){

	if($this->colorchange==0){
	$this->colorchange=1;
	$bgstyleclass = "bgnormalgray";
	}else{
	$this->colorchange=0;
	$bgstyleclass = "bgnormalwhite";
	}

    $this->htmldata .= '<tr class="'.$bgstyleclass.'">';
	$this->htmldata .= '<td align="center" class="normaltext">'.$countno.'</td>';
	$this->htmldata .= '<td align="center" class="normaltext">'.$resultset4->fname.' '.$resultset4->lname.'</td>';
	$this->htmldata .= '<td align="center">'.$resultset4batch->id.':'.$resultset4->userregid.'</td>';
	
	
	for($ii=$startcount;$ii<=$endcount;$ii++){
	$modulename = 'module'.$ii;
 	$sql5 = "SELECT * FROM absents a, batchschedule bc WHERE a.userid='".$resultset4->id."' AND a.absentdate = bc.".$modulename." AND a.batchid='".$id."' AND a.batchid=bc.batch";
	if($this->result5 = $mysqli->query($sql5)){
	$resultset5 = mysqli_fetch_object($this->result5);
	if(!empty($resultset5)){
	$this->htmldata .= '<td><div align="center" class="redtext">Absent</div></td>';
	}else{
	$this->htmldata .= '<td><div align="center">Present</div></td>';
	}
	
	
	
	}
	

	
	}

	$this->htmldata .= '</tr><tr class="normaltext">';

	$countno++;
	}
	}else{

	    $this->htmldata .= '<tr><td colspan ="10" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';

	}
	}
	
	}

			
	$this->htmldata .= '</table>';
   
   
   }else{ //if row count > 0
   
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';  
   }

	return $this->htmldata;
  
  } //function DrawBatchAttendenceManager





function DrawBatchParticipantAttendenceManagerMarker($id,$uid){
	global $mysqli;
	
		
	$sql4batch = "SELECT b.id as id, d.name as districtname, bl.name as blockname FROM batch b, district d, block bl WHERE b.id ='".$id."' AND b.district=d.id AND b.block=bl.id";
	if ($result4batch = $mysqli->query($sql4batch)) {
	$resultset4batch = mysqli_fetch_object($result4batch);
	}

	// Start Drawing 

	$this->htmldata = '<p align="right"><input type="button" name="Print" onclick="JavaScript:print();" value="   Print   ">&nbsp;&nbsp;&nbsp;&nbsp;</p>';
	$this->htmldata .= '<table width="25%" align="center"><tr><td><span class="bheading">Batch Code: <span></td><td><span class="bheading">'.$resultset4batch->id.'</span></td></tr><tr><td><span class="bheading">District : <span></td><td><span class="bheading">'.$resultset4batch->districtname.'</span></td></tr><tr><td><span class="bheading">Block : </td><td><span class="bheading">'.$resultset4batch->blockname.'</span></td></tr></table><hr/>';
	
	$sql = "SELECT phase FROM batch WHERE id='".$id."'";
	
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	}


		$row_cnt = $this->result->num_rows;
		if($row_cnt>0){

		

	$sql2 = "SELECT name from module where phase = '".$resultset->phase."' ORDER BY orderid ASC";
	if($this->result2 = $mysqli->query($sql2)){
		

		
	$this->htmldata .= '<table width="100%"  border="0">
	<tr class="normaltext" bgcolor="#FFFF7F">';

	$this->htmldata .= '<td width="10%"><div align="center">Participant Name</div></td>';
	$this->htmldata .= '<td width="10%"><div align="center">Participant ID</div></td>';
	while($resultset2 = mysqli_fetch_object($this->result2)){	
	$this->htmldata .= '<td width="10%"><div align="center">'.$resultset2->name.'</div></td>';

	}


	if($resultset->phase=='1'){
	$startcount = 1;
	$endcount = 7;
	}else{
	$startcount = 8;
	$endcount = 14;
	}
	
	
	
	if($resultset->phase == 1){
	$sqlfieldname = 'module1,module2,module3,module4,module5,module6,module7';
	}else{
	$sqlfieldname = 'module8,module9,module10,module11,module12,module13,module14';
	}

	$sql3 = "SELECT ".$sqlfieldname." from batchschedule WHERE batch='".$id."'";
	if($this->result3 = $mysqli->query($sql3)){
	$resultset3 = mysqli_fetch_object($this->result3);
	}

	$this->htmldata .= '</tr><tr class="normaltext">';

	$this->htmldata .= '<td width="10%"><div align="center"></div></td>';
	$this->htmldata .= '<td width="10%"><div align="center"></div></td>';

		

	for($ii=$startcount;$ii<=$endcount;$ii++){

	$modulename = 'module'.$ii;
	$this->htmldata .= '<td width="10%" bgcolor="#FFFFAA"><div align="center">'.date('d-m-Y',self::ReturnTimeStamp($resultset3->$modulename)).'</div></td>';
	}
		
		 

		 $this->htmldata .= '</tr><tr><td colspan="8"><hr/></td></tr>';
	
	
	$this->colorchange = 0;
	$sql4 = "SELECT * from users WHERE id='".$uid."'";
	if($this->result4 = $mysqli->query($sql4)){
	if($this->result4->num_rows >0){
	
	while($resultset4 = mysqli_fetch_object($this->result4)){

	if($this->colorchange==0){
	$this->colorchange=1;
	$bgstyleclass = "bgnormalgray";
	}else{
	$this->colorchange=0;
	$bgstyleclass = "bgnormalwhite";
	}

    $this->htmldata .= '<tr class="'.$bgstyleclass.'">';

	$this->htmldata .= '<td align="center" class="normaltext">'.$resultset4->fname.' '.$resultset4->lname.'</td>';
	$this->htmldata .= '<td align="center">'.$resultset4batch->id.':'.$resultset4->userregid.'</td>';
	
	
	for($ii=$startcount;$ii<=$endcount;$ii++){
	$modulename = 'module'.$ii;
 	$sql5 = "SELECT * FROM absents a, batchschedule bc WHERE a.userid='".$resultset4->id."' AND a.absentdate = bc.".$modulename." AND a.batchid='".$id."' AND a.batchid=bc.batch";
	if($this->result5 = $mysqli->query($sql5)){
	$resultset5 = mysqli_fetch_object($this->result5);
	if(!empty($resultset5)){
	$this->htmldata .= '<td><div align="center" class="redtext">Absent<br/><form name="attendencemarker" method="POST"><input type="Submit" name="Submit" value="Mark Present"><input type="hidden" name="module" value="'.$resultset3->$modulename.'"><input type="hidden" name="userid" value="'.$resultset4->id.'"><input type="hidden" name="batchid" value="'.$id.'"><input type="hidden" name="attendencemode" value="P"><input type="hidden" name = "IsSubmit" value="1"></form></div></td>';
	}else{
	$this->htmldata .= '<td><div align="center">Present<br/><form name="attendencemarker" method="POST"><input type="Submit" name="Submit" value="Mark Absent"><input type="hidden" name="module" value="'.$resultset3->$modulename.'"><input type="hidden" name="userid" value="'.$resultset4->id.'"><input type="hidden" name="batchid" value="'.$id.'"><input type="hidden" name="attendencemode" value="A"><input type="hidden" name = "IsSubmit" value="1"></form></div></td>';
	}
	
	
	
	}
	

	
	}

	$this->htmldata .= '</tr><tr class="normaltext">';

	}
	}else{

	    $this->htmldata .= '<tr><td colspan ="8" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';

	}
	}
	
	}

			
	$this->htmldata .= '</table>';
   
   
   }else{ //if row count > 0
   
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';  
   }

	return $this->htmldata;
		
  
  } //function DrawBatchParticipantAttendenceManagerMarker



function MarkParticipantAttendence($userid,$batchid,$module,$attendencemode,$addedby){
	global $mysqli;

	if($attendencemode == 'P'){
	$sql = "DELETE FROM absents WHERE userid = '".$userid."' AND absentdate = '".$module."'"; 
	}else if($attendencemode == 'A'){
	$sql = "INSERT INTO absents(id, userid, batchid, absentdate,added,addedby) VALUES('','".$userid."','".$batchid."','".$module."', NOW(), '".$addedby."')"; 
	}
	
	if ($this->result = $mysqli->query($sql)) {
	return 1;
	}else{
	return 0;
	}

}

function DrawBatchParticipantAttendenceManager($id,$uid){
	global $mysqli;
	
	$sql4batch = "SELECT b.id as id, d.name as districtname, bl.name as blockname FROM batch b, district d, block bl WHERE b.id ='".$id."' AND b.district=d.id AND b.block=bl.id";
	if ($result4batch = $mysqli->query($sql4batch)) {
	$resultset4batch = mysqli_fetch_object($result4batch);
	}

// Start Drawing 

$this->htmldata = '<p align="right"><input type="button" name="Print" onclick="JavaScript:print();" value="   Print   ">&nbsp;&nbsp;&nbsp;&nbsp;</p>';
$this->htmldata .= '<table width="25%" align="center"><tr><td><span class="bheading">Batch Code: <span></td><td><span class="bheading">'.$resultset4batch->id.'</span></td></tr><tr><td><span class="bheading">District : <span></td><td><span class="bheading">'.$resultset4batch->districtname.'</span></td></tr><tr><td><span class="bheading">Block : </td><td><span class="bheading">'.$resultset4batch->blockname.'</span></td></tr></table><hr/>';

	
	$sql = "SELECT phase FROM batch WHERE id='".$id."'";
	
	if ($this->result = $mysqli->query($sql)) {
	$resultset = mysqli_fetch_object($this->result);
	}


		$row_cnt = $this->result->num_rows;
		if($row_cnt>0){

		


	$sql2 = "SELECT name from module where phase = '".$resultset->phase."' ORDER BY orderid ASC";
	if($this->result2 = $mysqli->query($sql2)){
		

		
		 $this->htmldata .= '<table width="100%"  border="0">
		  <tr class="normaltext" bgcolor="#FFFF7F">';

		 $this->htmldata .= '<td width="10%"><div align="center">Participant Name</div></td>';
		 $this->htmldata .= '<td width="10%"><div align="center">Participant ID</div></td>';
		while($resultset2 = mysqli_fetch_object($this->result2)){	
			$this->htmldata .= '<td width="10%"><div align="center">'.$resultset2->name.'</div></td>';
		
		}
		 

	if($resultset->phase=='1'){
	$startcount = 1;
	$endcount = 7;
	}else{
	$startcount = 8;
	$endcount = 14;
	}
	
	if($resultset->phase == 1){
	$sqlfieldname = 'module1,module2,module3,module4,module5,module6,module7';
	}else{
	$sqlfieldname = 'module8,module9,module10,module11,module12,module13,module14';
	}

	$sql3 = "SELECT ".$sqlfieldname." from batchschedule WHERE batch='".$id."'";
	if($this->result3 = $mysqli->query($sql3)){
	$resultset3 = mysqli_fetch_object($this->result3);
	}

	$this->htmldata .= '</tr><tr class="normaltext">';

	$this->htmldata .= '<td width="10%"><div align="center"></div></td>';
	$this->htmldata .= '<td width="10%"><div align="center"></div></td>';

		

	for($ii=$startcount;$ii<=$endcount;$ii++){

	$modulename = 'module'.$ii;
	$this->htmldata .= '<td width="10%" bgcolor="#FFFFAA"><div align="center">'.date('d-m-Y',self::ReturnTimeStamp($resultset3->$modulename)).'</div></td>';
	}
		
		 

		 $this->htmldata .= '</tr><tr><td colspan="9"><hr/></td></tr>';
	
	
	$this->colorchange = 0;
	$sql4 = "SELECT * from users WHERE id='".$uid."'";
	if($this->result4 = $mysqli->query($sql4)){
	if($this->result4->num_rows >0){
	
	while($resultset4 = mysqli_fetch_object($this->result4)){

	if($this->colorchange==0){
	$this->colorchange=1;
	$bgstyleclass = "bgnormalgray";
	}else{
	$this->colorchange=0;
	$bgstyleclass = "bgnormalwhite";
	}

    $this->htmldata .= '<tr class="'.$bgstyleclass.'">';

	$this->htmldata .= '<td align="center" class="normaltext">'.$resultset4->fname.' '.$resultset4->lname.'</td>';
	$this->htmldata .= '<td align="center">'.$resultset4batch->id.':'.$resultset4->userregid.'</td>';
	
	
	for($ii=$startcount;$ii<=$endcount;$ii++){
	$modulename = 'module'.$ii;
 	$sql5 = "SELECT * FROM absents a, batchschedule bc WHERE a.userid='".$resultset4->id."' AND a.absentdate = bc.".$modulename." AND a.batchid='".$id."' AND a.batchid=bc.batch";
	if($this->result5 = $mysqli->query($sql5)){
	$resultset5 = mysqli_fetch_object($this->result5);
	if(!empty($resultset5)){
	$this->htmldata .= '<td><div align="center" class="redtext">Absent</div></td>';
	}else{
	$this->htmldata .= '<td><div align="center">Present</div></td>';
	}
	
	
	
	}
	

	
	}

	$this->htmldata .= '</tr><tr class="normaltext">';

	}
	}else{

	    $this->htmldata .= '<tr><td colspan ="8" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';

	}
	}
	
	}

			
	$this->htmldata .= '</table>';
   
   
   }else{ //if row count > 0
   
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';  
   }

	return $this->htmldata;
  
  } //function DrawBatchParticipantAttendenceManager


  function DrawBatchManager(){
	global $mysqli;
	$sql = "SELECT * FROM batch ORDER BY id DESC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
		  	<td width="5%"><div align="center">S.No.</div></td>
			<td width="10%"><div align="center">Batch Code </div></td>
			<td width="10%"><div align="center">Phase</div></td>
			<td width="10%"><div align="center">Batch Type </div></td>
			<td width="10%"><div align="center">Division</div></td>
			<td width="10%"><div align="center">District</div></td>
			<td width="10%"><div align="center">Block</div></td>
			<td width="10%"><div align="center">Centre</div></td>
			<td width="15%"><div align="center">View Participants</div></td>
			<td width="15%"><div align="center">Download XLS for Bulk Attendence</div></td>
			<td width="10%"><div align="center">Change Batch Status</div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center"><td><b>'.$countno.'</b></td>
				<td><b>'.self::escape_protection_decode($resultset->id).'</b></td>';
				
				$phasename="";
				
				if($resultset->phase == '1'){
				$phasename = 'Phase 1';
				}else if($resultset->phase == '2'){
				$phasename = 'Phase 2';
				}else{
				$phasename = '';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($phasename).'</b></td>';

				if($resultset->type == 1){
				$typename = 'Primary';
				}else if($resultset->type == 2){
				$typename = 'Upper Primary';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($typename).'</b></td>';
				$divisionname = "";
				if($resultset->division == 1){
				$divisionname = 'Ambala';
				}else if($resultset->division == 2){
				$divisionname = 'Hissar';
				}
			
				$this->htmldata .= '<td><b>'.self::escape_protection_decode($divisionname).'</b></td>';

			
				$sql2 = "SELECT name FROM district WHERE id ='".$resultset->district."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}

				$sql3 = "SELECT name FROM block WHERE id ='".$resultset->block."'";
					if ($this->result3 = $mysqli->query($sql3)) {
					$resultset3 = mysqli_fetch_object($this->result3);
					}

				$sql4 = "SELECT name FROM centre WHERE id ='".$resultset->centre."'";
					if ($this->result4 = $mysqli->query($sql4)) {
					$resultset4 = mysqli_fetch_object($this->result4);
					}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->name).'</b></td>';
				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset3->name).'</b></td>';
				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset4->name).'</b></td>';


				$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM categories WHERE pid ='0'";
				if ($result4maxorderid = $mysqli->query($sql4maximumorderid)){
				$row4maximumorderid = mysqli_fetch_object($result4maxorderid);
				$maximumorderid = $row4maximumorderid->orderid;
				}

				$sql4minimumorderid = "SELECT MIN(orderid) as orderid FROM categories WHERE pid ='0'";
				if ($result4minorderid = $mysqli->query($sql4minimumorderid)){
				$row4minimumorderid = mysqli_fetch_object($result4minorderid);
				$minimumorderid = $row4minimumorderid->orderid;
				}

				$this->htmldata .= '<td><a href="view_batch_participants.php?id='.$resultset->id.'" class="" >View Participants</a></td>';
				$this->htmldata .= '<td><a href="export_participants_details4attendence.php?id='.$resultset->id.'" class="" >Download Attendence Sheet</a></td>';
				
				if($resultset->status==0){
				$statustext = 'Running';
				}else if($resultset->status==1){
				$statustext = 'Complete';
				}else if($resultset->status==2){
				$statustext = 'Break';
				}

				$this->htmldata .= '<td><a href="change_batch_status.php?id='.$resultset->id.'" class="" >'.$statustext.'</a></td>';
			    $this->htmldata .='<td><div align="center"><a href="edit_batch.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_batch.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';

		$countno++;
		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawBatchManager


function DrawCentreManager(){
	global $mysqli;
	$sql = "SELECT * FROM centre ORDER BY orderid ASC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
		  	<td width="5%"><div align="center">S.No.</div></td>
			<td width="10%"><div align="center">Centre Name </div></td>
			<td width="10%"><div align="center">Division</div></td>
			<td width="10%"><div align="center">District</div></td>
			<td width="10%"><div align="center">Block</div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center"><td><b>'.$countno.'</b></td>
				<td><b>'.self::escape_protection_decode($resultset->name).'</b></td>';
				

				$sql2 = "SELECT pid,name FROM block WHERE id = '".$resultset->block."'";
				if ($this->result2 = $mysqli->query($sql2)) {
				$resultset2 = mysqli_fetch_object($this->result2);
				}

				$sql3 = "SELECT division,name FROM district WHERE id = '".$resultset2->pid."'";
				if ($this->result3 = $mysqli->query($sql3)) {
				$resultset3 = mysqli_fetch_object($this->result3);
				}


				$divisionname = "";
				if($resultset3->division == 1){
				$divisionname = 'Ambala';
				}else if($resultset3->division == 2){
				$divisionname = 'Hissar';
				}
			
				$this->htmldata .= '<td><b>'.self::escape_protection_decode($divisionname).'</b></td>';
				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset3->name).'</b></td>';
				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->name).'</b></td>';

				$this->htmldata .='<td><div align="center"><a href="edit_centre.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_centre.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';

		$countno++;
		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawBatchManager


 function DrawBatchManagerByCentre($id){
	global $mysqli;
	$sql = "SELECT b.* FROM batch b, centre c WHERE  b.centre = c.id AND c.id = '".$id."' ORDER BY c.orderid ASC";
	$grandtotal = 0;
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

				$resultset = mysqli_fetch_object($this->result);

				$divisionname = "";
				if($resultset->division == 1){
				$divisionname = 'Ambala';
				}else if($resultset->division == 2){
				$divisionname = 'Hissar';
				}
			
				$sql2 = "SELECT name FROM district WHERE id ='".$resultset->district."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}

				$sql3 = "SELECT name FROM block WHERE id ='".$resultset->block."'";
					if ($this->result3 = $mysqli->query($sql3)) {
					$resultset3 = mysqli_fetch_object($this->result3);
					}

				$sql4 = "SELECT name FROM centre WHERE id ='".$id."'";
					if ($this->result4 = $mysqli->query($sql4)) {
					$resultset4 = mysqli_fetch_object($this->result4);
					}


				$this->htmldata .= '<table width="25%" align="center"><tr><td><span class="bheading">Batch Code: <span></td><td><span class="bheading">'.self::escape_protection_decode($divisionname).'</span></td></tr><tr><td><span class="bheading">District : <span></td><td><span class="bheading">'.self::escape_protection_decode($resultset2->name).'</span></td></tr><tr><td><span class="bheading">Block : </td><td><span class="bheading">'.self::escape_protection_decode($resultset3->name).'</span></td></tr><tr><td><span class="bheading">Centre : </td><td><span class="bheading">'.self::escape_protection_decode($resultset4->name).'</span></td></tr></table><hr/>';

		}
		$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		 $this->htmldata .= '<table width="100%"  border="0">
		  <tr class="headinglightred">
		  	<td width="5%"><div align="center">S.No.</div></td>
			<td width="10%"><div align="center">Batch Code </div></td>
			<td width="10%"><div align="center">Phase</div></td>
			<td width="10%"><div align="center">Batch Type </div></td>
			<td width="15%"><div align="center">No. of Participants</div></td>
			<td width="10%"><div align="center">Start Date</div></td>
			<td width="10%"><div align="center">End Date</div></td>
			<td width="10%"><div align="center">Batch Status</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center"><td><b>'.$countno.'</b></td>
				<td><b>'.self::escape_protection_decode($resultset->id).'</b></td>';
				
				$phasename="";
				
				if($resultset->phase == '1'){
				$phasename = 'Phase 1';
				}else if($resultset->phase == '2'){
				$phasename = 'Phase 2';
				}else{
				$phasename = '';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($phasename).'</b></td>';

				if($resultset->type == 1){
				$typename = 'Primary';
				}else if($resultset->type == 2){
				$typename = 'Upper Primary';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($typename).'</b></td>';

				$sql5 = "SELECT * FROM batchschedule WHERE batch ='".$resultset->id."'";
					if ($this->result5 = $mysqli->query($sql5)) {
					$resultset5 = mysqli_fetch_object($this->result5);
					}


				$sql6 = "SELECT * FROM users WHERE usertype='3' AND batchid = '".$resultset->id."' ORDER BY userregid, fname,lname ASC";
				if ($this->result6 = $mysqli->query($sql6)) {
				$resultsetcount6 = $this->result6->num_rows;
				}

				$this->htmldata .= '<td><b>'.$resultsetcount6.'</b></td>';
				
				if($resultset->status==0){
				$statustext = 'Running';
				}else if($resultset->status==1){
				$statustext = 'Complete';
				}else if($resultset->status==2){
				$statustext = 'Break';
				}
				
				if($resultset5->startdate !="" || $resultset5->enddate != ""){
				$this->htmldata .= '<td><b>'.date('d-m-Y', self::ReturnTimeStamp($resultset5->startdate)).'</b></td>';
				$this->htmldata .= '<td><b>'.date('d-m-Y', self::ReturnTimeStamp($resultset5->enddate)).'</b></td>';
				}else{
				$this->htmldata .= '<td><b>--</b></td>';
				$this->htmldata .= '<td><b>--</b></td>';
				}

				$this->htmldata .= '<td><b>'.$statustext.'</b></td>';
			    $this->htmldata .='</tr>';

		$countno++;
		$grandtotal = $grandtotal + $resultsetcount6;
		} // while

		$this->htmldata .= '<tr><td colspan="8"><hr /></td></tr><tr><td></td><td></td><td></td><td class="headinglightorange" align="center">Total Participants </td><td class="headinglightorange" align="center">'.$grandtotal.'</td><td></td><td></td><td></td></tr>';

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="4" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  	   

	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawBatchManagerByCentre



function getAllDivisionReportManager($id){
	global $mysqli;
	$sql = "SELECT * FROM batch WHERE  division = '".$id."' AND id IN (SELECT batch from batchschedule) ORDER BY orderid ASC";
	$grandtotal = 0;
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

				$resultset = mysqli_fetch_object($this->result);

				$divisionname = "";
				if($resultset->division == 1){
				$divisionname = 'Ambala';
				}else if($resultset->division == 2){
				$divisionname = 'Hissar';
				}
			
			$this->htmldata .= '<table width="25%" align="center"><tr><td><span class="bheading">Division: <span></td><td><span class="bheading">'.self::escape_protection_decode($divisionname).'</span></td></tr></table><hr/>';

		}
		$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		 $this->htmldata .= '<table width="100%"  border="0">
		  <tr class="headinglightred">
		  	<td width="5%"><div align="center">S.No.</div></td>
			<td width="10%"><div align="center">Batch Code </div></td>
			<td width="10%"><div align="center">Phase</div></td>
			<td width="10%"><div align="center">Batch Type </div></td>
			<td width="10%"><div align="center">District</div></td>
			<td width="10%"><div align="center">Block</div></td>
			<td width="10%"><div align="center">Centre</div></td>
			<td width="15%"><div align="center">No. of Participants</div></td>
			<td width="10%"><div align="center">Start Date</div></td>
			<td width="10%"><div align="center">End Date</div></td>
			<td width="10%"><div align="center">Batch Status</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center"><td><b>'.$countno.'</b></td>
				<td><b>'.self::escape_protection_decode($resultset->id).'</b></td>';
				
				$phasename="";
				
				if($resultset->phase == '1'){
				$phasename = 'Phase 1';
				}else if($resultset->phase == '2'){
				$phasename = 'Phase 2';
				}else{
				$phasename = '';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($phasename).'</b></td>';

				if($resultset->type == 1){
				$typename = 'Primary';
				}else if($resultset->type == 2){
				$typename = 'Upper Primary';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($typename).'</b></td>';



				$sql2 = "SELECT name FROM district WHERE id ='".$resultset->district."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}


				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->name).'</b></td>';

				$sql3 = "SELECT name FROM block WHERE id ='".$resultset->block."'";
					if ($this->result3 = $mysqli->query($sql3)) {
					$resultset3 = mysqli_fetch_object($this->result3);
					}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset3->name).'</b></td>';

				$sql4 = "SELECT name FROM centre WHERE id ='".$resultset->centre."'";
					if ($this->result4 = $mysqli->query($sql4)) {
					$resultset4 = mysqli_fetch_object($this->result4);
					}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset4->name).'</b></td>';


				$sql5 = "SELECT * FROM batchschedule WHERE batch ='".$resultset->id."'";
					if ($this->result5 = $mysqli->query($sql5)) {
					$resultset5 = mysqli_fetch_object($this->result5);
					}


				$sql6 = "SELECT * FROM users WHERE usertype='3' AND batchid = '".$resultset->id."' ORDER BY userregid, fname,lname ASC";
				if ($this->result6 = $mysqli->query($sql6)) {
				$resultsetcount6 = $this->result6->num_rows;
				}

				$this->htmldata .= '<td><b>'.$resultsetcount6.'</b></td>';
				
				if($resultset->status==0){
				$statustext = 'Running';
				}else if($resultset->status==1){
				$statustext = 'Complete';
				}else if($resultset->status==2){
				$statustext = 'Break';
				}
				
				if($resultset5->startdate !="" || $resultset5->enddate != ""){
				$this->htmldata .= '<td><b>'.date('d-m-Y', self::ReturnTimeStamp($resultset5->startdate)).'</b></td>';
				$this->htmldata .= '<td><b>'.date('d-m-Y', self::ReturnTimeStamp($resultset5->enddate)).'</b></td>';
				}else{
				$this->htmldata .= '<td><b>--</b></td>';
				$this->htmldata .= '<td><b>--</b></td>';
				}

				$this->htmldata .= '<td><b>'.$statustext.'</b></td>';
			    $this->htmldata .='</tr>';

		$countno++;
		$grandtotal = $grandtotal + $resultsetcount6;
		} // while

		$this->htmldata .= '<tr><td colspan="11"><hr /></td></tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td class="headinglightorange" align="center">Total Participants </td><td class="headinglightorange" align="center">'.$grandtotal.'</td><td></td><td></td><td></td></tr>';

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="11" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  	   

	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function getAllDivisionReportManager



function getAllReportManager(){
	global $mysqli;
	$sql = "SELECT * FROM batch WHERE id IN (SELECT batch from batchschedule) ORDER BY orderid ASC";
	$grandtotal = 0;
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

				$resultset = mysqli_fetch_object($this->result);


			
			$this->htmldata .= '<table width="25%" align="center"><tr><td><span class="bheading">FULL REPORT - ALL DIVISIONS<span></td></tr></table><hr/>';

		}
		$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		 $this->htmldata .= '<table width="100%"  border="0">
		  <tr class="headinglightred">
		  	<td width="5%"><div align="center">S.No.</div></td>
			<td width="10%"><div align="center">Batch Code </div></td>
			<td width="10%"><div align="center">Phase</div></td>
			<td width="10%"><div align="center">Batch Type </div></td>
			<td width="10%"><div align="center">District</div></td>
			<td width="10%"><div align="center">Block</div></td>
			<td width="10%"><div align="center">Centre</div></td>
			<td width="15%"><div align="center">No. of Participants</div></td>
			<td width="10%"><div align="center">Start Date</div></td>
			<td width="10%"><div align="center">End Date</div></td>
			<td width="10%"><div align="center">Batch Status</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center"><td><b>'.$countno.'</b></td>
				<td><b>'.self::escape_protection_decode($resultset->id).'</b></td>';
				
				$phasename="";
				
				if($resultset->phase == '1'){
				$phasename = 'Phase 1';
				}else if($resultset->phase == '2'){
				$phasename = 'Phase 2';
				}else{
				$phasename = '';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($phasename).'</b></td>';

				if($resultset->type == 1){
				$typename = 'Primary';
				}else if($resultset->type == 2){
				$typename = 'Upper Primary';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($typename).'</b></td>';



				$sql2 = "SELECT name FROM district WHERE id ='".$resultset->district."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}


				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->name).'</b></td>';

				$sql3 = "SELECT name FROM block WHERE id ='".$resultset->block."'";
					if ($this->result3 = $mysqli->query($sql3)) {
					$resultset3 = mysqli_fetch_object($this->result3);
					}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset3->name).'</b></td>';

				$sql4 = "SELECT name FROM centre WHERE id ='".$resultset->centre."'";
					if ($this->result4 = $mysqli->query($sql4)) {
					$resultset4 = mysqli_fetch_object($this->result4);
					}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset4->name).'</b></td>';


				$sql5 = "SELECT * FROM batchschedule WHERE batch ='".$resultset->id."'";
					if ($this->result5 = $mysqli->query($sql5)) {
					$resultset5 = mysqli_fetch_object($this->result5);
					}


				$sql6 = "SELECT * FROM users WHERE usertype='3' AND batchid = '".$resultset->id."' ORDER BY userregid, fname,lname ASC";
				if ($this->result6 = $mysqli->query($sql6)) {
				$resultsetcount6 = $this->result6->num_rows;
				}

				$this->htmldata .= '<td><b>'.$resultsetcount6.'</b></td>';
				
				if($resultset->status==0){
				$statustext = 'Running';
				}else if($resultset->status==1){
				$statustext = 'Complete';
				}else if($resultset->status==2){
				$statustext = 'Break';
				}
				
				if($resultset5->startdate !="" || $resultset5->enddate != ""){
				$this->htmldata .= '<td><b>'.date('d-m-Y', self::ReturnTimeStamp($resultset5->startdate)).'</b></td>';
				$this->htmldata .= '<td><b>'.date('d-m-Y', self::ReturnTimeStamp($resultset5->enddate)).'</b></td>';
				}else{
				$this->htmldata .= '<td><b>--</b></td>';
				$this->htmldata .= '<td><b>--</b></td>';
				}

				$this->htmldata .= '<td><b>'.$statustext.'</b></td>';
			    $this->htmldata .='</tr>';

		$countno++;
		$grandtotal = $grandtotal + $resultsetcount6;
		} // while

		$this->htmldata .= '<tr><td colspan="11"><hr /></td></tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td class="headinglightorange" align="center">Total Participants </td><td class="headinglightorange" align="center">'.$grandtotal.'</td><td></td><td></td><td></td></tr>';

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="11" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  	   

	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function getAllReportManager

function getAllDistrictReportManager($id){
	global $mysqli;
	$sql = "SELECT * FROM batch WHERE  district = '".$id."' AND id IN (SELECT batch from batchschedule) ORDER BY orderid ASC";
	$grandtotal = 0;
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

				$resultset = mysqli_fetch_object($this->result);

				$sql2 = "SELECT name FROM district WHERE id ='".$resultset->district."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}

			$this->htmldata .= '<table width="25%" align="center"><tr><td><span class="bheading">District: <span></td><td><span class="bheading">'.self::escape_protection_decode($resultset2->name).'</span></td></tr></table><hr/>';

		}
		$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		 $this->htmldata .= '<table width="100%"  border="0">
		  <tr class="headinglightred">
		  	<td width="5%"><div align="center">S.No.</div></td>
			<td width="10%"><div align="center">Batch Code </div></td>
			<td width="10%"><div align="center">Phase</div></td>
			<td width="10%"><div align="center">Batch Type </div></td>
			<td width="10%"><div align="center">Block</div></td>
			<td width="10%"><div align="center">Centre</div></td>
			<td width="15%"><div align="center">No. of Participants</div></td>
			<td width="10%"><div align="center">Start Date</div></td>
			<td width="10%"><div align="center">End Date</div></td>
			<td width="10%"><div align="center">Batch Status</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center"><td><b>'.$countno.'</b></td>
				<td><b>'.self::escape_protection_decode($resultset->id).'</b></td>';
				
				$phasename="";
				
				if($resultset->phase == '1'){
				$phasename = 'Phase 1';
				}else if($resultset->phase == '2'){
				$phasename = 'Phase 2';
				}else{
				$phasename = '';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($phasename).'</b></td>';

				if($resultset->type == 1){
				$typename = 'Primary';
				}else if($resultset->type == 2){
				$typename = 'Upper Primary';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($typename).'</b></td>';


				$sql3 = "SELECT name FROM block WHERE id ='".$resultset->block."'";
					if ($this->result3 = $mysqli->query($sql3)) {
					$resultset3 = mysqli_fetch_object($this->result3);
					}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset3->name).'</b></td>';

				$sql4 = "SELECT name FROM centre WHERE id ='".$resultset->centre."'";
					if ($this->result4 = $mysqli->query($sql4)) {
					$resultset4 = mysqli_fetch_object($this->result4);
					}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset4->name).'</b></td>';


				$sql5 = "SELECT * FROM batchschedule WHERE batch ='".$resultset->id."'";
					if ($this->result5 = $mysqli->query($sql5)) {
					$resultset5 = mysqli_fetch_object($this->result5);
					}


				$sql6 = "SELECT * FROM users WHERE usertype='3' AND batchid = '".$resultset->id."' ORDER BY userregid, fname,lname ASC";
				if ($this->result6 = $mysqli->query($sql6)) {
				$resultsetcount6 = $this->result6->num_rows;
				}

				$this->htmldata .= '<td><b>'.$resultsetcount6.'</b></td>';
				
				if($resultset->status==0){
				$statustext = 'Running';
				}else if($resultset->status==1){
				$statustext = 'Complete';
				}else if($resultset->status==2){
				$statustext = 'Break';
				}
				
				if($resultset5->startdate !="" || $resultset5->enddate != ""){
				$this->htmldata .= '<td><b>'.date('d-m-Y', self::ReturnTimeStamp($resultset5->startdate)).'</b></td>';
				$this->htmldata .= '<td><b>'.date('d-m-Y', self::ReturnTimeStamp($resultset5->enddate)).'</b></td>';
				}else{
				$this->htmldata .= '<td><b>--</b></td>';
				$this->htmldata .= '<td><b>--</b></td>';
				}

				$this->htmldata .= '<td><b>'.$statustext.'</b></td>';
			    $this->htmldata .='</tr>';

		$countno++;
		$grandtotal = $grandtotal + $resultsetcount6;
		} // while

		$this->htmldata .= '<tr><td colspan="10"><hr /></td></tr><tr><td></td><td></td><td></td><td></td><td></td><td class="headinglightorange" align="center">Total Participants </td><td class="headinglightorange" align="center">'.$grandtotal.'</td><td></td><td></td><td></td></tr>';

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="10" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  	   

	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function getAllDistrictReportManager



function getAllBlockReportManager($id){
	global $mysqli;
	$sql = "SELECT * FROM batch WHERE  block = '".$id."' AND id IN (SELECT batch from batchschedule) ORDER BY orderid ASC";
	$grandtotal = 0;
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

				$resultset = mysqli_fetch_object($this->result);

				$sql2 = "SELECT name FROM block WHERE id ='".$resultset->block."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}

			$this->htmldata .= '<table width="25%" align="center"><tr><td><span class="bheading">Block: <span></td><td><span class="bheading">'.self::escape_protection_decode($resultset2->name).'</span></td></tr></table><hr/>';

		}
		$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		 $this->htmldata .= '<table width="100%"  border="0">
		  <tr class="headinglightred">
		  	<td width="5%"><div align="center">S.No.</div></td>
			<td width="10%"><div align="center">Batch Code </div></td>
			<td width="10%"><div align="center">Phase</div></td>
			<td width="10%"><div align="center">Batch Type </div></td>
			<td width="10%"><div align="center">Centre</div></td>
			<td width="15%"><div align="center">No. of Participants</div></td>
			<td width="10%"><div align="center">Start Date</div></td>
			<td width="10%"><div align="center">End Date</div></td>
			<td width="10%"><div align="center">Batch Status</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center"><td><b>'.$countno.'</b></td>
				<td><b>'.self::escape_protection_decode($resultset->id).'</b></td>';
				
				$phasename="";
				
				if($resultset->phase == '1'){
				$phasename = 'Phase 1';
				}else if($resultset->phase == '2'){
				$phasename = 'Phase 2';
				}else{
				$phasename = '';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($phasename).'</b></td>';

				if($resultset->type == 1){
				$typename = 'Primary';
				}else if($resultset->type == 2){
				$typename = 'Upper Primary';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($typename).'</b></td>';



				$sql4 = "SELECT name FROM centre WHERE id ='".$resultset->centre."'";
					if ($this->result4 = $mysqli->query($sql4)) {
					$resultset4 = mysqli_fetch_object($this->result4);
					}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset4->name).'</b></td>';


				$sql5 = "SELECT * FROM batchschedule WHERE batch ='".$resultset->id."'";
					if ($this->result5 = $mysqli->query($sql5)) {
					$resultset5 = mysqli_fetch_object($this->result5);
					}


				$sql6 = "SELECT * FROM users WHERE usertype='3' AND batchid = '".$resultset->id."' ORDER BY userregid, fname,lname ASC";
				if ($this->result6 = $mysqli->query($sql6)) {
				$resultsetcount6 = $this->result6->num_rows;
				}

				$this->htmldata .= '<td><b>'.$resultsetcount6.'</b></td>';
				
				if($resultset->status==0){
				$statustext = 'Running';
				}else if($resultset->status==1){
				$statustext = 'Complete';
				}else if($resultset->status==2){
				$statustext = 'Break';
				}
				
				if($resultset5->startdate !="" || $resultset5->enddate != ""){
				$this->htmldata .= '<td><b>'.date('d-m-Y', self::ReturnTimeStamp($resultset5->startdate)).'</b></td>';
				$this->htmldata .= '<td><b>'.date('d-m-Y', self::ReturnTimeStamp($resultset5->enddate)).'</b></td>';
				}else{
				$this->htmldata .= '<td><b>--</b></td>';
				$this->htmldata .= '<td><b>--</b></td>';
				}

				$this->htmldata .= '<td><b>'.$statustext.'</b></td>';
			    $this->htmldata .='</tr>';

		$countno++;
		$grandtotal = $grandtotal + $resultsetcount6;
		} // while

		$this->htmldata .= '<tr><td colspan="9"><hr /></td></tr><tr><td></td><td></td><td></td><td></td><td class="headinglightorange" align="center">Total Participants </td><td class="headinglightorange" align="center">'.$grandtotal.'</td><td></td><td></td><td></td></tr>';

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="9" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  	   

	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function getAllBlockReportManager


function DrawBatchManager4Facilitator($fid){
	global $mysqli;

	$sql = "SELECT DISTINCT b.id as id , b.* FROM batch b, batchschedule bs WHERE (bs.facilitator = '".$fid."' AND b.id=bs.batch) OR b.addedby = '".$fid."' ORDER BY b.id DESC";
	
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
		  	<td width="5%"><div align="center">S.No.</div></td>
			<td width="10%"><div align="center">Batch Code </div></td>
			<td width="10%"><div align="center">Phase</div></td>
			<td width="10%"><div align="center">Batch Type </div></td>
			<td width="10%"><div align="center">Division</div></td>
			<td width="10%"><div align="center">District</div></td>
			<td width="10%"><div align="center">Block</div></td>
			<td width="15%"><div align="center">View Participants</div></td>
			<td width="15%"><div align="center">Download XLS for Bulk Attendence</div></td>
			<td width="10%"><div align="center">Change Batch Status</div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center"><td><b>'.$countno.'</b></td>
				<td><b>'.self::escape_protection_decode($resultset->id).'</b></td>';
				
				$phasename="";
				
				if($resultset->phase == '1'){
				$phasename = 'Phase 1';
				}else if($resultset->phase == '2'){
				$phasename = 'Phase 2';
				}else{
				$phasename = '';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($phasename).'</b></td>';

				if($resultset->type == 1){
				$typename = 'Primary';
				}else if($resultset->type == 2){
				$typename = 'Upper Primary';
				}

				$this->htmldata .= '<td><b>'.self::escape_protection_decode($typename).'</b></td>';
				$divisionname = "";
				if($resultset->division == 1){
				$divisionname = 'Ambala';
				}else if($resultset->division == 2){
				$divisionname = 'Hissar';
				}
			
				$this->htmldata .= '<td><b>'.self::escape_protection_decode($divisionname).'</b></td>';

			
				$sql2 = "SELECT name FROM district WHERE id ='".$resultset->district."'";
					if ($this->result2 = $mysqli->query($sql2)) {
					$resultset2 = mysqli_fetch_object($this->result2);
					}

				$sql3 = "SELECT name FROM block WHERE id ='".$resultset->block."'";
					if ($this->result3 = $mysqli->query($sql3)) {
					$resultset3 = mysqli_fetch_object($this->result3);
					}
				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset2->name).'</b></td>';
				$this->htmldata .= '<td><b>'.self::escape_protection_decode($resultset3->name).'</b></td>';


				$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM categories WHERE pid ='0'";
				if ($result4maxorderid = $mysqli->query($sql4maximumorderid)){
				$row4maximumorderid = mysqli_fetch_object($result4maxorderid);
				$maximumorderid = $row4maximumorderid->orderid;
				}

				$sql4minimumorderid = "SELECT MIN(orderid) as orderid FROM categories WHERE pid ='0'";
				if ($result4minorderid = $mysqli->query($sql4minimumorderid)){
				$row4minimumorderid = mysqli_fetch_object($result4minorderid);
				$minimumorderid = $row4minimumorderid->orderid;
				}

				$this->htmldata .= '<td><a href="view_batch_participants4facilitator.php?id='.$resultset->id.'" class="" >View Participants</a></td>';
				$this->htmldata .= '<td><a href="export_participants_details4attendence4facilitator.php?id='.$resultset->id.'" class="" >Download Attendence Sheet</a></td>';
				
				if($resultset->status==0){
				$statustext = 'Running';
				}else if($resultset->status==1){
				$statustext = 'Complete';
				}else if($resultset->status==2){
				$statustext = 'Break';
				}

				$this->htmldata .= '<td><a href="change_batch_status4facilitator.php?id='.$resultset->id.'" class="" >'.$statustext.'</a></td>';
			    $this->htmldata .='<td><div align="center"><a href="edit_batch4facilitator.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_batch4facilitator.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';

		$countno++;
		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawBatchManager4Facilitator


function DrawModuleManager(){
	global $mysqli;
	$sql = "SELECT * FROM module ORDER BY phase,orderid ASC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
  			<td width="5%"><div align="center">S.No.</div></td>
			<td width="30%"><div align="center">Module Name </div></td>
			<td width="30%"><div align="center">Phase </div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center">
				<td><b>'.$countno.'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->name).'</b></td>';
				
				if($resultset->phase == '1'){
				$phasetext = "Phase 1";
				}else if($resultset->phase == '2'){
				$phasetext = "Phase 2";
				}
				
				$this->htmldata .= '<td><b>'.$phasetext.'</b></td>';


				$this->htmldata .='<td><div align="center"><a href="edit_module.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_module.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';
		
		$countno++;
		
		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawModuleManager




function DrawFeedbackManager(){
	global $mysqli;
	$sql = "SELECT * FROM feedback ORDER BY district,block ASC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
  			<td width="5%"><div align="center">S.No.</div></td>
			<td width="10%"><div align="center">First Name </div></td>
			<td width="10%"><div align="center">Last Name </div></td>
			<td width="10%"><div align="center">Designation</div></td>
			<td width="10%"><div align="center">Posting location </div></td>
			<td width="10%"><div align="center">Batch Start Date </div></td>
			<td width="10%"><div align="center">Batch End Date </div></td>
			<td width="10%"><div align="center">District</div></td>
			<td width="10%"><div align="center">Block</div></td>
			<td width="10%"><div align="center">Phone </div></td>
			<td width="10%"><div align="center">Status</div></td>
			<td width="10%"><div align="center">View / Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center">
				<td><b>'.$countno.'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->fname).'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->lname).'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->designation).'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->postinglocation).'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->batchstartdate).'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->batchenddate).'</b></td>';
				
			
				
				$sql2 = "SELECT name FROM district WHERE id ='".$resultset->district."'";
				if ($this->result2 = $mysqli->query($sql2)) {
				$resultset2 = mysqli_fetch_object($this->result2);
				}

				$this->htmldata .= '<td align="left"><b>'.self::escape_protection_decode($resultset2->name).'</b></td>';

				$sql3 = "SELECT name FROM block WHERE id ='".$resultset->block."'";
				if ($this->result3 = $mysqli->query($sql3)) {
				$resultset3 = mysqli_fetch_object($this->result3);
				}

				$this->htmldata .= '<td align="left"><b>'.self::escape_protection_decode($resultset3->name).'</b></td>';
				
				$this->htmldata .= '<td align="left"><b>'.self::escape_protection_decode($resultset->phone).'</b></td>';

				if($resultset->approved == 1){
				$statusstyleclass = "greentext";
				$statusstyletext = "Approved";
				}else{
				$statusstyleclass = "redtext";
				$statusstyletext = "Not Approved";
				}

				$this->htmldata .= '<td><a href="change_feedback_status.php?id='.$resultset->id.'"><div align="center" class="'.$statusstyleclass.'">'.$statusstyletext.'</div></a></td>';


				$this->htmldata .='<td><div align="center"><a href="edit_feedback.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_feedback.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';
		
		$countno++;
		
		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawFeedbackManager




function DrawTestimonialManager(){
	global $mysqli;
	$sql = "SELECT * FROM testimonial ORDER BY district,block ASC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
  			<td width="5%"><div align="center">S.No.</div></td>
			<td width="10%"><div align="center">First Name </div></td>
			<td width="10%"><div align="center">Last Name </div></td>
			<td width="10%"><div align="center">Designation</div></td>
			<td width="10%"><div align="center">Posting location </div></td>
			<td width="10%"><div align="center">Batch Start Date </div></td>
			<td width="10%"><div align="center">Batch End Date </div></td>
			<td width="10%"><div align="center">District</div></td>
			<td width="10%"><div align="center">Block</div></td>
			<td width="10%"><div align="center">Phone </div></td>
			<td width="10%"><div align="center">Status</div></td>
			<td width="10%"><div align="center">View / Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center">
				<td><b>'.$countno.'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->fname).'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->lname).'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->designation).'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->postinglocation).'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->batchstartdate).'</b></td>
				<td align="left"><b>'.self::escape_protection_decode($resultset->batchenddate).'</b></td>';
				
			
				
				$sql2 = "SELECT name FROM district WHERE id ='".$resultset->district."'";
				if ($this->result2 = $mysqli->query($sql2)) {
				$resultset2 = mysqli_fetch_object($this->result2);
				}

				$this->htmldata .= '<td align="left"><b>'.self::escape_protection_decode($resultset2->name).'</b></td>';

				$sql3 = "SELECT name FROM block WHERE id ='".$resultset->block."'";
				if ($this->result3 = $mysqli->query($sql3)) {
				$resultset3 = mysqli_fetch_object($this->result3);
				}

				$this->htmldata .= '<td align="left"><b>'.self::escape_protection_decode($resultset3->name).'</b></td>';
				
				$this->htmldata .= '<td align="left"><b>'.self::escape_protection_decode($resultset->phone).'</b></td>';

				if($resultset->approved == 1){
				$statusstyleclass = "greentext";
				$statusstyletext = "Approved";
				}else{
				$statusstyleclass = "redtext";
				$statusstyletext = "Not Approved";
				}

				$this->htmldata .= '<td><a href="change_testimonial_status.php?id='.$resultset->id.'"><div align="center" class="'.$statusstyleclass.'">'.$statusstyletext.'</div></a></td>';


				$this->htmldata .='<td><div align="center"><a href="edit_testimonial.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_testimonial.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';
		
		$countno++;
		
		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawTestimonialManager



function DrawDistrictManager(){
	global $mysqli;
	$sql = "SELECT * FROM district ORDER BY division,orderid ASC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="headinglightred">
		    <td width="5%"><div align="center">S.No.</div></td>
			<td width="30%"><div align="center">Block Name </div></td>
			<td width="30%"><div align="center">District Name </div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){
			$countno = 1;
			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'" align="center">
				<td><b>'.$countno.'</b></td><td align="left"><b>'.self::escape_protection_decode($resultset->name).'</b></td>';
				
				if($resultset->division == 1){
				$divisionname = 'Ambala';
				}else if($resultset->division == 2){
				$divisionname = 'Hissar';
				}
				
				$this->htmldata .= '<td><b>'.self::escape_protection_decode($divisionname).'</b></td>';

							
				$this->htmldata .= '<td><div align="center"><a href="edit_district.php?id='.$resultset->id.'" class="" >Edit</a></div></td>
				<td><div align="center"><a href="delete_district.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';

		$countno++;
		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawDistrictManager



function DrawParticipantAttendenceManager($id,$month,$year){
	global $mysqli;
	$startdate = $year.':'.$month.'-01 00:00:00';
	$enddate = $year.':'.$month.'-31 00:00:00';

	if(date('L', strtotime($year.'-01-01'))){ // if Leap Year
	$monthdaysarray = array('01'=>'31','02'=>'29','03'=>'31','04'=>'30','05'=>'31','06'=>'30','07'=>'31','08'=>'31','09'=>'30','10'=>'31','11'=>'30','12'=>'31');
	}else{
	$monthdaysarray = array('01'=>'31','02'=>'28','03'=>'31','04'=>'30','05'=>'31','06'=>'30','07'=>'31','08'=>'31','09'=>'30','10'=>'31','11'=>'30','12'=>'31');
	}

	$sql = "SELECT * FROM absents WHERE userid='".$id."' AND absentdate>='".$startdate."' AND absentdate<='".$enddate."'";
	$this->colorchange = 0;
		
		$absentdatearray = array();
		if ($this->result = $mysqli->query($sql)) {
		while($resultset = mysqli_fetch_object($this->result)){
		$datearray = explode(" ",$resultset->absentdate);
		$datearray2 = explode("-",$datearray[0]);
		$absentdatearray[] = $datearray2[2];
		}
		

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="normaltext">
			<td width="30%"><div align="center">Date </div></td>
			<td width="30%"><div align="center">Status </div></td>
			<td width="10%"><div align="center">Delete</div></td>
		  </tr>';

		
    	$row_cnt = $monthdaysarray[$month];
		if($row_cnt>0){

			for($ii=1;$ii<=$row_cnt;$ii++){

				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		
				$this->htmldata .= '<tr class="'.$bgstyleclass.'">
				<td align="center"><b>'.$ii.':'.$month.':'.$year.'</b></td>';
				
				if(in_array($ii,$absentdatearray)){
				$this->htmldata .= '<td align="center" class="redtext"><b>Absent</b></td>';				
				}else{
				$this->htmldata .= '<td align="center"><b>Present</b></td>';				
				}
				
				$this->htmldata .= '<td align="center"><div align="center"><a href="delete_category.php?id='.$resultset->id.'" class="" >Delete</a></div></td>
			  </tr>';

		} // for

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawParticipantAttendenceManager


function DrawSubCatManager($parent){
	global $mysqli;
	$sql = "SELECT * FROM categories WHERE pid = '".$parent."' ORDER BY orderid ASC";
	$this->colorchange = 0;
		if ($this->result = $mysqli->query($sql)) {

		// Start Drawing 

		 $this->htmldata = '<table width="100%"  border="0">
		  <tr class="normaltext">
			<td width="30%"><div align="center">Sub Cat Details </div></td>
			<td width="20%"><div align="center">Order</div></td>
			<td width="10%"><div align="center">Edit</div></td>
			<td width="10%"><div align="center">Edit Content</div></td>
			<td width="10%"><div align="center">Manage Links</div></td>
			<td width="15%"><div align="center">Manage Ads</div></td>
			<td width="15%"><div align="center">Delete</div></td>
		  </tr>';

    	$row_cnt = $this->result->num_rows;
		if($row_cnt>0){

			while($resultset = mysqli_fetch_object($this->result)){
				if($this->colorchange==0){
				$this->colorchange=1;
				$bgstyleclass = "bgnormalgray";
				}else{
				$this->colorchange=0;
				$bgstyleclass = "bgnormalwhite";
				}
		

				$sql_parent_name = "SELECT name FROM categories WHERE id = '".$parent."'";
				if ($result_parent_name = $mysqli->query($sql_parent_name)) {
				$resultset_parent_name = mysqli_fetch_object($result_parent_name);
				}

				$this->htmldata .= '<tr class="'.$bgstyleclass.'">
				<td><a href="manage_categories.php"><span class="redtext">'.self::escape_protection_decode($resultset_parent_name->name).'</span></a><strong> >> </strong>'.self::escape_protection_decode($resultset->name).'<br></td>';
				
				$sql4maximumorderid = "SELECT MAX(orderid) as orderid FROM categories WHERE pid ='".$parent."'";
				if ($result4maxorderid = $mysqli->query($sql4maximumorderid)){
				$row4maximumorderid = mysqli_fetch_object($result4maxorderid);
				$maximumorderid = $row4maximumorderid->orderid;
				}

				$sql4minimumorderid = "SELECT MIN(orderid) as orderid FROM categories WHERE pid ='".$parent."'";
				if ($result4minorderid = $mysqli->query($sql4minimumorderid)){
				$row4minimumorderid = mysqli_fetch_object($result4minorderid);
				$minimumorderid = $row4minimumorderid->orderid;
				}

				$this->htmldata .= '<td><div align="center">';

				if($resultset->orderid!= $minimumorderid){ // We don't need Up for the minimum record
				$this->htmldata .= '<a href="change_category_order.php?d=1&id='.$resultset->id.'">Up</a>';
				}
				
				$this->htmldata .= '  '; 

				if($resultset->orderid != $maximumorderid){
				$this->htmldata .= '<a href="change_category_order.php?d=2&id='.$resultset->id.'">Down</a>';
				} // if current orderid is not maximum orderid

				$this->htmldata .='</div></td>				
				<td><div align="center"><a href="edit_sub_category.php?id='.$resultset->id.'">Edit</a></div></td>
				<td><div align="center"><a href="edit_category_content.php?id='.$resultset->id.'">Edit Content</a></div></td>
				<td><div align="center"><a href="manage_sub_category_links.php?id='.$resultset->id.'">Manage Links</a></div></td>
				<td><div align="center"><a href="edit_category_banners.php?id='.$resultset->id.'">Manage</a></div></td>
				<td><div align="center"><a href="delete_category.php?id='.$resultset->id.'">Delete</a></div></td>
			  </tr>';

		} // while

		}else{ // if $row_cnt >0
	    $this->htmldata .= '<tr><td colspan ="5" align="center"><br /><br /><h3 class="h3simple">No Record</h3></td></tr></table>';
		}

		} // if
  
	$this->htmldata .= '</table>';
	
	return $this->htmldata;
  
  } //function DrawSubCatManager


function ChangeOrder($id,$direction){
	global $mysqli;
	
	if($direction == 1){ // UP DIRECTION
		$sqlorderid = "SELECT pid, orderid FROM content WHERE id ='".$id."'";
		if ($resultorderid = $mysqli->query($sqlorderid)){
		$roworderid = mysqli_fetch_object($resultorderid);
		}else{
		return 0;
		}

		$sql = "SELECT id,orderid FROM content WHERE pid = '".$roworderid->pid."' AND orderid < '".$roworderid->orderid."' ORDER BY orderid DESC LIMIT 1";
		if ($result = $mysqli->query($sql)){
		$row = mysqli_fetch_object($result);
		}
		$sql1 = "UPDATE content SET orderid = '".$roworderid->orderid."' WHERE id ='".$row->id."'";
		$sql2 = "UPDATE content SET orderid = '".$row->orderid."' WHERE id ='".$id."'";
		
		if ($result1 = $mysqli->query($sql1) && $result2 = $mysqli->query($sql2)){
		return 1;
		}else{
		return 0;
		}
	}


	if($direction == 2){ // DOWN DIRECTION
		$sqlorderid = "SELECT pid, orderid FROM content WHERE id ='".$id."'";
		if ($resultorderid = $mysqli->query($sqlorderid)){
		$roworderid = mysqli_fetch_object($resultorderid);
		}else{
		return 0;
		}

		$sql = "SELECT id,orderid FROM content WHERE pid = '".$roworderid->pid."' AND orderid > '".$roworderid->orderid."' ORDER BY orderid ASC LIMIT 1";
		if ($result = $mysqli->query($sql)){
		$row = mysqli_fetch_object($result);
		}
		$sql1 = "UPDATE content SET orderid = '".$roworderid->orderid."' WHERE id ='".$row->id."'";
		$sql2 = "UPDATE content SET orderid = '".$row->orderid."' WHERE id ='".$id."'";
		
		if ($result1 = $mysqli->query($sql1) && $result2 = $mysqli->query($sql2)){
		return 1;
		}else{
		return 0;
		}
	}

} // function ChangeOrder


function ChangeCatOrder($id,$direction){
	global $mysqli;
	
	if($direction == 1){ // UP DIRECTION
		$sqlorderid = "SELECT pid, orderid FROM categories WHERE id ='".$id."'";
		if ($resultorderid = $mysqli->query($sqlorderid)){
		$roworderid = mysqli_fetch_object($resultorderid);
		}

		$sql = "SELECT id,orderid FROM categories WHERE pid = '".$roworderid->pid."' AND orderid < '".$roworderid->orderid."' ORDER BY orderid DESC LIMIT 1";
		if ($result = $mysqli->query($sql)){
		$row = mysqli_fetch_object($result);
		}
		$sql1 = "UPDATE categories SET orderid = '".$roworderid->orderid."' WHERE id ='".$row->id."'";
		$sql2 = "UPDATE categories SET orderid = '".$row->orderid."' WHERE id ='".$id."'";
		
		if ($result1 = $mysqli->query($sql1) && $result2 = $mysqli->query($sql2)){
		return 1;
		}else{
		return 0;
		}
	}


	if($direction == 2){ // DOWN DIRECTION
		$sqlorderid = "SELECT pid, orderid FROM categories WHERE id ='".$id."'";
		if ($resultorderid = $mysqli->query($sqlorderid)){
		$roworderid = mysqli_fetch_object($resultorderid);
		}

		$sql = "SELECT id,orderid FROM categories WHERE pid = '".$roworderid->pid."' AND orderid > '".$roworderid->orderid."' ORDER BY orderid ASC LIMIT 1";
		if ($result = $mysqli->query($sql)){
		$row = mysqli_fetch_object($result);
		}
		$sql1 = "UPDATE categories SET orderid = '".$roworderid->orderid."' WHERE id ='".$row->id."'";
		$sql2 = "UPDATE categories SET orderid = '".$row->orderid."' WHERE id ='".$id."'";
		
		if ($result1 = $mysqli->query($sql1) && $result2 = $mysqli->query($sql2)){
		return 1;
		}else{
		return 0;
		}
	}

} // function ChangeCatOrder





function getBatchStatus($batchid){
	global $mysqli;
	
		$sql = "SELECT status FROM batch WHERE id ='".$batchid."'";
		if ($this->result = $mysqli->query($sql)){
		$resultset = mysqli_fetch_object($this->result);
		return $resultset;
		}else{
		return 0;
		}
	

	
} // function getBatchStatus


function ChangeBatchStatus($batchid,$status){
	global $mysqli;
	
		$sql = "UPDATE batch SET status = '".$status."' WHERE id ='".$batchid."'";
		if ($this->result = $mysqli->query($sql)){
		return 1;
		}else{
		return 0;
		}
	

	
} // function ChangeBatchStatus



function IsParentPage(){
global $mysqli;
$sql = "SELECT id FROM content WHERE pid ='".$this->pgid."'";
if ($this->result = $mysqli->query($sql)) {
$row_cnt = $this->result->num_rows;
return $row_cnt;
}else{
return 0;
}
} //function IsParentPage



function IsParentCat(){
global $mysqli;
$sql = "SELECT id FROM categories WHERE pid ='".$this->ctid."'";
if ($this->result = $mysqli->query($sql)) {
$row_cnt = $this->result->num_rows;
return $row_cnt;
}else{
return 0;
}
} //function IsParentPage


function PageDelete(){
global $mysqli;
$sql = "DELETE FROM content WHERE pid ='".$this->pgid."' OR id ='".$this->pgid."'";
if ($this->result = $mysqli->query($sql)) {
return 1;
}else{
return 0;
}

} //function PageDelete

function CatDelete(){
global $mysqli;
$sql = "DELETE FROM categories WHERE pid ='".$this->ctid."' OR id ='".$this->ctid."'";
if ($this->result = $mysqli->query($sql)) {
$sql2 = "DELETE FROM categories_content WHERE cid ='".$this->ctid."' OR pid ='".$this->ctid."'";
if ($this->result = $mysqli->query($sql2)) {
return 1;
}
}else{
return 0;
}
} //function CatDelete


function ChangeStatus(){
	global $mysqli;

		$sqlstatus = "SELECT isactive FROM content WHERE id ='".$this->pgid."'";
		if ($resultstatus = $mysqli->query($sqlstatus)){
		$rowstatus = mysqli_fetch_object($resultstatus);
		}
		if($rowstatus->isactive == 0){
		$newstatus = 1;
		}else{
		$newstatus = 0;
		}

		$sql = "UPDATE content SET isactive = '".$newstatus."' WHERE id = '".$this->pgid."'";
		if ($result = $mysqli->query($sql)){
		return 1;
		}else{
		return 0;
		}
	} // function ChangeStatus


function ChangeFeedbackStatus(){
	global $mysqli;

		$sqlstatus = "SELECT approved FROM feedback WHERE id ='".$this->feedid."'";
		if ($resultstatus = $mysqli->query($sqlstatus)){
		$rowstatus = mysqli_fetch_object($resultstatus);
		}
		if($rowstatus->approved == 0){
		$newstatus = 1;
		}else{
		$newstatus = 0;
		}

		$sql = "UPDATE feedback SET approved = '".$newstatus."' WHERE id = '".$this->feedid."'";
		if ($result = $mysqli->query($sql)){
		return 1;
		}else{
		return 0;
		}
	} // function ChangeFeedbackStatus



function ChangeTestimonialStatus(){
	global $mysqli;

		$sqlstatus = "SELECT approved FROM testimonial WHERE id ='".$this->testimonialid."'";
		if ($resultstatus = $mysqli->query($sqlstatus)){
		$rowstatus = mysqli_fetch_object($resultstatus);
		}
		if($rowstatus->approved == 0){
		$newstatus = 1;
		}else{
		$newstatus = 0;
		}

		$sql = "UPDATE testimonial SET approved = '".$newstatus."' WHERE id = '".$this->testimonialid."'";
		if ($result = $mysqli->query($sql)){
		return 1;
		}else{
		return 0;
		}
	} // function ChangeTestimonialStatus



function setSecuritySalt(){
	$this->securitysalt = "NHISALT";
	//return $this->securitysalt;
	} //function getSecuritySalt


function setUserDetails($user,$pass){
	$this->username = $user;
	$this->password = $pass;
	} //function setUserDetails


function loginCheck(){
	global $mysqli;
	$sqllogin = "SELECT id,username,usertype FROM users WHERE username ='".$this->username."' AND password = '".md5($this->securitysalt.$this->password.$this->securitysalt)."' AND isactive='1'";
	if ($this->result = $mysqli->query($sqllogin)){
	if($this->result->num_rows>0){
	$rowlogin = mysqli_fetch_object($this->result);
	return $rowlogin;
	}else{
	return 0;
	}
	}
} //function loginCheck



function OldPasswordOK($oldpassword,$userid){
	global $mysqli;
	$sqllogin = "SELECT password FROM users WHERE id ='".$userid."'  AND password ='".md5($this->securitysalt.$oldpassword.$this->securitysalt)."' AND isactive='1'";
	if ($this->result = $mysqli->query($sqllogin)){
	if($this->result->num_rows>0){
	return 1;
	}else{
	return 0;
	}
	}
} //function OldPasswordOK


function ChangePassword($password, $userid){
	global $mysqli;
	$sqllogin = "UPDATE users SET password ='".md5($this->securitysalt.$password.$this->securitysalt)."' WHERE  id='".$userid."'";
	if ($this->result = $mysqli->query($sqllogin)){
	return 1;
	}
	else{
	return 0;
	}
} //function ChangePassword


function getUserDetails($userid){
	global $mysqli;
	$sql = "SELECT email,phone,other_details FROM users WHERE id='".$userid."'";
	if ($this->result = $mysqli->query($sql)){
	return	mysqli_fetch_object($this->result);
	}else{
	return 0;
	}
} //function getUserDetails


function getUserNameDetails($userid){
	global $mysqli;
	$sql = "SELECT fname,lname,username FROM users WHERE id='".$userid."'";
	if ($this->result = $mysqli->query($sql)){
	return	mysqli_fetch_object($this->result);
	}else{
	return 0;
	}
} //function getUserDetails


function EditUserDetails($userid,$email,$phone,$otherdetails){
	global $mysqli;
	$sql = "UPDATE users SET email ='".$email."', phone ='".$phone."', other_details ='".$otherdetails."' WHERE  id='".$userid."'";
	if ($this->result = $mysqli->query($sql)){
	return 1;
	}else{
	return 0;
	}
} //function EditUserDetails



} // class DBfunctions
?>