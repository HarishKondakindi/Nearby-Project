function validateFunction(){
	var name = document.getElementById("name1").value;
	var mobile = document.getElementById("mobile1").value;
	var pincode = document.getElementById("pincode1").value;
	var status = false;
	var regex = /[0-9]/;
	var regex2 = /[a-zA-Z]/;
	if( regex.test(name) ){
       document.getElementById("pName").innerHTML = "invalid";
       status = false;
	}else{
		document.getElementById("pName").innerHTML = "";
	  status=true;
	}

	if(regex2.test(mobile) || mobile.length >10 || mobile.length<10){
       document.getElementById("pMobile").innerHTML = "invalid";
       status = false;
	}else{
		document.getElementById("pMobile").innerHTML = "";
	}

	if(regex2.test(pincode) || pincode.length >6 || pincode.length<6){
      document.getElementById("pPincode").innerHTML = "invalid";
      status = false; 
	}else{
		document.getElementById("pPincode").innerHTML = "";
	}

	 return status;  
}

function validateLogin(){
	status=false;
	if($("#usernameL").val() == "" || $("#passwordL").val()==""){
		$("#errorLogin").html("Please fill in the details..");
	}else
	  status=true;
return status;	  
}

function validateLogin2(){
	$("#errorLogin").html("Invalid username or password");
	return true;
}

function validateLogin3(){
	$("#errorLogin").html("Please fill the  details..");
	return true;
}
function validateRegister(){
	$("#pUsername").html("Username already exists..!");
	return true;
}