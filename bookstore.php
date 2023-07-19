<?php
session_start();
error_reporting(0);

if(isset($_POST['searchbooks']))
{
	header("Location: http://localhost/Library/searchbook.php");
}	    //redirect to main page - welcome page
	elseif(isset($_POST['deletebook'])){
		header("Location: http://localhost/Library/deletebook.php");
	}
	elseif(isset($_POST['addbook'])){
		header("Location: http://localhost/Library/addbook.php");
	}
	elseif(isset($_POST['updatebook'])){
		header("Location: http://localhost/Library/updatebook.php");
	}
  elseif(isset($_POST['review'])){
		header("Location: https://docs.google.com/forms/d/e/1FAIpQLSdi8hcAN7xnHwa84Hfe0E3QJ0cK1jVubBkNDQu34vwjz3xFjg/viewform?usp=pp_urlp");
	}
else
  {
    if(isset($_POST['logout'])){
      header("Location: http://localhost/Library/index.php");
    }
    //incorrect username or password msg
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
    <form role="form" method="post">
<div>
<button type="submit" name="logout" class="btn btn-info">LOGOUT</button>
</form>
</div>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">BOOKS INFORMATION</h4>
</div>
</div>
  
<div class="row">
<form role="form" method="post">
<button type="submit" name="review" class="btn btn-info">REVIEW</button>
</div>
</form>

<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 BOOKS INFO
</div>
<div class="panel-body">
<form role="form" method="post">
<div>
<button type="submit" name="searchbooks" class="btn btn-info">SEARCH BOOKS </button>
<button type="submit" name="addbook" class="btn btn-info">ADD BOOK </button>
<button type="submit" name="updatebook" class="btn btn-info">UPDATE BOOK</button>
<button type="submit" name="deletebook" class="btn btn-info">DELETE BOOK</button>

</form>
</div>  

<!---LOGIN PABNEL END-->            
 

    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>


</body>

</html>
