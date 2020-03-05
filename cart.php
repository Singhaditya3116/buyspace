<?php
      if(!isset($_SESSION))
      {
      session_start();
      }
?>




<!Doctype html>
<html class="no-js" lang="en">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
    table, th
    {
      border: 1px solid rgba(0, 0, 0, .2);
      padding:30px 30px 30px 30px;
    }
    td{
      border: 1px solid rgba(0, 0, 0, .2);
      padding:10px 10px 10px 10px;
      width:18%;


    }
    img{
      width:100%;
    }
    #quantity1{
      width:30%;
    }
    #cartheader{
      margin-left: 250px;
      font-size: 40px;
      font-weight: bold;
    }
    #cartotal{
      font-size: 30px;
      font-weight: bold;
    }
    #carttpos{
      float:right;
    }
    #innertotal{
      float:right;

    }
    #clr{
      clear:both;
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

    @media screen and (max-width: 600px) {

      .searchinput{
        width: 300px;
        margin-left: 0px;

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



    <div id="cartheader">CART</div>

    <div class="cart-main-area ptb-40">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="table-content table-responsive">
                <table>
                  <thead>
                    <tr>
                      <th class="product-thumbnail">Image</th>
                      <th class="product-name">Product</th>
                      <th class="product-price">Price</th>
                      <th class="product-quantity">Quantity</th>
                      <th class="product-subtotal">Total</th>
                      <th class="product-remove">Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php


                    $server = "localhost:3306";
                    $username ="root";
                    $password ="";
                    $database="auction";

                    $connect = mysqli_connect($server, $username, $password, $database);

                    if(!$connect){
                       die("Error : " . $connect>connect_error);
                    }
                            $count=0;
                            $sum=0;
                    if(isset($_SESSION['usercart']) && !empty($_SESSION['usercart']))
                    {
                    $usercart =$_SESSION['usercart'];

                    $sql="SELECT productname,image,price,quantity FROM`".$usercart."`";
                    $result = $connect->query($sql);



                    if (!empty($result) && $result->num_rows >0) {

                        while($row = $result->fetch_assoc()) {


                          $productname =  $row["productname"];
                          $startingprice =  $row["price"];
                          $quantity =  $row["quantity"];
                          $image =  $row["image"];
                          $total=$startingprice*$quantity;
                          $sum=$sum+$total;



                    ?>
                    <tr id="trow<?php echo$count;?>" class="RowDetails">
                      <td class="product-thumbnail"><img src="./images/<?php echo $row["image"]; ?>" alt="" /></td>
                      <td  class="product-name" id="product-name<?php echo$count;?>" ><?php echo $row["productname"]; ?></td>
                      <td class="product-price"><span class="amount"><?php echo $row["price"]; ?></span></td>
                      <td class="product-quantity"><span id="quantity1"><?php echo $row["quantity"]; ?> </span></td>
                      <td class="product-subtotal"><?php echo $total; ?></td>
                      <td class="product-remove" ><a id="remove<?php echo$count;?>" ><i class="fa fa-times"></i></a></td>
                    </tr>

                    <?php
                    $count++;
                            }
                          }

                            }
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

              <!-- <br>

              <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                    <input type="submit" value="Continue Shopping" />
                </div>
              </div>
              <br> -->

              <div id="carttpos">

                  <div id="cartotal">CART TOTAL</div>
                  <div id="innertotal">
                    <table>
                        <tr>
                            <th>TOTAL</th>
                        </tr>
                        <tr>
                            <td><?php echo $sum; ?></td>
                        </tr>


                    </table>
                  </div>
              </div>

              <div id="clr" ></div>

            <div id="footer"></div>

              <script>

                    // document.getElementById('remove').onclick=function()
                    // {
                    //   var productname1=document.getElementById('product_name').innerHTML;
                    //   alert(productname1);
                    //     window.location = "deletefromcart.php?prod_name=" + productname1;
                    // }

                    var RowDetails = document.querySelectorAll('.RowDetails');
                    console.log(RowDetails);
                    for(let i =0 ; i<RowDetails.length ;i++)
                    {
                          RowDetails[i].cells[5].children[0].addEventListener('click',deleteRow);
                    }
                    function deleteRow(e){
                    //  console.log(e.path[3].childNodes[1].textContent);
                      var productname1 =e.path[3].childNodes[3].textContent;
                      window.location = "deletefromcart.php?prod_name=" + productname1;
                    //  console.log(this);
                      //console.log("Clicked!!");
                    }

              </script>

    </body>
</html>
