<?php
 echo "Testing post for values";
 echo $_POST['submit'];
 echo $_POST['SUsername'];
 echo $_POST['username'];
$huj=$_POST['username'];
echo $huj;
echo "<br>"."password is:".$_POST['password']."<br>";
  echo $_POST['SPassword'];
 echo $username;
     echo $username1;
var_dump($_GET); // Element 'foo' is string(1) "a"
var_dump($_POST); // Element 'bar' is string(1) "b"
var_dump($_REQUEST); // Does not contain elements 'foo' or 'bar'
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   session_destroy();
   echo 'You have cleaned session';
   header('Refresh: 5; URL = index.html');
?>