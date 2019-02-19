<?php
require('db.php'); include('auth.php');
$connect = mysqli_connect("localhost", "root", "", "eurostar");

if(isset($_POST["CustomerId"]))
{
 $query = "DELETE FROM customers WHERE CustomerId = '".$_POST["CustomerId"]."'";
 echo $_POST['CustomerId'];
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>