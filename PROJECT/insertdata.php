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

   if (isset($_POST["insert"])) {

   	$detail_id="";
   	$shop_pincode = mysqli_real_escape_string($connection,$_POST["pincode"]); 
    $shop_name = mysqli_real_escape_string($connection,$_POST["shopname"]);
    $shop_address = mysqli_real_escape_string($connection,$_POST["address"]);
    $shop_phone = mysqli_real_escape_string($connection,$_POST["phone"]);
    $category= mysqli_real_escape_string($connection,$_POST["category"]);
    if (isset($_POST["type"])) {
    	$shop_type = mysqli_real_escape_string($connection,$_POST["type"]);
    }
    if (isset($_POST["menu"])) {
    	$menu = mysqli_real_escape_string($connection,$_POST["menu"]);
    }
    if (isset($_POST["rent"])) {
    	$rent = mysqli_real_escape_string($connection,$_POST["rent"]);
    }

    if (isset($_POST["other"])) {
    	$shop_other = mysqli_real_escape_string($connection,$_POST["other"]);
    }
    
    $target_dir = "photos/";
    $target_file = $target_dir.basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    if ($uploadOk) {
      if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["photoUpload"]["name"]). " has been uploaded.";

       } else ;
        //echo "Sorry, there was an error uploading your file.";
    }

       if($uploadOk){
          $photo = "photos/".$_FILES["photo"]["name"];
          if ($category =="shop") {
          	$query = "insert into detail_shop(address,type,phone,other) values ('{$shop_address}','{$shop_type}','{$shop_phone}','{$shop_other}')";
          	$query2 = "select detail_id from detail_shop where address='{$shop_address}'and type='{$shop_type}' and phone='{$shop_phone}'";
          	$result = mysqli_query($connection,$query);
           $result2 = mysqli_query($connection,$query2);
           $user_result2 = mysqli_fetch_assoc($result2);
           $detail_id .= $user_result2["detail_id"];
           $query3 = "insert into shop(pincode,name,photo,detail_id) values ('{$shop_pincode}','{$shop_name}','{$photo}',{$detail_id})";
           $result3 = mysqli_query($connection,$query3);
          	
          }else if ($category=="hotel") {
          	$query = "insert into detail_Hotels(address,menu,phone,other) values ('{$shop_address}','{$menu}','{$shop_phone}','{$shop_other}')";
          	$query2 = "select detail_id from detail_Hotels where address='{$shop_address}'and menu='{$menu}' and phone='{$shop_phone}'";
          	$result = mysqli_query($connection,$query);
           $result2 = mysqli_query($connection,$query2);
           $user_result2 = mysqli_fetch_assoc($result2);
           $detail_id .= $user_result2["detail_id"];
          	$query3 = "insert into Hotels(pincode,name,photo,detail_id) values ('{$shop_pincode}','{$shop_name}','{$photo}',{$detail_id})";
          	$result3 = mysqli_query($connection,$query3);
          }else if ($category=="house") {
          	$query = "insert into detail_Housing(address,type,phone,rent) values ('{$shop_address}','{$shop_type}','{$shop_phone}','{$rent}')";
          	$query2 = "select detail_id from detail_Housing where address='{$shop_address}'";
          	$result = mysqli_query($connection,$query);
           $result2 = mysqli_query($connection,$query2);
           $user_result2 = mysqli_fetch_assoc($result2);
           $detail_id .= $user_result2["detail_id"];
          	$query3 = "insert into Housing(pincode,house_no,photo,detail_id) values ('{$shop_pincode}','{$shop_name}','{$photo}',{$detail_id})";
          	$result3 = mysqli_query($connection,$query3);
          }else if ($category=="medics") {
          	$query = "insert into detail_Medics(address,type,phone,other) values ('{$shop_address}','{$shop_type}','{$shop_phone}','{$shop_other}')";
          	$query2 = "select detail_id from detail_Medics where address='{$shop_address}'and type='{$shop_type}' and phone='{$shop_phone}'";
          	$result = mysqli_query($connection,$query);
           $result2 = mysqli_query($connection,$query2);
           $user_result2 = mysqli_fetch_assoc($result2);
           $detail_id .= $user_result2["detail_id"];
          	$query3 = "insert into Medics(pincode,name,photo,detail_id) values ('{$shop_pincode}','{$shop_name}','{$photo}',{$detail_id})";
          	$result3 = mysqli_query($connection,$query3);
          }else if ($category=="cloth") {
          	$query = "insert into detail_Clothing(address,phone,other) values ('{$shop_address}','{$shop_phone}','{$shop_other}')";
          	$query2 = "select detail_id from detail_Clothing where address='{$shop_address}' and phone='{$shop_phone}'";
          	$result = mysqli_query($connection,$query);
           $result2 = mysqli_query($connection,$query2);
           $user_result2 = mysqli_fetch_assoc($result2);
           $detail_id .= $user_result2["detail_id"];
          	$query3 = "insert into Clothing(pincode,name,photo,detail_id) values ('{$shop_pincode}','{$shop_name}','{$photo}',{$detail_id})";
          	$result3 = mysqli_query($connection,$query3);
          }
           if ($result3) {
           	  echo "<script>alert(\"Success..\");</script>";
           	  header("location: update_details2.php");
           }
       }

   }

 ?>