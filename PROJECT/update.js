document.getElementById("upButton").onclick = function(){

	if($('#shopR').attr('checked')){
	if(document.getElementById("shopCreate").style.display=="block")
		document.getElementById("shopCreate").style.display = "none";
    document.getElementById("shopUpdate").style.display = "block";
    }else if($('#hotelR').is(':checked')){
       if(document.getElementById("hotelCreate").style.display=="block")
		document.getElementById("hotelCreate").style.display = "none";
    document.getElementById("hotelUpdate").style.display = "block";
    }else if($('#houseR').is(':checked')){
       if(document.getElementById("houseCreate").style.display=="block")
		document.getElementById("houseCreate").style.display = "none";
    document.getElementById("houseUpdate").style.display = "block";
    }else if($('#medicsR').is(':checked')){
       if(document.getElementById("medicsCreate").style.display=="block")
		document.getElementById("medicsCreate").style.display = "none";
    document.getElementById("medicsUpdate").style.display = "block";
    }else if($('#clothR').is(':checked')){
       if(document.getElementById("clothCreate").style.display=="block")
		document.getElementById("clothCreate").style.display = "none";
    document.getElementById("clothUpdate").style.display = "block";
    }
};

 

 $("#shopsearchButton").click(function(){
 	if($('#shopR').is(':checked')){
 	document.getElementById("category2").setAttribute("value", "shop");
    }else if($('#hotelR').is(':checked')){
 	document.getElementById("category2").setAttribute("value", "hotel");
    }else if($('#houseR').is(':checked')){
 	document.getElementById("category2").setAttribute("value", "house");
    }else if($('#medicsR').is(':checked')){
 	document.getElementById("category2").setAttribute("value", "medics");
    }else if($('#clothR').is(':checked')){
 	document.getElementById("category2").setAttribute("value", "cloth");
    }
     $.post("loaddata.php",
     	    { Name: $("#shopname").val(),Category:$("#category2").val() },
     	    function(data){
     	    	$("#shopForm").html(data);
     	    } 
     	);
     
 });

function validateUpdate(){
	var name = $("#shopName").val();
	var phone = $("#shopPhone").val();
	var regex2 = /[a-zA-Z]/;
	var status = false;
	if(regex2.test(phone) || phone.length >10 || phone.length<10){
       $("#shopPhoneError").html("Invalid number");
       status = false;
	}else{
	  status= true;
	  var filesize = $("#photoUpload").size; //gives Size in bytes.
      var filename = $("#photoUpload").name;   //say file name "abcd.xls"
      alert(filesize);
      var lastIndex = filename.lastIndexOf(".");    //index of . that is 4 
      var extension1 = filename.substring(lastIndex);   //will give ".xls"
      var extension2 = filename.substring(lastIndex+1); 
      if(filesize > 1048576) {
      	var fileerr = "File size should be less than 1MB";
      	$("#fileError").html(fileerr);
      	status = false;
      }
      if(extension2 != "jpg" || extension2!="jpeg" || extension2 !="png"){
         var fileerr = "Unsupported file type";
         $("#fileError").html(fileerr);
      	 status = false;
      }
	}
	return status;
}

/*$("#updateForm").submit(function(){
	$.get('loaddata.php',function(data){ 
		var tr = "true";
		alert("hai");
		if(data==tr){
        alert("success");
		window.location ="http://localhost:82/nearby_project/update_details.php";} }
		);
});*/





document.getElementById("crtButton").onclick = function(){
	if($('#shopR').is(':checked')){
	if(document.getElementById("shopUpdate").style.display=="block")
		document.getElementById("shopUpdate").style.display = "none";
    document.getElementById("shopCreate").style.display = "block";
    document.getElementById("category").setAttribute("value", "shop");
    }else if($('#hotelR').is(':checked')){
    if(document.getElementById("shopUpdate").style.display=="block")
		document.getElementById("shopUpdate").style.display = "none";
    document.getElementById("shopCreate").style.display = "block";
    document.getElementById("typeP").style.display = "none";
    document.getElementById("menuP").style.display = "block";
    document.getElementById("category").setAttribute("value", "hotel");

    }else if($('#houseR').is(':checked')){
     if(document.getElementById("shopUpdate").style.display=="block")
		document.getElementById("shopUpdate").style.display = "none";
	document.getElementById("shopCreate").style.display = "block";
    document.getElementById("otherP").style.display = "none";
    document.getElementById("rentP").style.display = "block";
    document.getElementById("menuP").style.display = "none";
    document.getElementById("typeP").style.display = "none";
    document.getElementById("category").setAttribute("value", "house");

    }else if($('#medicsR').is(':checked')){
     if(document.getElementById("shopUpdate").style.display=="block")
		document.getElementById("shopUpdate").style.display = "none";
    document.getElementById("shopCreate").style.display = "block";
    document.getElementById("otherP").style.display = "block";
    document.getElementById("rentP").style.display = "none";
    document.getElementById("menuP").style.display = "none";
    document.getElementById("category").setAttribute("value", "medics");


    }else if($('#clothR').is(':checked')){
     if(document.getElementById("shopUpdate").style.display=="block")
		document.getElementById("shopUpdate").style.display = "none";
    document.getElementById("shopCreate").style.display = "block";
    document.getElementById("typeP").style.display = "none";
    document.getElementById("rentP").style.display = "none";
    document.getElementById("menuP").style.display = "none";
    document.getElementById("otherP").style.display = "block";
    document.getElementById("category").setAttribute("value", "cloth");
    }
};


  