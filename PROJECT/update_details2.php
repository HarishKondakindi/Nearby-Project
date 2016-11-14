<?php
  session_start();
  if(!isset($_SESSION["admin"])){
    echo "You must login as Admin to continue<br><br>";
       echo "<a href=\"admin.php\">Click here to login</a>";
  }else{
?>


<head>
	<link rel="stylesheet" type="text/css" href="update.css">
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
</head>

<body>
<a href="adminLogout.php">Logout</a>
  <div id="update">
	<h5>Select a category</h5>
	<input type="radio" name="category" value="shop" id="shopR" checked>Shop
	<input type="radio" name="category" value="hotel" id="hotelR">Hotel
	<input type="radio" name="category" value="housing" id="houseR">Housing
	<input type="radio" name="category" value="medics" id="medicsR">Medics
	<input type="radio" name="category" value="clothing" id="clothR">Clothing<br>
  </div>	

  <div id="buttons">
  	<input type="button" name="updateButton" value="Update" id="upButton">
  	<input type="button" name="CreateButton" value="Create New" id="crtButton">
  </div>

  <div id="shopUpdate" style="display:none;">
    <p>Enter pincode:
       <input type="text" name="pincode"><br>
       Enter Name:
       <input type="text" name="shopname" id="shopname"><br>
       <input type="button" name="shopsearch" id="shopsearchButton" value="Search">
    </p>	
    <p style="display:none;">
       <input type="text" name="category2" id="category2">
     </p>
  </div>

 <div id="shopCreate" style="display: none;">
   <form id="shopCreateForm" action ="insertdata.php" method="POST" enctype="multipart/form-data">
     <p>Enter Name:
       <input type="text" name="shopname" id="shopnameCreate">
     </p>
     <p>Pincode:
       <input type="text" name="pincode" id="pincodeCreate">
     </p>
     <p>Address:
       <input type="text" name="address" id="addressCreate">
     </p>
     <p>Image:
       <input type="file" name="photo" id="photoCreate">
     </p>
     <p style="display: block;" id="typeP">Type:
       <input type="text" name="type" id="typeCreate">
     </p>
     <p style="display: none" id="menuP">Menu:
       <input type="text" name="menu" id="menuCreate">
     </p>
     <p>Phone:
       <input type="text" name="phone" id="phoneCreate">
     </p>
     <p style="display:block;" id="otherP">Other:
       <input type="text" name="other" id="otherCreate">
     </p>
     <p style="display:none;" id="rentP">Rent:
       <input type="text" name="rent" id="otherCreate">
     </p>
     <p style="display:none;">
       <input type="text" name="category" id="category">
     </p>
     <p>
       <input type="submit" name="insert" id="shopCreateButton" value="Create">
     </p>
   </form>
 </div>

   <div id="shopForm">
    </div>

 
 <script type="text/javascript" src="validation.js"></script>
 <script type="text/javascript" src="update.js"></script> 
</body>

<?php
  }
?>