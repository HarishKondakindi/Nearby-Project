<?php session_start();
     if (!isset($_SESSION["user"])) {
       echo "You are not authorized to view this page..<br><br>";
       echo "<a href=\"index.php\">Click here to login</a>";
   }else{
    
 ?>

<head>
<link rel="stylesheet" type="text/css" href="page.css">
</head>

<?php
DEFINE("DB_SERVER","localhost");
 DEFINE("DB_NAME","id154334_nearby");
 DEFINE("DB_USER","id154334_nearby");
 DEFINE("DB_PASS","nearby");
  $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

  if(mysqli_connect_errno()){
  	die("Connection failed..".mysqli_connect_error());
  }
 
  if (isset($_GET["search"]) && !empty($_GET["pincode"])) {
  	 $pincode = $_GET["pincode"];
  	 $category = $_GET["options"];
  	 if ($category == "shop") {
  	 	      $query = "select * from {$category} where pincode = '{$pincode}'";
  	        $result = mysqli_query($connection,$query);
  	        $numrows = mysqli_num_rows($result);
            $count =1; ?>
            <table class = "table1" style="width:30%">
               <tr>
               <th>S.No</th>
               <th>Name</th> 
               </tr>
               <tr style="height:50%"> <?php
  	            while($item = mysqli_fetch_assoc($result)) {
  	   	        ?> 
                  <tr>
                  <td><?php echo $count; $count++;?> </td>
                  <td><a href = "shopdetail.php?category=<?php echo $category ?>&shop=<?php echo $item["name"] ?>&photo=<?php echo $item["photo"] ?>&rating=<?php echo $item["rating"] ?>"><?php echo $item["name"] ?></a></td> 
               </tr>
                <?php
  	            }
  	           ?>
  	        </table>
  	 	<?php
  	 }else if($category == "Hotels"){
        $query = "select * from {$category} where pincode = '{$pincode}'";
            $result = mysqli_query($connection,$query);
            $numrows = mysqli_num_rows($result);
            $count =1; ?>
            <table class = "table1" style="width:30%">
               <tr>
               <th>S.No</th>
               <th>Name</th> 
               </tr>
               <tr style="height:50%"> <?php
                while($item = mysqli_fetch_assoc($result)) {
                ?> 
                  <tr>
                  <td><?php echo $count; $count++;?> </td>
                  <td><a href = "shopdetail.php?category=<?php echo $category ?>&hotel=<?php echo $item["name"] ?>&photo=<?php echo $item["photo"] ?>&rating=<?php echo $item["rating"] ?>"><?php echo $item["name"] ?></a></td> 
               </tr>
                <?php
                }
               ?>
            </table>
      <?php
     }else if ($category=="Housing") {
       $query = "select * from {$category} where pincode = '{$pincode}'";
            $result = mysqli_query($connection,$query);
            $numrows = mysqli_num_rows($result);
            $count =1; ?>
            <table class = "table1" style="width:30%">
               <tr>
               <th>S.No</th>
               <th>Name</th> 
               </tr>
               <tr style="height:50%"> <?php
                while($item = mysqli_fetch_assoc($result)) {
                ?> 
                  <tr>
                  <td><?php echo $count; $count++;?> </td>
                  <td><a href = "shopdetail.php?category=<?php echo $category ?>&house=<?php echo $item["house_no"] ?>&photo=<?php echo $item["photo"] ?>&rating=<?php echo $item["rating"] ?>"><?php echo $item["house_no"] ?></a></td> 
               </tr>
                <?php
                }
               ?>
            </table>
      <?php
     }else if ($category=="Medics") {
       $query = "select * from {$category} where pincode = '{$pincode}'";
            $result = mysqli_query($connection,$query);
            $numrows = mysqli_num_rows($result);
            $count =1; ?>
            <table class = "table1" style="width:30%">
               <tr>
               <th>S.No</th>
               <th>Name</th> 
               </tr>
               <tr style="height:50%"> <?php
                while($item = mysqli_fetch_assoc($result)) {
                ?> 
                  <tr>
                  <td><?php echo $count; $count++;?> </td>
                  <td><a href = "shopdetail.php?category=<?php echo $category ?>&hospital=<?php echo $item["name"] ?>&photo=<?php echo $item["photo"] ?>"><?php echo $item["name"] ?></a></td> 
               </tr>
                <?php
                }
               ?>
            </table>
      <?php
     }else if ($category=="Clothing") {
       $query = "select * from {$category} where pincode = '{$pincode}'";
            $result = mysqli_query($connection,$query);
            $numrows = mysqli_num_rows($result);
            $count =1; ?>
            <table class = "table1" style="width:30%">
               <tr>
               <th>S.No</th>
               <th>Name</th> 
               </tr>
               <tr style="height:50%"> <?php
                while($item = mysqli_fetch_assoc($result)) {
                ?> 
                  <tr>
                  <td><?php echo $count; $count++;?> </td>
                  <td><a href = "shopdetail.php?category=<?php echo $category ?>&clothshop=<?php echo $item["name"] ?>&photo=<?php echo $item["photo"] ?>&rating=<?php echo $item["rating"] ?>"><?php echo $item["name"] ?></a></td> 
               </tr>
                <?php
                }
               ?>
            </table>
      <?php
     }
  	  
  }
?>

<?php
}
?>