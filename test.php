<?php include('db.php');?>
<!DOCTYPE html>
<html lang="en">
    <head></head><body>
<?php
    
	 // If form submitted, insert values into the database.
		$sname = stripslashes($_REQUEST['sname']); // removes backslashes
		$sname = mysqli_real_escape_string($con,$sname); //escapes special characters in a string
		$semail = stripslashes($_REQUEST['semail']);
		$semail = mysqli_real_escape_string($con,$semail);
		$subject = stripslashes($_REQUEST['subject']);
		$subject = mysqli_real_escape_string($con,$subject);
		$message = stripslashes($_REQUEST['message']);
		$message = mysqli_real_escape_string($con,$message);
       	$query = "INSERT INTO `messages` VALUES ('$semail','$sname','$subject','$message');";
        
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to go back <a href='contacts.html'> Contacts</a></div>";
        }
	 // If form submitted, insert values into the database.
    ?>
    </body></html>