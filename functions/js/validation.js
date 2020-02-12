function validate_form_add_entry(thisform)
{

    valid = true;

	if (thisform.name.value == ""){
        alert ( "Please enter the Contact Name" );
        valid = false;
    }

	if (thisform.phone.value == ""){
        alert ( "Please enter the Contact Phone" );
        valid = false;
    }

	if (thisform.email.value == ""){
        alert ( "Please enter the Conatct Email" );
        valid = false;
	}else{

		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = thisform.email.value;

		if(reg.test(address) == false) {
		  alert( "The Contact Email you provided is Invalid" );
		  valid = false;
	   }
	}

	if (thisform.address.value == ""){
        alert ( "Please enter the Contact Address" );
        valid = false;
    }

	if (thisform.city.value == ""){
        alert ( "Please enter the City" );
        valid = false;
    }
	if (thisform.country.value == ""){
        alert ( "Please enter the Country" );
        valid = false;
    }

	if (thisform.companyname.value == ""){
        alert ( "Please enter the Company Name" );
        valid = false;
    }

	if (thisform.companyphone.value == ""){
        alert ( "Please enter the Company Phone" );
        valid = false;
    }

	if (thisform.companyaddress.value == ""){
			alert ( "Please enter the Company Address" );
			valid = false;
	}

	if (thisform.companycity.value == ""){
			alert ( "Please enter the Company City" );
			valid = false;
	}

	if (thisform.companycountry.value == ""){
			alert ( "Please enter the Company Country" );
			valid = false;
	}

	if (thisform.companyemail.value == ""){
        alert ( "Please enter the Company Email" );
        valid = false;
	}else{

		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = thisform.companyemail.value;

		if(reg.test(address) == false) {
		  alert( "The Company Email you provided is Invalid" );
		  valid = false;
	   }
	}

	if (thisform.companywebsite.value == ""){
        alert ( "Please enter the Company Website" );
        valid = false;
    }

	if (thisform.description.value == ""){
        alert ( "Please enter the Description" );
        valid = false;
    }

	return valid;

}


function validate_form_contactus(thisform)
{

    valid = true;

	if (thisform.name.value == ""){
        alert ( "Please enter Your Name" );
        valid = false;
    }

	if (thisform.email.value == ""){
        alert ( "Please enter Your Email" );
        valid = false;
    }

	if (thisform.phone.value == ""){
        alert ( "Please enter Your Phone Number" );
        valid = false;
    }


	if (thisform.companyname.value == ""){
        alert ( "Please enter Your Company Name" );
        valid = false;
    }


	if (thisform.relation.value == ""){
        alert ( "Please select the Relation" );
        valid = false;
    }

	if (thisform.message.value == ""){
        alert ( "Please enter your Message" );
        valid = false;
    }


return valid;

}

function validate_form_passchange(thisform)
{

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

function validate_form_login(thisform)
{

    valid = true;

	if (thisform.emailid.value == ""){
        alert ( "Please Enter your Email ID" );
        valid = false;
    }

	if (thisform.password.value == ""){
        alert ( "Please Enter Password" );
        valid = false;
    }
	
	return valid;

}