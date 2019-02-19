<?php
$connect = mysqli_connect("localhost", "root", "", "eurostar");
echo "connect";

if(isset($_POST["CustomerName"], $_POST["CustomerAddress"]))
{
 $CustomerName = mysqli_real_escape_string($connect, $_POST["CustomerName"]);
 $CustomerAddress = mysqli_real_escape_string($connect, $_POST["CustomerAddress"]);
    $CustomerCity = mysqli_real_escape_string($connect, $_POST["CustomerCity"]);
    $CustomerPostcode = mysqli_real_escape_string($connect, $_POST["CustomerPostcode"]);
    $CustomerPhone = mysqli_real_escape_string($connect, $_POST["CustomerPhone"]);
    $CustomerEmail = mysqli_real_escape_string($connect, $_POST["CustomerEmail"]);
    $CustomerPassport = mysqli_real_escape_string($connect, $_POST["CustomerPassport"]);
 $query = "INSERT INTO customers(CustomerName, CustomerAddress, CustomerCity,CustomerPostcode,CustomerPhone,CustomerEmail,CustomerPassport) VALUES('$CustomerName', '$CustomerAddress','$CustomerCity','$CustomerPostcode','$CustomerPhone','$CustomerEmail','$CustomerPassport')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>