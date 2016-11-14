<?php
   session_start();
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

<div id="adminlogin">
  <a href="admin.php" style="padding-left: 950px; padding-top: 150px;">Iam an Admin</a>
</div>
	<div id ="login">
  <form action="index.php" method="POST" onsubmit="return validateLogin();">
  	 <p>
  	 	Username:
  	 	<input type="text" name="username" id="usernameL">
  	 </p>

  	 <p>
  	 	Password:
  	 	<input type="password" name="password" id="passwordL">
  	 </p>
     <div id="errorLogin">
       
   	 </div>
  	 <p>
  	 	<input type="submit" name="login" value="Login">
      <input type="submit" name="register" value="Register">
  	 </p>
  </form>
  
</div>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
</body>

<?php
 if (isset($_POST["login"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
    $user = $_POST["username"];
    $password = $_POST["password"]; 
    $query = "select user_name,hashed_password from users where user_name = '{$user}'";

     $result = mysqli_query($connection,$query);
     $user_result = mysqli_fetch_assoc($result);
     if($result){
         if (password_verify($password,$user_result["hashed_password"])) {
             $_SESSION["user"] = $user;
 
            $location  = "main.php";
            header("Location: ".$location);
             exit();  
         }else{
          
          echo "<script> validateLogin2();</script>";
         }
      }else{
         $_SESSION["message"] = "Oops!!Something went wrong.";
      }
  }else if (isset($_POST["register"])) {
    $location = 'register.php';
    header("Location: ".$location);
    exit();
  }
  else{
    echo "<script> validateLogin3();</script>";
  }
  
?>