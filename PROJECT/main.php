
<?php
   session_start();
   if (!isset($_SESSION["user"])) {
       echo "You must login to continue<br><br>";
       echo "<a href=\"index.php\">Click here to login</a>";
   }else{
?>
<head>
<link rel="stylesheet" type="text/css" href="page.css">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<body bgcolor="#FF7F50">
  <div id="header"> 
  	 Welcome, to Nearby
  </div>

  <div id="logout">
     <a href="logout.php">Logout</a>
  </div>
  <h2 id ="hello"> Hello <?php echo $_SESSION["user"] ;?></h2>
<form action="search.php" method="GET">
  <div id ="section">
  	 <p>
  	 	<h1 id="heading">Enter pincode : </h1>
  	 	<input type="text" name="pincode">
  	 </p>
     

  	 <p>                                                                                                                                                                            
  	 	<h1 id="heading">Search for :</h1>
  	 	<select name = "options">
  	 		<option value="shop" selected>shop</option>
        <option value="hotel">Hotels</option>
  	 		<option value="clothing">Clothing</option>
  	 		<option value="housing">Housing</option>
  	 		<option value="hospital">Medics</option>
  	 	</select>
  	 </p>
     <p>
       <input type="submit" name ="search" value="Search">
     </p>
  </div>
  </form>
</body>

<?php
} 
?>