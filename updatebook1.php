<?php
session_start();
error_reporting(0);
$_SESSION["id"] = $_GET["id"];
$_SESSION["booksName"] = $_GET["booksName"];
$_SESSION["booksCategory"] = $_GET["booksCategory"];
$_SESSION["booksPrice"] = $_GET["booksPrice"];
$_SESSION["booksAuthor"] = $_GET["booksAuthor"];
$_SESSION["booksCount"] = $_GET["booksCount"];
$_SESSION["booksIsbn"] = $_GET["booksIsbn"];
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
<h4 class="header-line">UPDATE BOOK INFORMATION FORM</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 <b>FILL DETAILS</b>
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
        <label>Name</label>
        <input class="form-control" type="text" name="name" value="<?php  echo $_SESSION["booksName"]  ?>"required autocomplete="off" readonly/>
        </div>
        <div class="form-group">
        <label>Category</label>
        <input class="form-control" type="text" name="category" value="<?php  echo $_SESSION["booksCategory"]  ?>"required autocomplete="off"  />
        </div>
        <div class="form-group">
        <label>Price</label>
        <input class="form-control" type="text" name="price" value="<?php  echo $_SESSION["booksPrice"]  ?>" required autocomplete="off" />
        </div>
        <div class="form-group">
        <label>Author</label>
        <input class="form-control" type="text" name="author" value="<?php  echo $_SESSION["booksAuthor"]  ?>" required autocomplete="off"  />
        </div>
        <div class="form-group">
        <label>Count</label>
        <input class="form-control" type="text" name="count"value="<?php  echo $_SESSION["booksCount"]  ?>" required autocomplete="off" />
        </div>
        <div class="form-group">
        <label>Isbn</label>
        <input class="form-control" type="text" name="isbn"value="<?php  echo $_SESSION["booksIsbn"]  ?>" required autocomplete="off"  />
        </div>


 <button type="submit" name="submit" class="btn btn-info">SUBMIT </button>
</form>
 </div>
</div>
</div>
</div>  
<?php
if(isset($_POST['submit']))
{
    $bookname = $_POST['name'];
    $bookcategory = $_POST['category'];
    $bookprice = $_POST['price'];
    $bookauthor = $_POST['author'];
    $bookcount = $_POST['count'];
    $bookisbn = $_POST['isbn'];
    
    $data = array();
    $data["id"] = $_SESSION["id"];
    $data["booksName"] = $bookname;
    $data["booksAuthor"] = $bookauthor;
    $data["booksCategory"] = $bookcategory;
    $data["booksPrice"] = $bookprice;
    $data["booksCount"] = $bookcount;
    $data["booksIsbn"] = $bookisbn;

    $url = "http://localhost:8080/api/books/";
    $options = array(
            'http' => array(
                'method' => 'PUT',
                'content' => json_encode($data),
                'header' => "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n"
            )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url,false, $context);
    $response = json_decode($result);
    var_dump($response);

    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  //$response = json_decode($resp, true);
  //echo "<div><h2>".$httpCode."</h2></div>";

    if($httpCode >= 200 && $httpCode <= 299)
    {
        
        echo "<p> <font color= red><h3>Record Updated Successfully !</h3></font></p>";
    }
    else
    {
        echo  "<p> <font color= red><h3>Something is Wrong !</h3></font></p>";
    }
 }
?>  
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
<?php include('includes/footer.php');?>
</body>
</html>
