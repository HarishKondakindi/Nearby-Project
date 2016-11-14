<?php session_start();
if (!isset($_SESSION["user"])) {
       echo "You must login to continue<br><br>";
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

if($_GET["category"]=="shop"){
  $shop_name = $_GET["shop"];
  $query = "select * from detail_shop where detail_id = (select detail_id from shop where name = '{$shop_name}')";
  $result = mysqli_query($connection,$query);
  $row = mysqli_fetch_assoc($result);
  $pic = $_GET["photo"];
  $rating = $_GET["rating"];

  $out= "<div id=\"shop\">";
  $out .=	 "<p>";
  $out .=	 	"<h3 style=\"color: red\">".$shop_name."</h3>";
  $out .= 	 	"<img src=\"". $pic."\">";
  $out .= 	 "</p>";
  $out .= 	 "<p id=\"p3\">";
  $out .= 	   "<h3 id=\"heading3\">Address :</h3>";
  $out .=	   $row["address"];
  $out .=	 "</p>";
  $out .=	"<p id=\"p3\">";
  $out .=	 	"<h3 id=\"heading3\">Type :</h3>";
  $out .=	 	$row["type"];
  $out .=	 "</p>";
  $out .=	 "<p id=\"p3\">";
  $out .=	 	"<h3 id=\"heading3\">Contact number :</h3>";
  $out .=	        $row["phone"];
  $out .=	 "</p>";
  $out .=  "<p id=\"p3\">";
  $out .=	 	"<h3 id=\"heading3\">Reviews :</h3>";
  $out .=	 	$rating;
  $out .=	 "</p>";
  $out .= "</div>";
 echo $out;

} else if ($category=="Hotels") {
  $hotel_name = $_GET["hotel"];
  $query = "select * from detail_Hotels where detail_id = (select detail_id from Hotels where name = '{$hotel_name}')";
  $result = mysqli_query($connection,$query);
  $row = mysqli_fetch_assoc($result);
  $pic = $_GET["photo"];
  $rating = $_GET["rating"];

$out =  "<div id=\"shop\">";
$out .=     "<p>";
$out .=       "<h3 style=\"color: red\">".$hotel_name."</h3>";
$out .=       "<img src=\"". $pic."\">";
$out .=       "</p>";
 $out .=      "<p id=\"p3\">";
 $out .=       "<h3 id=\"heading3\">Address:</h3>";
 $out .=        $row["address"];
$out .=       "</p>";
 $out .=      "<p id=\"p3\">";
 $out .=      "<h3 id=\"heading3\">Menu:</h3>";
 $out .=        $row["menu"];
 $out .=     "</p>";
  $out .=     "<p id=\"p3\">";
 $out .=      "<h3 id=\"heading3\">Contact number :</h3>";
$out .=          $row["phone"];
$out .=      "</p>";
$out .=      "<p id=\"p3\">";
$out .=       "<h3 id=\"heading3\">Reviews :</h3>";
 $out .=           $rating;
 $out .=      "</p>";

 $out .= "</div>";
 echo $out;

}else if ($category=="Housing") {
  $house_no = $_GET["house"];
  $query = "select * from detail_shop where detail_id = (select detail_id from shop where name = '{$house_no}')";
  $result = mysqli_query($connection,$query);
  $row = mysqli_fetch_assoc($result);
  $pic = $_GET["photo"];
  $rating = $_GET["rating"];

 $out = "<div id=\"shop\">";
 $out .=    "<p>";
 $out .=       "<h3 style=\"color: red\">".$house_no."</h3>";
 $out .=       "<img src=\"". $pic."\">";
 $out .=    "</p>";
 $out .=     "<p id=\"p3\">";
 $out .=        "<h3 id=\"heading3\">Address:</h3>";
 $out .=        $row["address"];
 $out .=    "</p>";
 $out .=     "<p id=\"p3\">";
 $out .=       "<h3 id=\"heading3\">Type:</h3>";
 $out .=       $row["type"];
 $out .=     "</p>";
 $out .=     "<p id=\"p3\">";
 $out .=       "<h3 id=\"heading3\">Contact number :</h3>";
 $out .=       $row["phone"];
 $out .=    "</p>";
 $out .=    "<p id=\"p3\">";
 $out .=        "<h3 id=\"heading3\">Rent:</h3>";
 $out .=       $row["rent"];
 $out .=     "</p>";
 $out .=    "<p id=\"p3\">";
 $out .=       "<h3 id=\"heading3\">Reviews:</h3>";
 $out .=      $rating;
 $out .=     "</p>";

 $out .=  "</div>";
echo $out;
  
}else if ($category=="Medics") {
  $hospital_name = $_GET["hospital"];
  $query = "select * from detail_Medics where detail_id = (select detail_id from Medics where name = '{$hospital_name}')";
  $result = mysqli_query($connection,$query);
  $row = mysqli_fetch_assoc($result);
  $pic = $_GET["photo"];

$out =  "<div id=\"shop\">";
$out .=     "<p>";
$out .=       "<h3 style=\"color: red\">".$hospital_name."</h3>";
$out .=       "<img src=\"". $pic."\">";
$out .=      "</p>";
$out .=      "<p id=\"p3\">";
$out .=        "<h3 id=\"heading3\">Address:</h3>";
$out .=         $row["address"];
$out .=     "</p>";
$out .=      "<p id=\"p3\">";
$out .=       "<h3 id=\"heading3\">Type:</h3>";
$out .=        $row["type"];
$out .=     "</p>";
$out .=      "<p id=\"p3\">";
$out .=       "<h3 id=\"heading3\">Contact number:</h3>";
$out .=        $row["phone"];
$out .=      "</p>";
$out .=      "<p id=\"p3\">";
$out .=       "<h3 id=\"heading3\">Other:</h3>";
$out .=       $row["other"];
$out .=     "</p>";
$out .=   "</div>";
echo $out; 

}else if ($category=="Clothing") {
  $clothshop_name = $_GET["clothshop"];
  $query = "select * from detail_Clothing where detail_id = (select detail_id from Clothing where name = '{$clothshop_name}')";
  $result = mysqli_query($connection,$query);
  $row = mysqli_fetch_assoc($result);
  $pic = $_GET["photo"];
  $rating = $_GET["rating"];?>

$out =  "<div id=\"shop\">";
$out .=     "<p>";
$out .=       "<h3 style=\"color: red\">".$clothshop_name."</h3>";
$out .=       "<img src=\"". $pic."\">";
$out .=     "</p>";
$out .=      "<p id=\"p3\">";
$out .=         "<h3 id=\"heading3\">Address:</h3>";
$out .=        $row["address"];
$out .=      "</p>";
$out .=     "<p id=\"p3\">";
$out .=        "<h3 id=\"heading3\">Contact number:</h3>";
$out .=       $row["phone"];
$out .=     "</p>";
$out .=    "<p id=\"p3\">";
$out .=        "<h3 id=\"heading3\">Reviews:</h3>";
$out .=       $rating;
$out .=      "</p>";
$out .=   "</div>";
echo $out;

}
}
?>