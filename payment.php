<?php 
include('db.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
    <head>
    <style>
        *{margin:0; padding:0;}
body{overflow:hidden;}
.leaves{width:300px; height:90px; border-radius:100%; background:#669933; position:absolute; top:0;display:block; box-shadow:0 0 10px 10px #336600 inset;}
.branch{position:absolute; width:300px; height:50px; overflow:hidden; top:0; left:0}
.two{-webkit-transform-origin:0 0; -webkit-transform:rotate(45deg);left:30px; top:10px;-moz-transform-origin:0 0; -moz-transform:rotate(45deg);}
.three{-webkit-transform-origin:0 0; -webkit-transform:rotate(-45deg);left:-30px; top:10px;-moz-transform-origin:0 0; -moz-transform:rotate(-45deg);}
.tree{position:absolute; left:50%; margin-left:-300px; top:50%;  }
.four{-webkit-transform-origin:0 0; -webkit-transform:rotate(135deg);-moz-transform-origin:0 0; -moz-transform:rotate(135deg);left:30px; top:10px;}
.five{-webkit-transform-origin:0 0; -webkit-transform:rotate(-135deg);-moz-transform-origin:0 0; -moz-transform:rotate(-135deg);left:25px; top:75px;}
.five .leaves,.four .leaves,.rev .leaves{top:-50px; }
.rev{-webkit-transform-origin:0 0; -webkit-transform:rotate(-180deg);-moz-transform-origin:0 0; -moz-transform:rotate(-180deg); top:40px;left:10px}
.center{-webkit-transform-origin:0 0; -webkit-transform:rotate(-90deg); left:-20px; top:10px;}
.center .leaves{height:40px;width:230px;}

.coconut{ width:60px; height:60px; border-radius:78%/100%; background:#996633; position:absolute; box-shadow:0 0 10px 10px #663300 inset;left:-20px;}
.coconut.c_one{top:30px;left:5px}
.coconut.c_two{top:30px;left:-50px}

.stem{height:600px; width:50px;  position:absolute;
background-color: #816b4b;
background-image: -webkit-gradient(linear, 0 0, 100% 0, color-stop(.5, rgba(255, 255, 255, .2)), color-stop(.5, transparent), to(transparent));
background-image: -webkit-linear-gradient(0deg, rgba(255, 255, 255, .2) 50%, transparent 50%, transparent);
background-image: -moz-linear-gradient(0deg, rgba(255, 255, 255, .2) 50%, transparent 50%, transparent);
background-image: -ms-linear-gradient(0deg, rgba(255, 255, 255, .2) 50%, transparent 50%, transparent);
background-image: -o-linear-gradient(0deg, rgba(255, 255, 255, .2) 50%, transparent 50%, transparent);
background-image: linear-gradient(0deg, rgba(255, 255, 255, .2) 50%, transparent 50%, transparent);background-size: 5px 100px;
top:40px; left:-16px;
box-shadow:0 0 20px 10px #3a2c17 inset;
}
.bg{background: #a9e4f7; /* Old browsers */

background: -moz-linear-gradient(top,  #a9e4f7 0%, #0fb4e7 33%, #0e8ed3 35%, #0e8ed3 57%, #76c1b7 68%, #d1b673 77%, #d1b673 100%); /* FF3.6+ */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#a9e4f7), color-stop(33%,#0fb4e7), color-stop(35%,#0e8ed3), color-stop(57%,#0e8ed3), color-stop(68%,#76c1b7), color-stop(77%,#d1b673), color-stop(100%,#d1b673)); /* Chrome,Safari4+ */

background: -webkit-linear-gradient(top,  #a9e4f7 0%,#0fb4e7 33%,#0e8ed3 35%,#0e8ed3 57%,#76c1b7 68%,#d1b673 77%,#d1b673 100%); /* Chrome10+,Safari5.1+ */

background: -o-linear-gradient(top,  #a9e4f7 0%,#0fb4e7 33%,#0e8ed3 35%,#0e8ed3 57%,#76c1b7 68%,#d1b673 77%,#d1b673 100%); /* Opera 11.10+ */

background: -ms-linear-gradient(top,  #a9e4f7 0%,#0fb4e7 33%,#0e8ed3 35%,#0e8ed3 57%,#76c1b7 68%,#d1b673 77%,#d1b673 100%); /* IE10+ */

background: linear-gradient(to bottom,  #a9e4f7 0%,#0fb4e7 33%,#0e8ed3 35%,#0e8ed3 57%,#76c1b7 68%,#d1b673 77%,#d1b673 100%); /* W3C */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a9e4f7', endColorstr='#d1b673',GradientType=0 ); /* IE6-9 */
height:900px;
}
.sun{position: absolute;
width: 70px;
height: 70px;
background: #fff60b;
box-shadow: 0 0 60px 20px #ffc80b, 0 0 20px 3px #ffc80b inset;
z-index: 1000;
top: 30px;
right: 40px;
display: block;
border-radius: 100%;}

.cloud {
	width: 200px; height: 60px;
	background: #fff;
	
	border-radius: 200px;
	-moz-border-radius: 200px;
	-webkit-border-radius: 200px;
	
	position: relative; 
}

.cloud:before, .cloud:after {
	content: '';
	position: absolute; 
	background: #fff;
	width: 100px; height: 80px;
	position: absolute; top: -15px; left: 10px;
	
	border-radius: 100px;
	-moz-border-radius: 100px;
	-webkit-border-radius: 100px;
	
	-webkit-transform: rotate(30deg);
	transform: rotate(30deg);
	-moz-transform: rotate(30deg);
}

.cloud:after {
	width: 120px; height: 120px;
	top: -55px; left: auto; right: 15px;
}
.x1 {
	-webkit-animation: moveclouds 15s linear infinite;
	-moz-animation: moveclouds 15s linear infinite;
	-o-animation: moveclouds 15s linear infinite;
}
.x2 {
	left: 200px;
	
	-webkit-transform: scale(0.6);
	-moz-transform: scale(0.6);
	transform: scale(0.6);
	opacity: 0.6;
	-webkit-animation: moveclouds 25s linear infinite;
	-moz-animation: moveclouds 25s linear infinite;
	-o-animation: moveclouds 25s linear infinite;
}

.x3 {
	left: -250px; top: -200px;
	
	-webkit-transform: scale(0.8);
	-moz-transform: scale(0.8);
	transform: scale(0.8);
	opacity: 0.8; 
	
	-webkit-animation: moveclouds 20s linear infinite;
	-moz-animation: moveclouds 20s linear infinite;
	-o-animation: moveclouds 20s linear infinite;
}

.x4 {
	left: 470px; top: -250px;
	
	-webkit-transform: scale(0.75);
	-moz-transform: scale(0.75);
	transform: scale(0.75);
	opacity: 0.75; 
	
	-webkit-animation: moveclouds 18s linear infinite;
	-moz-animation: moveclouds 18s linear infinite;
	-o-animation: moveclouds 18s linear infinite;
}

.x5 {
	left: -150px; top: -150px;
	
	-webkit-transform: scale(0.8);
	-moz-transform: scale(0.8);
	transform: scale(0.8);
	opacity: 0.8; 
	
	-webkit-animation: moveclouds 20s linear infinite;
	-moz-animation: moveclouds 20s linear infinite;
	-o-animation: moveclouds 20s linear infinite;
}

@-webkit-keyframes moveclouds {
	0% {margin-left: 100%;}
	100% {margin-left: -100%;}
}
@-moz-keyframes moveclouds {
0% {margin-left: 100%;}
	100% {margin-left: -100%;}
}
@-o-keyframes moveclouds {
	0% {margin-left: 100%;}
	100% {margin-left: -100%;}
}

        </style>
    
    </head>
    <body>
        <div class="bg">
<div class="sun"></div>
<div id="clouds"><a href="index.html">Go back to home page</a>
            <div class="cloud x1"></div>
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
         </div>   
	


   



        
        <p>
    <?php 
        print_r($_SESSION);
         $query="SELECT MAX(CustomerId) FROM customers;";
        $result = mysqli_query($con,$query);
        $custid = mysqli_fetch_row($result);
        $_SESSION['cusid']=$custid[0];
        ?>
        </p>
        <br><hr>
        
        <?php
	 // If form submitted, insert values into the database.
        if (isset($_REQUEST['name'])){
		$name = stripslashes($_REQUEST['name']); // removes backslashes
		$name = mysqli_real_escape_string($con,$name); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$address = stripslashes($_REQUEST['address']);
		$address = mysqli_real_escape_string($con,$address);
        $city = stripslashes($_REQUEST['city']);
		$city = mysqli_real_escape_string($con,$city);
        $passport = stripslashes($_REQUEST['passport']);
		$passport = mysqli_real_escape_string($con,$passport);
        $postcode = stripslashes($_REQUEST['postcode']);
		$postcode = mysqli_real_escape_string($con,$postcode);
        $phone = stripslashes($_REQUEST['phone']);
		$phone = mysqli_real_escape_string($con,$phone);
        $cusid=stripslashes($_SESSION['cusid'])+1;
		$query = "INSERT INTO `customers` (CustomerName,CustomerAddress,CustomerCity, CustomerPostcode, CustomerPhone,CustomerEmail,CustomerPassport) VALUES ('$name','$address','$city','$postcode','$phone','$email','$passport');";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        $last_id = mysqli_insert_id($con);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
                
        if($result){ $last_id = mysqli_insert_id($con);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
                    $query= "INSERT INTO `bookings` (CustomerId,BookingDate) VALUES ($last_id,CURDATE());";
                    $result = mysqli_query($con,$query) or die(mysqli_error($con));
                    $last_id = mysqli_insert_id($con);
                    $tourid=$_SESSION['tourid'];
                    $quantity=$_SESSION['quantity'];
                    $priceperone=mysqli_query($con,"SELECT Price FROM tours WHERE TourID=$tourid");
                    $cena = mysqli_fetch_row($priceperone);
                    $query= "INSERT INTO `orderline` (BookingID,TourID,PlacesSold,TotalAmount) VALUES ($last_id,  $tourid,  $quantity,$cena[0]*$quantity);";
                    $result = mysqli_query($con,$query) or die(mysqli_error($con));
                    $query= "UPDATE tours SET SpacesLeft=SpacesLeft-2 WHERE TourID=$tourid";
                    $result = mysqli_query($con,$query) or die(mysqli_error($con));
                    echo "Wartosc custid zmiennej jest:".$custid."<br>";
        echo "printr dla custid".print_r($custid);
        echo "printr przed wykonaniem sessioonrownasiecustid";
        print_r($_SESSION);
        echo "a to printrsession po ";
        print_r($_SESSION);
                echo "Wartosc indexu cusid z Session to: ".$_SESSION['cusid'];
        echo "<br>";
        echo "ok to teraz suid o indexie 0: ".$custid[0];
        
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to go backto <a href='tourss.php'>Tours</a></div>";
        }
    }else{}
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
    
        ?>
            
    <div class="tree">
<div class="branch center">
    <div class="leaves">
    </div>
</div>
<div class="branch">
    <div class="leaves"> 
    </div>
    </div>
<div class="branch two">
    <div class="leaves">
    </div>
</div>
<div class="branch three">
    <div class="leaves">
    </div>
</div>
<div class="branch four">
    <div class="leaves">
    </div>
</div>
<div class="branch five">
    <div class="leaves">
    </div>
</div>
<div class="branch rev">
    <div class="leaves">
    </div>
    </div>
<div class="stem"></div>
<div class="coconut"></div>
<div class="coconut c_one"></div>
<div class="coconut c_two"></div>
<div class="coconut c_three">
    </div></div></div>
    </body></html>