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

$usercart =$_SESSION['usercart'];


$query="DELETE FROM `".$usercart."` where productname='".$productname."'";

if ($result = mysqli_query($connect, $query)) {
  echo "<script type='text/javascript'>
        alert('Deleted Successfully');
      </script>";
  include('cart.php');
  }
  else {
    echo "<script type='text/javascript'>
          alert('Deletion cannot be Done');
        </script>";
  }
echo $quantity;



?>
