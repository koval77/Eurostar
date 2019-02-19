<?php 
include('db.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en" >

    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="icon" href="images/eorcostartfavicon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        #boxshadow {
    position: relative;
    box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
    padding: 10px;
    background: white;
}

#boxshadow img {
    width: 100%;
    border: 1px solid #8a4419;
    border-style: inset;
}

#boxshadow::after {
    content: '';
    position: absolute;
    z-index: -1; /* hide shadow behind image */
    box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3); 
    width: 70%; 
    left: 15%; /* one half of the remaining 30% */
    height: 100px;
    bottom: 0;
}
        </style>
</head>
    <body> <a href="index.html" class="btn btn-default">Home Page</a><div id="boxshadow" class="col-sm-6" style="background-color:white;float:right;">
      <p><span><img src="images/logpng.png" alt="Eurostar logo"></span></p>
    </div>

                        
        <?php 
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $tourid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 
?>
        <span><a href="signin.php"><img src="images/logo.png" alt="Eurostar logo"></a></span>
<h2>Booking your tour</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="payment.php">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error"><?php echo $emailErr;?></span>
  <br><br>
  Address: <input type="text" name="address" value="">
    <br><br>
  City: <input type="text" name="city" value="">
    <br><br>
  Post Code: <input type="text" name="postcode" value="">
    <br><br>
  Phone: <input type="text" name="phone" value="">
    <br><br>
  Passport number: <input type="text" name="passport" value="">
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br><hr><h1>Your booking details</h1><br><br>
    Tour Id: <input type="text" name="tourID" value="<?php echo $_POST['tname'];?>" readonly >
  <br><br>
    Places Booked: <input type="text" name="quantity" value="<?php echo $_POST['quantity'];?>" readonly >
    <br><br>
  <input type="submit" name="submit" value="Submit" >  
</form>

<?php
        $_SESSION['tourid']=$_POST['tname'];
        $_SESSION['quantity']=$_POST['quantity'];
        echo " session od touruid: " .$_SESSION['tourid'];
        echo "session od quantity: ".$_SESSION['quantity'];
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

        
        <p>Do testowania:</p><p>
    
        </p>
        <br><hr>
        <form action="payment.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
    data-amount="999"
    data-name="Stripe.com"
    data-description="Example charge"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-zip-code="true">
  </script>
</form>
        <h1>Another form</h1>
        <form action="payment.php" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="text" name="business" value="seller@designerfotos.com">
  <input type="text" name="item_name" value="hat">
  <input type="text" name="item_number" value="123">
  <input type="text" name="amount" value="15.00">
  <input type="text" name="first_name" value="John">
  <input type="text" name="last_name" value="Doe">
  <input type="text" name="address1" value="9 Elm Street">
  <input type="text" name="address2" value="Apt 5">
  <input type="text" name="city" value="Berwyn">
  <input type="text" name="state" value="PA">
  <input type="text" name="zip" value="19312">
  <input type="text" name="night_phone_a" value="610">
  <input type="text" name="night_phone_b" value="555">
  <input type="text" name="night_phone_c" value="1234">
  <input type="text" name="email" value="jdoe@zyzzyu.com">
  <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
</form>
</body>
</html>