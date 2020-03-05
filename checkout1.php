<?php
  session_start();
$server = "localhost:3306";
$username ="root";
$password ="";
$database="auction";

$connect = mysqli_connect($server,$username,$password,$database);
if(!$connect){
    die("Error : " . $con->connect_error);
}

if ( !empty( $_GET['prod_name'] ) ) {
	 $productname = $_GET['prod_name'];
}
if ( !empty( $_GET['prod_price'] ) ) {
	 $productprice = $_GET['prod_price'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style>

      #pos{
          margin-left: 30%;
      }
      table, th, td {
          border: 1px solid rgba(0, 0, 0, .5);
          padding: 10px 10px 10px 10px;

        }

      @media screen and (max-width: 600px) {

      #pos
      {
          margin-left: 0%;
      }

      .regpos
      {
             width:70%;
      }
      }
  </style>

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
</head>
<body >


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



  <div class="container">
          <div class="row">
              <div class="col-md-4 col-md-offset-4" id="pos">

                  <div class="row">
                      <div class="box-bg-white col-md-12 col-xs-12 ">
                          <h3 class="text-center">Enter your Details</h3>

          <form name="Regform" method="POST" action="./addaddress.php" onsubmit="return validation()">

        <div class="form-group">
            <input type="text" class="form-control regpos" id="firstname" required name="fname" placeholder="First Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control regpos" id="lastname" name="lname" placeholder="Last Name">
        </div>


        <div class="form-group">
            <input type="textarea" class="form-control regpos" id="address" name="address" placeholder="Address">
        </div>

        <div class="form-group">
            <input type="text" class="form-control regpos" id="city" name="city" placeholder="City">
        </div>

        <div class="form-group">
            <input type="text" class="form-control regpos" id="country" name="country" placeholder="Country">
        </div>

        <div class="form-group">
            <input type="text" class="form-control regpos" id="zipcode" name="zipcode" placeholder="Zipcode">
        </div>
        <div class="form-group">
            <input type="email" class="form-control regpos" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control regpos" id="mobile" name="mobile" placeholder="Mobile Number">
        </div>
        <br>
        <!-- <input id="register" type="submit" value="Insert your Details"class="btn btn-success"></input> -->
  </form>
</div>
</div>
</div>
</div>
</div>
<table>

    <th>Product</th>
    <th>Total</th>

    <tr>
        <td id="product_name"><?php echo $productname;?></td>
        <td><?php echo $productprice;?></td>
    <tr>

      <tr>
          <td>Order Total</td>
          <td>Order price</td>
      <tr>


</table>
<br>

  <button  type="button" id="placeorder" class="btn btn-success">Place Order</button>

  </center>

  <div id="footer"></div>


<script>
function validation(){
  var flag = true;

  var fname = document.RegForm.fname.value;
  var lname = document.RegForm.lname.value;
  var username=document.RegForm.zipcode.value;
  var mobile=document.RegForm.mobile.value;
  var email=document.RegForm.email.value;


  var usercheck=/^[a-zA-Z\-]+$/;
  var passcheck=/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
  var mobcheck=/^\d{10}$/;
  var emailcheck=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if(fname == null){
  alert('First name cannot be empty');
  flag = false;
  }
  if(lname == null){
  alert('First name cannot be empty');
  flag = false;
  }

  if(emailcheck.test(email))
  {
    flag= true;
  }
  else {
    alert("EmailId is Invalid");
    return false;
  }

  if(mobcheck.test(mobile))
  {
    flag= true;
  }
  else {
    alert("Mobile Number is Invalid");
    return false;
  }
  return flag;
}
    document.getElementById('placeorder').onclick=function(){
      var productname1=document.getElementById('product_name').innerHTML;
      window.location = "addtoorder.php?prod_name=" + productname1;
    }

</script>

</body>
</html>
