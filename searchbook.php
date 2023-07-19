<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BOOKS STORE | </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <!------MENU SECTION START-->

<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">SEARCH BOOK FORM</h4>
</div>
</div>
<li><a href="searchbookbyname.php"><b>SEARCH BY NAME</b></a></li>
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
  
 <b>SEARCH BOOK</b>
 
</div>
<form role="form" method="post"> 
<div class="panel-body">


<button type="submit" name="getallbooks" class="btn btn-info">GET ALL BOOKS </button>


 </div>
</form>
</div>
</div>
</div>
<?php
if(isset($_POST['getallbooks']))
{
  //echo "<div><h1> getallbuttonpress</h1></div>";

  $url = "http://localhost:8080/api/books";
  $curl = curl_init($url);

  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  
  $resp = curl_exec($curl);
  curl_close($curl);
  $response = json_decode($resp, true);
  //echo "size = " . sizeof($response) ;
  //var_dump($response);
  $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $response = json_decode($resp, true);
  //echo "<div><h2>".$httpCode."</h2></div>";

  if($httpCode >= 200 && $httpCode <= 299)
  {
    
    echo "<p> <font color= green><h3>Records Found !!</h3></font></p>";
  }
  else
  {
    echo  "<p> <font color= red><h3>Something is Wrong !</h3></font></p>";
  }

  $temp = "<table border = 1>";
  $temp .= "<tr><th>ID</th>";
  $temp .= "<th>Book Name</th>";
  $temp .= "<th>Category</th>";
  $temp .= "<th>Price</th>";
  $temp .= "<th>Author</th>";
  $temp .= "<th>Count</th>";
  $temp .= "<th>Isbn</th></tr>";

//Dynamically generating rows & columns
for($i = 0; $i < sizeof($response); $i++)
{
$temp .= "<tr>";
$temp .= "<td>" . $response[$i]["id"] . "</td>";
$temp .= "<td>" . $response[$i]["booksName"] . "</td>";
$temp .= "<td>" . $response[$i]["booksCategory"] . "</td>";
$temp .= "<td>" . $response[$i]["booksPrice"] . "</td>";
$temp .= "<td>" . $response[$i]["booksAuthor"] . "</td>";
$temp .= "<td>" . $response[$i]["booksCount"] . "</td>";
$temp .= "<td>" . $response[$i]["booksIsbn"] . "</td>";
$temp .= "</tr>";
}

$temp .= "</table>";

echo $temp;

}
?>

<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
     <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
