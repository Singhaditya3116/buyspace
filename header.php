<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
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

        @media screen and (max-width: 600px) {

          .searchinput{
            width: 300px;
            margin-left: 0px;

          }
        }

    </style>

</head>

<body>

    <?php
    if (isset($_SESSION['username'])) {
        $name_of_user= $_SESSION['username'];
    }
    else {
      $name_of_user= "Login";
    }

    echo $name_of_user;
     ?>
    <nav class="navbar navbar-expand-lg navcolour2">



  <div class="mx-auto order-0">
          <input type="text" class="form-control searchinput" placeholder="Search">
  </div>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <li class="nav-item">
        <a  class="nav-link" href="adminform.php">Adminlogin</a>
      </li>
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" >My Account</a>
      <div class="dropdown-menu" id="dropmenu1">
        <a class="dropdown-item" href="#">My Profile</a>
        <a class="dropdown-item" href="./cart.php">My Cart</a>
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li>
    <li class="nav-item">
      <a id="login" class="nav-link" href="login.html"><?php echo $name_of_user; ?></a>
    </li>

  </ul>
</nav>


  <script>
    document.getElementById("login").onclick= function(){
      location.href ="login.html";
    }
  </script>
</body>

</html>
