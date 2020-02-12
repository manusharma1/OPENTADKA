function validate_form(thisform)
{

var inst = FCKeditorAPI.GetInstance("pagecontent");
var pcontentValue = inst.GetHTML();
	
	valid = true;

	if (thisform.pagename.value == ""){
        alert ( "Please enter the Page Name" );
        valid = false;
    }

	if (pcontentValue == ""){
        alert ( "Please enter the Page Content" );
        valid = false;
    }

    return valid;
}

function validate_form_add_entry(thisform)
{

    valid = true;

	if (thisform.companyname.value == ""){
        alert ( "Please select the Company Name" );
        valid = false;
    }

	if (thisform.companyphone.value == ""){
        alert ( "Please select the Company Phone" );
        valid = false;
    }

	if (thisform.companyaddress.value == ""){
        alert ( "Please select the Company Address" );
        valid = false;
    }

	if (thisform.companycity.value == ""){
        alert ( "Please select the Company City" );
        valid = false;
    }

	if (thisform.companycountry.value == ""){
        alert ( "Please select the Company Country" );
        valid = false;
    }

	if (thisform.companyemail.value == ""){
        alert ( "Please select the Company Email" );
        valid = false;
    }

	
	if (thisform.companywebsite.value == ""){
        alert ( "Please enter the Company Website" );
        valid = false;
    }

	if (thisform.billingname.value == ""){
        alert ( "Please select the Company Billing Name" );
        valid = false;
    }

	if (thisform.billingphone.value == ""){
        alert ( "Please select the Company Billing Phone" );
        valid = false;
    }

	if (thisform.billingemail.value == ""){
        alert ( "Please select the Company Billing Email" );
        valid = false;
    }

	if (thisform.billingaddress.value == ""){
        alert ( "Please select the Company Billing Address" );
        valid = false;
    }

	if (thisform.billingcity.value == ""){
        alert ( "Please select the Company Billing City" );
        valid = false;
    }

	if (thisform.billingcountry.value == ""){
        alert ( "Please select the Company Billing Country" );
        valid = false;
    }

	if (thisform.description.value == ""){
        alert ( "Please enter the Description" );
        valid = false;
    }

	if (thisform.department.value == ""){
        alert ( "Please select the Department" );
        valid = false;
    }

	if (thisform.subdepartment.value == ""){
        alert ( "Please select the Sub Department" );
        valid = false;
    }

	if (thisform.ppackage.value == ""){
        alert ( "Please select the Package" );
        valid = false;
    }


	return valid;

}


function validate_form_add_freestuff_entry(thisform)
{

    valid = true;

	if (thisform.name.value == ""){
        alert ( "Please enter the Name" );
        valid = false;
    }

	
	if (thisform.website.value == ""){
        alert ( "Please enter the Website" );
        valid = false;
    }

	if (thisform.description.value == ""){
        alert ( "Please enter the Description" );
        valid = false;
    }

	if (thisform.category.value == ""){
        alert ( "Please select the Category" );
        valid = false;
    }

	return valid;

}


function validate_form_sub(thisform)
{

	var inst = FCKeditorAPI.GetInstance("pagecontent");
	var pcontentValue = inst.GetHTML();

    valid = true;

	if (thisform.pagename.value == ""){
        alert ( "Please enter the Page Name" );
        valid = false;
    }

	if (thisform.parent.value == ""){
        alert ( "Please select the Parent Page" );
        valid = false;
    }
	
	if (pcontentValue == ""){
        alert ( "Please enter the Page Content" );
        valid = false;
    }

	return valid;
}


