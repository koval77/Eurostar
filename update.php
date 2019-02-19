<?php
require('db.php'); include('auth.php');
if(isset($_POST["CustomerId"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE customers SET ".$_POST["column_name"]."='".$value."' WHERE CustomerId = '".$_POST["CustomerId"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}
?>