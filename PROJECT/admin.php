<?php
   session_start();
?>

<head>
<link rel="stylesheet" type="text/css" href="page.css">
</head>

<body>
<div id = "login">
	<form id="admin" action= "adminLogin.php" method= "POST">
		<p>
  	 	Username:
  	 	<input type="text" name="username">
  	    </p>

  	    <p>
  	 	Password:
  	 	<input type="password" name="password">
  	    </p>
  	    <p>
         <?php if(isset($_SESSION["message"])){
   	 	   $output = "<div id = \"message\">";
   	 	   $output .= htmlentities($_SESSION["message"]);
   	 	   $output .= "</div>";
   	 	   $_SESSION["message"] = null; 
   	 	   echo $output;
   	       }
   	     ?>
   	    </p>
   	    <input type="submit" name="loginAdmin" value="Login">
	</form>
 </div> 
</body>