function validate_header_rightside_ads_form(thisform)
{
    valid = true;

	if ((thisform.bannerlink1.value != "" && thisform.rightside_ad1.value=="") || (thisform.bannerlink1.value == "" && thisform.rightside_ad1.value!="")){
        alert ( "Either Ad 1 file or link is missing.\nPlease enter Ad 1 File and  Ad 1 Link to continue." );
		valid = false;
    }


	if ((thisform.bannerlink2.value != "" && thisform.rightside_ad2.value=="") || (thisform.bannerlink2.value == "" && thisform.rightside_ad2.value!="")){
        alert ( "Either Ad 2 file or link is missing.\nPlease enter Ad 2 File and  Ad 2 Link to continue." );
		valid = false;
    }


	if ((thisform.bannerlink3.value != "" && thisform.rightside_ad3.value=="") || (thisform.bannerlink3.value == "" && thisform.rightside_ad3.value!="")){
        alert ( "Either Ad 3 file or link is missing.\nPlease enter Ad 3 File and  Ad 3 Link to continue." );
		valid = false;
    }


	if ((thisform.bannerlink4.value != "" && thisform.rightside_ad4.value=="") || (thisform.bannerlink4.value == "" && thisform.rightside_ad4.value!="")){
        alert ( "Either Ad 4 file or link is missing.\nPlease enter Ad 4 File and  Ad 4 Link to continue." );
		valid = false;
    }


	return valid;
}


function validate_siteoftheweek_form(thisform)
{
    valid = true;

	if (thisform.sitelink.value == "" || thisform.siteoftheweek_ad.value=="" || thisform.sitename.value==""){
        alert ( "All fields are required please enter all the details correctly." );
		valid = false;
    }

	return valid;
}



function validate_form_passchange(thisform){

    valid = true;

	if (thisform.oldpass.value == ""){
        alert ( "Please enter Old Password" );
        valid = false;
    }

	if (thisform.pass.value == ""){
        alert ( "Please enter New Password" );
        valid = false;
    }
	
	if (thisform.pass2.value == ""){
        alert ( "Please enter New Password again" );
        valid = false;
    }

	if (thisform.pass.value != thisform.pass2.value){
        alert ( "New Passwords doesn't match" );
        valid = false;
    }

	return valid;

}


function validate_form_add_cat(thisform){

    valid = true;

	if (thisform.catname.value == ""){
        alert ( "Please Enter category name" );
        valid = false;
    }

	if (thisform.catparent.value == ""){
        alert ( "Please select the Parent" );
        valid = false;
    }
	
	return valid;

}


function validate_form_login(thisform){

    valid = true;

	if (thisform.user.value == ""){
        alert ( "Please Enter Username" );
        valid = false;
    }

	if (thisform.pass.value == ""){
        alert ( "Please Enter Password" );
        valid = false;
    }
	
	return valid;

}


function validate_header_footer_ads_form(thisform){
    valid = true;

	if (thisform.header_ad1.value == "" && thisform.footer_ad1.value == "" && thisform.footer_ad2.value == "" && thisform.footer_ad3.value == "" && thisform.footer_ad4.value == "" && thisform.footer_ad5.value == "" && thisform.footer_ad6.value == ""){
        alert ( "Please upload header or footer advertisement file" );
        valid = false;
    }

	return valid;
}


function validate_rightside_ads_form(thisform){
    valid = true;

	if (thisform.rightside_ad1.value == "" && thisform.rightside_ad2.value == "" && thisform.rightside_ad3.value == "" && thisform.rightside_ad4.value == ""){
        alert ( "Please upload advertisement file" );
        valid = false;
    }

	return valid;
}

function del_cat_ads(cid,num){
	if(confirm("Are you Sure you want delete this ad?")){
	document.location.href="del_category_banners.php?num="+num+"&id="+cid;
	return false;
	}else{
	document.location.href="edit_category_banners.php?id="+cid;
	return true;
	}
}


function del_cat_ads2(cid,num){
	if(confirm("Are you Sure you want delete this ad?")){
	document.location.href="del_category_banners.php?num="+num+"&id="+cid;
	return false;
	}else{
	document.location.href="manage_home_rightside_ads.php";
	return true;
	}
}

function del_fs_ads(cid,num){
	if(confirm("Are you Sure you want delete this ad?")){
	document.location.href="del_freestuff_banners.php?num="+num+"&id="+cid;
	return false;
	}else{
	document.location.href="edit_freestuff_banners.php?id="+cid;
	return true;
	}
}


function del_hf_ads(num){
	if(confirm("Are you Sure you want delete this ad?")){
	document.location.href="del_hf_banners.php?num="+num;
	return false;
	}else{
	document.location.href="manage_header_footer_ads.php";
	return true;
	}
}
