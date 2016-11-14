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

    

  if(isset($_POST["update"])){
    $nameFinal = $_SESSION["nameFinal"];
    $catgFinal = $_SESSION["category"];
    $shop_name = mysqli_real_escape_string($connection,$_POST["shopName"]);
    $shop_address = mysqli_real_escape_string($connection,$_POST["shopAddress"]);
    $shop_phone = mysqli_real_escape_string($connection,$_POST["shopPhone"]);


    $target_dir = "photos/";
    $target_file = $target_dir.basename($_FILES["photoUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   /* $file_size = $_FILES["photoUpload"]["size"];
    if ($file_size > 1048576) {
      echo "size_error";
      header("location:update_details2.php");
      exit();
    }*/
    //$check = getimagesize($_FILES["photoUpload"]["tmp_name"]);

    /*if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }*/
    if ($uploadOk) {
      if (move_uploaded_file($_FILES["photoUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["photoUpload"]["name"]). " has been uploaded.";

       } else ;
        //echo "Sorry, there was an error uploading your file.";
    }

$photo = "photos/".$_FILES["photoUpload"]["name"];
     if($catgFinal=="shop"){
      $types = $_POST["categorytype"];
      $query = "update shop set name='{$shop_name}', photo='{$photo}' where name='{$nameFinal}'";
      $query2 = "update detail_shop set address ='{$shop_address}' ,phone='{$shop_phone}',type='{$types}' where detail_id=(select detail_id from shop where name='{$nameFinal}')";
    }else if ($catgFinal=="hotel") {
      $menuhotel = $_POST["hotelMenu"];
      $query = "update Hotels set name='{$shop_name}', photo='{$photo}' where name='{$nameFinal}'";
      $query2 = "update detail_Hotels set address ='{$shop_address}' ,phone='{$shop_phone}',menu='{$menuhotel}' where detail_id=(select detail_id from Hotels where name='{$nameFinal}')";
    }else if ($catgFinal=="house") {
      $renthouse = $_POST["houseRent"];
       $types = $_POST["categorytype"];
      $query = "update Housing set house_no='{$shop_name}', photo='{$photo}' where house_no='{$nameFinal}'";
      $query2 = "update detail_Housing set address ='{$shop_address}' ,phone='{$shop_phone}',rent='{$renthouse}',type='{$types}' where detail_id=(select detail_id from Housing where name='{$nameFinal}')";
    }else if($catgFinal=="medics"){
        $types = $_POST["categorytype"];
      $query = "update Medics set name='{$shop_name}', photo='{$photo}' where name='{$nameFinal}'";
      $query2 = "update detail_Medics set address ='{$shop_address}' ,phone='{$shop_phone}',type='{$types}' where detail_id=(select detail_id from Medics where name='{$nameFinal}')";
    }else if ($catgFinal=="cloth") {
      $query = "update Clothing set name='{$shop_name}', photo='{$photo}' where house_no='{$nameFinal}'";
      $query2 = "update detail_Clothing set address ='{$shop_address}' ,phone='{$shop_phone}' where detail_id=(select detail_id from Clothing where name='{$nameFinal}')";
    }
 

    $result2 = mysqli_query($connection,$query2);
    $result = mysqli_query($connection,$query);
    if( $result and $result2 ){
       //
       //echo  "true";
      ?> <script type="text/javascript">alert("success");</script> <?php
      header("location:update_details2.php");
    }else
       echo "false";
       //header("location:update_details2.php");

  }else{

  $shop_name = $_POST["Name"];
  $Category = $_POST["Category"];
  $_SESSION["nameFinal"] = $_POST["Name"];
  $_SESSION["category"] = $_POST["Category"];

   if ($Category=="shop") {
     $Category2="shop";
     $details = "detail_shop";
   }else if ($Category=="hotel") {
     $Category2="Hotels";
     $details = "detail_Hotels";
   }else if ($Category=="house") {
     $Category2="Housing";
     $details = "detail_Housing";
   }else if ($Category=="medics") {
     $Category2="Medics";
     $details = "detail_Medics";
   }else if ($Category=="cloth") {
     $Category2="Clothing";
     $details = "detail_Clothing";
   }
   



   $query = "select * from {$Category2} where name = '{$shop_name}'";
  	 $result = mysqli_query($connection,$query);
  	 $user_result = mysqli_fetch_assoc($result);

  	$query2 = "select * from {$details} where detail_id =(select detail_id from {$Category2} where name='{$shop_name}')"; 
  	$result2 = mysqli_query($connection,$query2);
  	$user_result2 = mysqli_fetch_assoc($result2);
    htmlreturn($user_result2,$user_result,$Category);
  }

function htmlreturn($result3,$result4,$Category){
   $output="";
  	if($result3){		
  		$output .= "<form action=\"loaddata.php\" method = \"POST\"  enctype=\"multipart/form-data\" onsubmit=\"return validateUpdate()\" id=\"updateForm\">";
 	     $output .= "<p>Name:";
        $output .=      "<input type=\"text\" name=\"shopName\" id=\"shopName\" placeholder=\"".$result4["name"]."\""."><br>";
        $output .=  "Address:";
         $output .=      "<input type=\"text\" name=\"shopAddress\" id=\"shopAddress\" placeholder=\"".$result3["address"]."\""."><br>";
         $output .= "Phone:";
         $output .=      "<input type=\"text\" name=\"shopPhone\" id=\"shopPhone\" placeholder=\"".$result3["phone"]."\"" ."> <span id=\"shopPhoneError\" style=\"font-size: 10px ;color:red\"></span><br>";
         if ($Category=="hotel") {
           $output .= "Menu:";
           $output .= "<input type=\"text\" name=\"hotelMenu\" id=\"hotelMenu\" placeholder=\"".$result3["menu"]."\""."><br>";
           
         }else if ($Category=="house") {
           $output .= "Rent:";
           $output .= "<input type=\"text\" name=\"houseRent\" id=\"houseRent\" placeholder=\"".$result3["rent"]."\""."><br>";

         }else if ($Category=="shop" || $Category=="house" || $Category=="medics") {
           $output .= "Type:";
           $output .= "<input type=\"text\" name=\"categorytype\" id=\"categorytype\" placeholder=\"".$result3["type"]."\""."><br>";
         }
         $output .=  "Image:";
          $output .=     "<img src=\"".$result4["photo"]."\""."><br>";
          $output .=  "<input type=\"file\" name=\"photoUpload\" id=\"photoUpload\"><br> <span id=\"fileError\" style=\"font-size: 10px ;color:red\"></span><br>";
          $output .= "<input type=\"submit\" name = \"update\" id=\"updateButton\" value =\"Update\">";   
 	     $output .=  "</p>";
       $output .=  "</form>";  
  	}
   echo $output;
  }
 
?>