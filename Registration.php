<?php

$server = "localhost:3306";
$username ="root";
$password ="";
$database="auction";

$connect=mysqli_connect($server,$username,$password,$database);
if(!$connect){
    die("Error : " .mysqli_connect_error());
}

if(isset($_POST['username']))
{

      $username=$_POST["username"];
      $email=$_POST["email"];
      $password=$_POST["password"];
      $mobilenumber=$_POST["mobilenumber"];

      $query = "INSERT into registration(username,email,password,mobno)values('$username','$email','$password','$mobilenumber')";
      if(mysqli_query($connect, $query))
      {
        // echo "Inserted successfully";
      }
      else {
        echo "ERROR: Could not able to execute $query. " . mysqli_error($connect);
      }

      $basetablename="cart";
      $tablename=$username.$basetablename;

      $cart="CREATE TABLE`".$tablename."`(productname varchar(20),image varchar(200),price int,quantity int)";
      if(mysqli_query($connect, $cart))
      {
        // echo "Table created successfully";
      }
      else {
        echo "ERROR: Could not able to execute $query. " . mysqli_error($connect);
      }

      $basetablename1="order";
      $tablename1=$username.$basetablename1;

      $order="CREATE TABLE`".$tablename1."`(productname varchar(20),image varchar(200),price int,quantity int)";
      if(mysqli_query($connect, $order))
      {
        // echo "Table created successfully";

      }
      else {
        echo "ERROR: Could not able to execute $query. " . mysqli_error($connect);
      }


      $basetablename2="address";
      $tablename2=$username.$basetablename2;

      $address="CREATE TABLE`".$tablename2."`(fname varchar(10),lname varchar(10),address varchar(20),city varchar(15),country varchar(15),zip int,mobile int,email varchar(15))";
      if(mysqli_query($connect, $address))
      {
        // echo "Table created successfully";


        echo "<script type='text/javascript'>
              alert('Registered Successfully');
            </script>";

      }
      else {
        echo "ERROR: Could not able to execute $query. " . mysqli_error($connect);
      }
      unset($_POST['username']);
}

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <style>

        #pos{
            margin-left: 30%;
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
      $("#header").load("header.html");
      $("#footer").load("footer.html");
    });
    </script>
</head>

<body>


  <!-- <div id="header"></div> -->
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
            <a class="dropdown-item" href="#">My Profile</a>
            <a class="dropdown-item" href="./cart.php">My Cart</a>
            <a class="dropdown-item" href="./logout.php">Logout</a>
          </div>
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

    <div >

        <div class="row">
            <div class="col-md-4 col-md-offset-4" id="pos">
                <p ><img src="reglogo.png" width="120" /></p>

                <div class="row">
                    <div class="box-bg-white col-md-12 col-xs-12 ">
                        <h3 class="text-center">Create Bidspace Account</h3>
                        <div class="clearfix maya-tiny-padding"></div>


                        <form name="registerform" method="POST" action="" onsubmit="return validation()">
                            <div class="form-group">
                                <input type="text" class="form-control regpos" id="username" name="username" placeholder="Username">

                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control regpos" id="email" name="email" placeholder="Email">

                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control regpos" id="password" name="password"placeholder="Password">

                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control regpos" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number">

                            </div>

                            <input id="register" type="submit" value="Create Account"class="btn btn-success" onclick="dial();"></input>
                        </form>
                        <p class="text-center">Already a member? <a href="login.html" class="text-secondary">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

      <script type="text/javascript">
  function validation()
  {
      var email=document.registerform.email.value;
      var username=document.registerform.username.value;
      var password=document.registerform.password.value;
      var mobilenumber=document.registerform.mobilenumber.value;


      var usercheck=/^[a-zA-Z\-]+$/;
      var passcheck=/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
      var mobcheck=/^\d{10}$/;
      var emailcheck=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

      if(usercheck.test(username))
      {
        flag= true;
      }
      else {
        alert("Username is Invalid");
        return false;
      }

      if(passcheck.test(password))
      {
        flag= true;
      }
      else {
        alert("Password is Invalid");
        return false;
      }

      if(emailcheck.test(email))
      {
        flag= true;
      }
      else {
        alert("EmailId is Invalid");
        return false;
      }

      if(mobcheck.test(mobilenumber))
      {
        flag= true;
      }
      else {
        alert("Mobile Number is Invalid");
        return false;
      }
      return flag;
  }

  </script>
</body>
</html>
