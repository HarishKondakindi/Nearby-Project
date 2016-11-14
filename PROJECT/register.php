<?php session_start();
 
  DEFINE("DB_SERVER","localhost");
 DEFINE("DB_NAME","id154334_nearby");
 DEFINE("DB_USER","id154334_nearby");
 DEFINE("DB_PASS","nearby");
  $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

  if(mysqli_connect_errno()){
  	die("Connection failed..".mysqli_connect_error());
  }
?>

<head>
<link rel="stylesheet" type="text/css" href="page.css">
<script src="validation.js" type="text/javascript"></script>
</head>



<body>
  <div id ="register">
  <form action="register.php" id = "formfill" name ="regform" method="POST" onsubmit="return validateFunction()">
  	 <p>
  	 	Name:
  	 	<input type="text" name="name" id="name1" required="Enter a valid name">
  	 	<div class="errors"><span id="pName" style="font-size: 10px; color:red"></span></div>
  	 </p>
  	 <p>
  	 	Mobile:
  	 	<input type="text" name="mobile" id="mobile1" required>
  	 	<div class="errors"><span id="pMobile" style="font-size: 10px; color:red"></span></div>
  	 </p>
  	 <p>
  	 	Address:
  	 	<input type="text" name="address" id="address1" required>
  	 	<div class="errors"><span id="pAddress" style="font-size: 10px; color:red"></span></div>
  	 </p>
  	  <p>
  	 	Pincode:
  	 	<input type="text" name="pincode" id="pincode1" required="Enter a valid pincode">
  	 	<div class="errors"><span id="pPincode" style="font-size: 10px ;color:red"></span></div>
  	 </p>

  	 <p>
  	 	Username:
  	 	<input type="text" name="username" required>
  	 	<div class="errors"><span id="pUsername" style="font-size: 10px; color:red"></span></div>
  	 </p>

  	 <p>
  	 	Password:
  	 	<input type="password" name="password" id="password1" required>
  	 	<div class="errors"><span id="pPassword" style="font-size: 10px; color:red"></span></div>
  	 </p>
  	 <p style="font-size:70%">
  	   Password must be atleast 8 characters..
  	 </p>
  	 <p>
  	 	<input type="submit" name="submit" value="Submit" id="bSubmit"> 
  	 </p>
  </form>
  
</div>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
</body>
 

 <?php 
 
  if(isset($_POST['submit'])){
    $phone = $_POST["mobile"];
  $password = $_POST["password"];
  $name = $_POST["name"];
  $username= $_POST["username"];
  $address  =$_POST["address"];
  $pincode=$_POST["pincode"];
  if ( strlen($username) >0) {
    $options['cost']=9;
    $passwordHash=password_hash($password,PASSWORD_DEFAULT,$options);

        $query2 = "select user_name from users where user_name='{$username}'";
        $result2=mysqli_query($connection,$query2);
        if($result2 and mysqli_fetch_assoc($result2)["user_name"] ==$username){
          echo "<script> validateRegister();</script>";
        }else{

       $query = "insert into users (Name,user_name,hashed_password,address,pincode,mobile) values ('{$name}','{$username}','{$passwordHash}','{$address}','{$pincode}','{$phone}')";
       $result  =mysqli_query($connection,$query);
          if($result){
             echo "<script> document.getElementById(\"register\").style.display = \"none\";</script>";
             echo "Successfully created account!<br><br>";
             echo "<a href=\"index.php\">Click here to login</a>";
          }
       } 
    } 
}  
     else{
      echo "You have to register.<br><a href=\"register.php\">Click here</a>";
     }
 ?>