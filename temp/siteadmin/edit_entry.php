<?php
include("include.php");
$DBObject = new DBfunctions();
$seclink = new SECfunctions();


if(isset($_GET['id'])){
$id = $_GET['id'];
$DBObject->setEntry($id);

	if($DBObject->checkEntryExistance()==0){
	$_SESSION['message'] = "Site Error";
	header("Location:manage_categories.php");
	}else{
		$resultset = $DBObject->editEntryContent();
			if($resultset == 0){
			$_SESSION['message'] = "Site Error";
			header("Location:manage_categories.php");
			}
	// User Details //

	$siteuserid = $seclink->escape_protection_decode($resultset->siteuserid);
	$DBObject->SetSiteUser($siteuserid);
	$resultsetsiteuser = $DBObject->GetSiteUserDetails($siteuserid);

	// User Details //
	
	}
}

if(isset($_POST['Submit']) && isset($_POST['IsSubmit']) && $_POST['IsSubmit']=="1"){

	$companyname = $seclink->escape_protection($_POST['companyname']);
	$companyphone = $seclink->escape_protection($_POST['companyphone']);
	$companyemail = $seclink->escape_protection($_POST['companyemail']);
	$companyaddress = $seclink->escape_protection($_POST['companyaddress']);
	$companyaddress2 = $seclink->escape_protection($_POST['companyaddress2']);
	$companyaddress3 = $seclink->escape_protection($_POST['companyaddress3']);
	$companycity = $seclink->escape_protection($_POST['companycity']);
	$companycountry = $seclink->escape_protection($_POST['companycountry']);
	$companywebsite = $seclink->escape_protection($_POST['companywebsite']);
	$description = $seclink->escape_protection($_POST['description']);
	$department = $seclink->escape_protection($_POST['department']);
	$subdepartment = $seclink->escape_protection($_POST['subdepartment']);
	$package = $seclink->escape_protection($_POST['ppackage']);
	$isecommerce= $seclink->escape_protection($_POST['isecommerce']);
	$isactive = $seclink->escape_protection($_POST['isactive']);

	if($resultset->catid != $department || $resultset->subcatid != $subdepartment){
	$orderidchange = 1;
	}else{
	$orderidchange = 0;	
	}


	$billingname = $seclink->escape_protection($_POST['billingname']);
	$billingphone = $seclink->escape_protection($_POST['billingphone']);
	$billingemail = $seclink->escape_protection($_POST['billingemail']);
	$billingfax = $seclink->escape_protection($_POST['billingfax']);
	$billingaddress = $seclink->escape_protection($_POST['billingaddress']);
	$billingaddress2 = $seclink->escape_protection($_POST['billingaddress2']);
	$billingaddress3 = $seclink->escape_protection($_POST['billingaddress3']);
	$billingcity = $seclink->escape_protection($_POST['billingcity']);
	$billingcountry = $seclink->escape_protection($_POST['billingcountry']);

	
	$id = $seclink->escape_protection($_POST['id']);
	$DBObject->setEntry($id);


	$dbresult = $DBObject->EditEntry($companyname,$companyphone,$companyaddress,$companycity,$companycountry,$companyemail,$companywebsite,$description,$department,$subdepartment,$package,$billingname,$billingphone,$billingemail,$billingfax,$billingaddress,$billingaddress2,$billingaddress3,$billingcity,$billingcountry,$isecommerce,$isactive,$orderidchange);


	if($dbresult==1){
	$_SESSION['message'] = "Entry Edited";
	header("Location:manage_sub_category_links.php?id=".$subdepartment);
	}else{
	$_SESSION['message'] = "Site Error, Please try again";
	header("Location:cms_manager.php");
	}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>admin</title>
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php include("include_js_css.php"); // CSS and JS Functions //?>
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><?php include("admin_header.php")?></td>
  </tr>
  <tr>
    <td width="181" height="11"></td>
    <td bgcolor="#A7B0BC"></td>
    <td height="11"></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#E2E5E9" height="450"><?php include("admin_left_menu.php");?></td>
    <td width="1" valign="top" bgcolor="#A7B0BC"></td>
    <td align="left" valign="top">

<table width="100%"  border="1" cellpadding="4" cellspacing="4" bgcolor="#6666CC">
  <tr>
    <td class="heading">&nbsp;CMS &gt; EDIT ENTRY </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><form name="addnewentry" id="addnewentry" method="post" action="" onsubmit="return validate_form_add_entry(this);">
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="30%" class="normaltext">Contact Name</td>
          <td width="70%"><input name="name" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultsetsiteuser->contact_name); ?>" READONLY class="textareawithyellowbg"/></td>
        </tr>
        <tr>
          <td width="30%" class="normaltext">Contact Phone</td>
          <td width="70%"><input name="phone" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultsetsiteuser->contact_phone); ?>" READONLY class="textareawithyellowbg"/></td>
        </tr>
        <tr>
          <td width="30%" class="normaltext">Company Name *</td>
          <td width="70%"><input name="companyname" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_name); ?>"></td>
        </tr>
        <tr>
          <td width="30%" class="normaltext">Company Phone *</td>
          <td width="70%"><input name="companyphone" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_phone); ?>"></td>
        </tr>
        <tr>
          <td width="30%" class="normaltext">Company Address *</td>
          <td width="70%"><input name="companyaddress" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_address); ?>"></td>
        </tr>
		<tr>
          <td width="30%" class="normaltext">Company Address2</td>
          <td width="70%"><input name="companyaddress2" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_address2); ?>"></td>
        </tr>
		<tr>
          <td width="30%" class="normaltext">Company Address3</td>
          <td width="70%"><input name="companyaddress3" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_address3); ?>"></td>
        </tr>
		<tr>
          <td width="30%" class="normaltext">Company City*</td>
          <td width="70%"><input name="companycity" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_city); ?>"></td>
        </tr>
		<tr>
          <td width="30%" class="normaltext">Company Country *</td>
          <td width="70%"><input name="companycountry" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_country); ?>"></td>
        </tr>
        <tr>
          <td width="30%" class="normaltext">Company Email *</td>
          <td width="70%"><input name="companyemail" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_email); ?>"></td>
        </tr>
        <tr>
          <td width="30%" class="normaltext">Company Website *</td>
          <td width="70%"><input name="companywebsite" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_website); ?>"></td>
        </tr>
		 <tr>
          <td width="30%" class="normaltext">Company Billing Name *</td>
          <td width="70%"><input name="billingname" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_bname); ?>"></td>
        </tr>
		<tr>
          <td width="30%" class="normaltext">Company Billing Phone *</td>
          <td width="70%"><input name="billingphone" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_bphone); ?>"></td>
        </tr>
		<tr>
          <td width="30%" class="normaltext">Company Billing Fax </td>
          <td width="70%"><input name="billingfax" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_bfax); ?>"></td>
        </tr>
		<tr>
          <td width="30%" class="normaltext">Company Billing Email *</td>
          <td width="70%"><input name="billingemail" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_bemail); ?>"></td>
        </tr>
		<tr>
          <td width="30%" class="normaltext">Company Billing Address *</td>
          <td width="70%"><input name="billingaddress" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_baddress); ?>"></td>
        </tr>
		<tr>
          <td width="30%" class="normaltext">Company Billing Address2 </td>
          <td width="70%"><input name="billingaddress2" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_baddress2); ?>"></td>
        </tr>
		<tr>
          <td width="30%" class="normaltext">Company Billing Address3 </td>
          <td width="70%"><input name="billingaddress3" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_baddress3); ?>"></td>
        </tr>
		<tr>
          <td width="30%" class="normaltext">Company Billing City *</td>
          <td width="70%"><input name="billingcity" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_bcity); ?>"></td>
        </tr>
		<tr>
          <td width="30%" class="normaltext">Company Billing Country *</td>
          <td width="70%"><input name="billingcountry" type="text" size="50" value="<?php echo $seclink->escape_protection_decode($resultset->company_bcountry); ?>"></td>
        </tr>

        <tr>
          <td width="30%" class="normaltext">Short Description *</td>
          <td width="70%"><textarea name="description" cols="40" rows="5"><?php echo $seclink->escape_protection_decode($resultset->description); ?></textarea></td>
        </tr>
        <tr>
          <td width="30%" class="normaltext">Choose your Department *</td>
          <td width="70%"><select name="department" id="department" onchange="ajaxFunctionSubDepartment(this.value)">
    	  <option value="">--</option>
			<?php
			$selectedvalue = "";
			$parentobject = $DBObject->getAllCatParents(0);
			while ($resultobj = $parentobject->fetch_object()) {
			if($resultset->catid == $resultobj->id){
			$selectedvalue = "SELECTED";
			}else{
			$selectedvalue = "";
			}
			?>
            <option value="<?php echo $resultobj->id; ?>" <?php echo $selectedvalue;?>><?php echo $resultobj->name; ?></option>
            <?php
			}
			?>
          </select></td>
        </tr>
		<tr><td colspan ="2">
        <div id="subdepartm">
		
		<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  <td width="30%" class="normaltext">Choose your Sub Department *</td>
          <td width="70%"><select name="subdepartment" id="subdepartment">
			<option value="">--</option>
			<?php
			$selectedvalue = "";
			$parentobject = $DBObject->getAllCatParents($resultset->catid);
			while ($resultobj = $parentobject->fetch_object()) {
			if($resultset->subcatid == $resultobj->id){
			$selectedvalue = "SELECTED";
			}else{
			$selectedvalue = "";
			}
			?>
            <option value="<?php echo $resultobj->id; ?>" <?php echo $selectedvalue;?>><?php echo $resultobj->name; ?></option>
            <?php
			}
			?>
          </select></td>
		  </tr>
		</table>
		</div> 
		</td>
		</tr>
       <tr>
          <td width="30%" class="normaltext">Choose your Package *</td>
          <td width="70%"><input name="ppackage" type="radio" value="1" <?php if($resultset->package == "1"){echo  "CHECKED"; }?> >
      <span class="normaltext">Plan 1</span>
        <input name="ppackage" type="radio" value="2" <?php if($resultset->package == "2"){echo  "CHECKED"; }?> >
      <span class="normaltext">Plan 2</span></td>
        </tr>

       <tr>
          <td width="30%" class="normaltext">ECommerce Site</td>
          <td width="70%"><input name="isecommerce" type="radio" value="0" <?php if($resultset->isecom == "0"){echo  "CHECKED"; }?> >
      <span class="normaltext">Not an Ecommerce Site</span>
        <input name="isecommerce" type="radio" value="1" <?php if($resultset->isecom == "1"){echo  "CHECKED"; }?> >
      <span class="normaltext">Ecommerce Site</span></td>
        </tr>

       <tr>
          <td width="30%" class="normaltext">Status</td>
          <td width="70%"><input name="isactive" type="radio" value="0" <?php if($resultset->isactive == "0"){echo  "CHECKED"; }?> >
      <span class="normaltext">Not Active</span>
        <input name="isactive" type="radio" value="1" <?php if($resultset->isactive == "1"){echo  "CHECKED"; }?> >
      <span class="normaltext">Active</span></td>
        </tr>

       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>
		 <input type="hidden" name="IsSubmit" value="1">
 		 <input type="hidden" name="id" value="<?php echo $id;?>">
		 <input type="submit" name="Submit" value="Submit"></td>
       </tr>
      </table>
    </form>      </td>
  </tr>
</table>

	</td>
  </tr>
  <tr bgcolor="#A41110">
    <td height="2" colspan="3"></td>
  </tr>
  <tr bgcolor="#597294">
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>
