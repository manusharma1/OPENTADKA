function hide_div(){
document.getElementById('subdepartm').style.visibility = 'hidden'; 
}

function ajaxFunctionSubDepartment(selindexval){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			document.getElementById('subdepartm').innerHTML = ajaxRequest.responseText;
		}
	}
	
	var queryString = "?id=" + selindexval;
	ajaxRequest.open("GET", "ajaxgetsubdepartment.php" + queryString, true);
	ajaxRequest.send(null); 
}