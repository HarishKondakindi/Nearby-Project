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

  if (isset($_POST["loginAdmin"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
  	$user = $_POST["username"];
  	$password = $_POST["password"]; 
  	echo $user;
  	$query = "select user_name,hashed_password from admin where user_name = '{$user}'";
  	 $result = mysqli_query($connection,$query);
  	 $user_result = mysqli_fetch_assoc($result);
  	 if($result){
         if ($password == $user_result["hashed_password"]) {
         	$_SESSION["admin"] = $user;
 
            $location  = "update_details2.php";
            header("location: ".$location);
 	        exit();	
         }else{
         	$_SESSION["message"] = "invalid userame or password..";
         	  $location = "admin.php";
              header("location: ".$location);
 	         exit();
         }
      }else{
         $_SESSION["message"] = "Invalid username or password..";
        $location = "admin.php";
        header("location: ".$location);
 	    exit();
      }
    }

  if (isset($connection)) {
    mysqli_close($connection);
  }
?>