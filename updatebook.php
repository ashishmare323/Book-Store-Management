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
<h4 class="header-line">UPDATE BOOK </h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 <b>UPDATE BOOK</b>
 
</div>
<form role="form" method="post"> 
<div class="panel-body">
<?php
foreach($bookname as &$booknm)
 {
    $booknm = str_replace("_"," ",$booknm);
    $booknm = ucwords($booknm);
 }
?>
<div class="form-group">
<label>GET BOOK BY NAME</label>
<input class="form-control" type="text" name="bookbyname" required autocomplete="off" />
</div>
<button type="submit" name="search" class="btn btn-info">SEARCH </button>


 </div>
</form>
</div>
</div>
</div>

<?php

if(isset($_POST['search']))
{
    $bookname = $_POST['bookbyname'];
    $url = "http://localhost:8080/api/books/".$bookname;
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($curl);
    curl_close($curl);
        //var_dump($resp);
    $response = json_decode($resp, true);
  //echo "size = " . sizeof($response) ;
   //var_dump($response);
   $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  //$response = json_decode($resp, true);
  //echo "<div><h2>".$httpCode."</h2></div>";

  if($httpCode >= 200 && $httpCode <= 299)
  {   
    header("Location: http://localhost/Library/updatebook1.php?id=".$response["id"]."&booksName=".$response["booksName"]."&booksCategory=".$response["booksCategory"]."&booksPrice=".$response["booksPrice"].
            "&booksAuthor=".$response["booksAuthor"]."&booksCount=".$response["booksCount"]."&booksIsbn=".$response["booksIsbn"]);	  

  }
  else
  {
      //failed msg
  }
}
 
?>  
<?php
if(file_exists('books.json'))
{
	$filename = 'books.json';
	$data = file_get_contents($filename); //data read from json file
	echo($data);
	$users = json_decode($data);  //decode a data

	($users); //array format data printing
	$message = "<h3 class='text-success'>JSON file data</h3>";
}else{
	$message = "<h3 class='text-danger'>JSON file Not found</h3>";
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
