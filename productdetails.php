<?php
session_start();

$server = "localhost:3306";
$username ="root";
$password ="";
$database="auction";

$connect = mysqli_connect($server, $username, $password, $database);

if(!$connect){
    die("Error : " .mysqli_connect_error());
}


if ( !empty( $_GET['prod_name'] ) ) {
	 $productname = $_GET['prod_name'];
}

$query="SELECT productname,startingprice,quantity,details,warrantyperiod,image,productid FROM product_insert where productname='".$productname."'";
$result = $connect->query($query);

if ($result = mysqli_query($connect, $query)) {
    while($row = $result->fetch_assoc()) {
      $productname =  $row["productname"];
      $startingprice =  $row["startingprice"];
      $quantity =  $row["quantity"];
      $details =  $row["details"];
      $warrantyperiod =  $row["warrantyperiod"];
      $image =  $row["image"];
      $productid =  $row["productid"];

      // session_unset();
      //
      // session_destroy();


?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">


      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <style>

      .productmargin{
        margin:100px 0px 0px 150px;
      }
      #quantitybox{
        width: 50px;
        text-align: center;
      }
      #prodetail{
        margin:100px 0px 0px 50px;
      }
      .lipadding{
        float:left;
        padding:10px;
      }
      @media screen and (max-width: 600px) {

        .productmargin{
          margin:100px 0px 0px 40px;
        }
      }


      /* -------------------------------HEADERR-------------------- */
      .searchinput{
        width: 300px;
        margin-left: 250px;

      }
      .navcolour2{
        background-color: #11B683;
      }
      #dropmenu1{
        margin-left: 87%;
      }
      #img1{
          width:350px;
           height:450px;

      }

      @media screen and (max-width: 600px) {

        .searchinput{
          width: 300px;
          margin-left: 0px;

        }
        #img1{
          padding-left: 100px;
        }
      }

      </style>
</head>

<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
</script>
<script>
$(function(){
  // $("#header").load("header.php");
  $("#footer").load("footer.html");
});
</script>
    <body>


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


      <div class="row">
        <div id="divimage" >
          <a ><img id="img1" class="productmargin" src="./images/<?php echo $row["image"]; ?>" alt=""></a>
        </div>
        <div id="prodetail">
          <h3 id="product_name"><?php echo $row["productname"]; ?></h3>
          <br>
          <h4>Price: <span id="product_price"><?php echo $row["startingprice"]; ?></span></h4>
          <br>
          <label>Qty:</label>
          <input type="number" id="quantitybox" value="<?php echo $row["quantity"]; ?>">
          <br>
          <br>
          <button id="addtocart" class="btn btn-lg btn-success" type="submit">Add to Cart</button>
          <br>
          <br>
          <button id="buybutton" class="btn btn-lg btn-success" type="submit">Buy</button>
          <br>
          <br>
          <div>Your order will be delivered within 2days</div>

        </div>
      </div>

      <div class="productmargin">
        <b><div>DETAILS</div></b>
        <br>

            <div>
              <?php echo $row["details"]; ?>
            </div>

            <br>

            <b><div>Warranty</div></b>
            <br>

                <div>
                  <?php echo $row["warrantyperiod"]; ?> year
                </div>


          </div>

<?php

}
}

 ?>

<div id="footer"></div>
<script>


document.getElementById('addtocart').onclick=function(){
  var productname1=document.getElementById('product_name').innerHTML;
  window.location = "addtocart.php?prod_name=" + productname1;
}

document.getElementById('buybutton').onclick=function(){
  var productname1=document.getElementById('product_name').innerHTML;
  var productprice1=document.getElementById('product_price').innerHTML;
  window.location = "checkout1.php?prod_name="+ productname1+"&prod_price="+productprice1;
}

</script>


    </body>
</html>
