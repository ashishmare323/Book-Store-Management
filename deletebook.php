<?php
session_start();
error_reporting(0);

if(isset($_POST['login']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];

  if($password == "admin" and $username == "admin")
  {
    //redirect to main page - welcome page
  }
  else
  {
    //incorrect username or password msg
  }
}

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
<h4 class="header-line">BOOK DELETE FORM</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 DELETE BOOK
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>ENTER BOOK ID</label>
<input class="form-control" type="text" name="bookid" required autocomplete="off" />
</div>

 <button type="submit" name="delete" class="btn btn-info">DELETE </button>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->            
 <?php            
if(isset($_POST['delete']))
{
  //echo "<div><h1> getallbuttonpress</h1></div>";

  $bookid =$_POST['bookid'];

  $url = "http://localhost:8080/api/books/".$bookid;
  $curl = curl_init($url);

  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
  $resp = curl_exec($curl);
  curl_close($curl);

  $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  //$response = json_decode($resp, true);
  //echo "<div><h2>".$httpCode."</h2></div>";

  if($httpCode >= 200 && $httpCode <= 299)
  {
    
    echo "<p> <font color= red><h3>Record Deleted Successfully !</h3></font></p>";
  }
  else
  {
    echo  "<p> <font color= red><h3>Something is Wrong !</h3></font></p>";
  }
  

}
  ?>
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
