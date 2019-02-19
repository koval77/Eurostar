<?php session_start(); ?>
<?php
	require('db.php');
	
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE (username='$username' and password='".md5($password)."') or (username='$username' and  passnomd5='$password')";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: dashboard.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to log in again<a href='signin.php'>Login</a></div>";
				}
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/eorcostartfavicon.ico">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--=========================================================================/* 
    echo "Testing post for values";
 echo $_POST['submit'];
 echo $_POST['SUsername'];
 echo $_POST['username'];
$huj=$_POST['username'];
echo $huj;
echo "<br>"."password is:".$_POST['password']."<br>";
  echo $_POST['SPassword'];
 echo $username;
     echo $username1;          */======================-->
    </head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image:url(tlo.jpg);max-width:100%;">
			<div class="wrap-login100" style="background-color:rgba(150,255,255,0.3);margin-left:850px;">
				<form class="login100-form validate-form" action="" method="post" value="" name="login">
					
                    <span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="username" value="." required>
						<span class="focus-input100" data-placeholder="login"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" required>
						<span class="focus-input100" data-placeholder="password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="submit">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Do you need to contact us?
						</span>

						<a class="txt2" href="contacts.html">
							Click here
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<?php } ?>
</body>
</html>