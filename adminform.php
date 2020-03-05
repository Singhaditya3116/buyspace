<?php
  session_start();
$server = "localhost:3306";
$username ="root";
$password ="";
$database="auction";
  $connect = mysqli_connect($server, $username, $password, $database);
  if(!$connect){
      die("Error : " . $con->connect_error);
  }

  if(isset($_POST['upload']))
  {
    $productname = $_POST["productname"];
    $startingprice = $_POST["startingprice"];
    $quantity=$_POST["quantity"];
    $details=$_POST["details"];
    $warrantyperiod=$_POST["warrantyperiod"];
    $productid=$_POST["productid"];
    $image =$_FILES['image']['name'];


    $target = "images/".basename($image);

  	$sql = "INSERT INTO product_insert (productname,startingprice,quantity,details,warrantyperiod,productid,image) VALUES ('$productname','$startingprice','$quantity','$details','$warrantyperiod','$productid','$image')";
  	// execute query
  	mysqli_query($connect, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

  }



?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title></title>
  </head>

  <style>


  td {
  padding: 15px;
    }

  input{
    border: 1px solid black;
    border-radius: 8px;
  }
  textarea{
    border: 1px solid black;
    border-radius: 8px;
    width: 210px;

  }


  </style>

  <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous">
  </script>
  <script>
  $(function(){
    $("#header").load("header.html");
    $("#footer").load("footer.html");
  });
  </script>
<body>
<!-- <div id="header"></div> -->
<?php
if(!isset($_SESSION))
{
session_start();
}
if (isset($_SESSION['username'])) {
    $name_of_user= $_SESSION['username'];
}
else {
  $name_of_user= "Login";
}

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
<img src="reglogo.png" alt="Logo" style="width:40px;">
<span class="navbar-text">Buyspace</span>
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./adminform.php">Admin Login</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          MyAccount
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="./cart.php">My Cart</a>
          <a class="dropdown-item" href="./order.php">My Orders</a>
          <a class="dropdown-item" href="./logout.php">Logout</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " id="login" href="login.html"><?php echo $name_of_user; ?></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  <center>
    <h1>Insert product Details</h1>
    <form method="post" action="adminform.php" enctype="multipart/form-data">
      <table>
        <tr>
          <td>Product Id:</td>
          <td><input type="text" name="productid" id="productid" maxlength="10" size="25"></td>
        </tr>

        <tr>
          <td>Product Name:</td>
          <td><input type="text" name="productname" id="productname" maxlength="20" size="25"></td>
        </tr>

        <tr>
          <td>Starting Price:</td>
          <td><input type="text" name="startingprice" id="startingprice" size="25"></td>
        </tr>

        <tr>
          <td>Quantity:</td>
          <td><input type="text" name="quantity" id="quantity" size="25"></td>
        </tr>

        <tr>
          <td>Details:</td>
          <td><textarea name="details" id="details" ></textarea></td>
        </tr>



        <tr>
          <td>Warranty Period:</td>
          <td><input type="text" name="warrantyperiod" id="warrantyperiod" size="25"></td>
        </tr>

        <tr>
          <td>Choose image:</td>
          <td><input  style="border:none;"type="file" name="image" id="image"></td>
        </tr>

      </table>

      <input type="submit" name="upload" value="Upload"></input>
    </form>
  </center>

  <div id="footer"></div>
</body>
</html>
