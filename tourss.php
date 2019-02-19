<?php 
include('db.php');
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Tour Browsing</title>
 <link rel="icon" href="images/eorcostartfavicon.ico">
      <link rel="stylesheet" href="css/tourss.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body >
<div class="menu_block" style="padding-top:10px;">
      <nav>
        <ul class="sf-menu">
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a>
            <ul>
              <li><a href="#">Agency</a></li>
              <li><a href="#">News</a></li>
              <li><a href="#">Team</a></li>
            </ul>
          </li>
          <li><a href="gallery.html">Gallery</a></li>
          <li class="current"><a href="tours.html">Tours</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="contacts.html">Contacts</a></li><li><ul></ul></li><h1><a href="signin.php"><img src="images/logo.png" alt="Eurostar logo"></a></h1>
        </ul>
      </nav>
      <div class="clear"></div>
    </div><br><br>
  <!--for demo wrap-->
  <br><hr>
      
      <div><h1>Tour Browsing</h1>
  <h2>Order by:</h2>
 <!-- <p>To make the tabs toggleable, add the data-toggle="pill" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p> -->
  <ul class="nav nav-pills btn-group btn-group-justified">
    <li class="active"><a data-toggle="pill" href="#home"  class="btn btn-primary">Destination</a></li>
    <li><a data-toggle="pill" href="#menu1"  class="btn btn-primary">Price</a></li>
    <li><a data-toggle="pill" href="#menu2"  class="btn btn-primary">Duration</a></li>
    <li><a data-toggle="pill" href="#menu3"  class="btn btn-primary">Category</a></li>
      <li><input class="form-control" id="myInput" type="text" placeholder="Search.."></li>
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="ladne">
 <?php
   $sql = "SELECT TourID,Name,SpacesLeft, Destination,TourDate,Duration,Description,Price,CategoryDescription FROM tours INNER JOIN categories ON tours.CategoryId=categories.CategoryId ORDER BY Destination;";
$result = mysqli_query($con,$sql);
    if (mysqli_num_rows($result)>0) {
        echo '<div class="backfortable"><div class="tbl-content"><table class="table" cellpadding="0" cellspacing="0" border="0"><thead><tr><th>Destination</th><th>Place</th><th>Duration</th><th>Description</th><th>Price</th><th>Category</th><th>Tour Date</th><th></th></tr></thead>';
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row["Destination"]. "</td><td>" . $row["Name"]. "</td><td>" . $row["Duration"]."</td><td>" . $row["Description"]."</td><td>" . $row["Price"]."</td><td>" . $row["CategoryDescription"]."</td><td>" . $row["TourDate"]."</td> <td>
      <form action='bookingtour.php' method='post'><input type='number' name='quantity' min='1' max='$row[SpacesLeft]' style='background-color:powderblue;color:black;' ><input type='submit' name='tname' style='color:gray;' value=' $row[TourID]'></form>
      link to book</td><tr>";
    }
        echo "</table></div></div>";
} else {
    echo "0 results";
}
?>
    </div>
    </div>
    <div id="menu1" class="tab-pane fade">
        <div class="ladne">
 <?php
   $sql = "SELECT TourID, Name,SpacesLeft, Destination,TourDate,Duration,Description,Price,CategoryDescription FROM tours INNER JOIN categories ON tours.CategoryId=categories.CategoryId ORDER BY Price;";
$result = mysqli_query($con,$sql);
    if (mysqli_num_rows($result)>0) {
        echo '<div class="backfortable"><div class="tbl-content"><table class="table" cellpadding="0" cellspacing="0" border="0"><thead><tr><th>Destination</th><th>Place</th><th>Duration</th><th>Description</th><th>Price</th><th>Category</th><th>Tour Date</th><th></th></tr></thead>';
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row["Destination"]. "</td><td>" . $row["Name"]. "</td><td>" . $row["Duration"]."</td><td>" . $row["Description"]."</td><td>" . $row["Price"]."</td><td>" . $row["CategoryDescription"]."</td><td>" . $row["TourDate"]."</td> <td>
      <form action='bookingtour.php' method='post'><input type='number' name='quantity' min='1' max='$row[SpacesLeft]' style='background-color:powderblue;color:black;' ><input type='submit' name='tname' style='background-color:powderblue;color:blue;' value=' $row[TourID]'></form>
      link to book</td><tr>";
    }
        echo "</table></div></div>";
} else {
    echo "0 results";
}
?>
    </div>
    </div>
    <div id="menu2" class="tab-pane fade">
        <div class="ladne">
 <?php
   $sql = "SELECT TourID,Name,SpacesLeft, Destination,TourDate,Duration,Description,Price,CategoryDescription FROM tours INNER JOIN categories ON tours.CategoryId=categories.CategoryId ORDER BY Duration;";
$result = mysqli_query($con,$sql);
    if (mysqli_num_rows($result)>0) {
        echo '<div class="backfortable"><div class="tbl-content"><table class="table" cellpadding="0" cellspacing="0" border="0"><thead><tr><th>Destination</th><th>Place</th><th>Duration</th><th>Description</th><th>Price</th><th>Category</th><th>Tour Date</th><th></th></tr></thead>';
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row["Destination"]. "</td><td>" . $row["Name"]. "</td><td>" . $row["Duration"]."</td><td>" . $row["Description"]."</td><td>" . $row["Price"]."</td><td>" . $row["CategoryDescription"]."</td><td>" . $row["TourDate"]."</td> <td>
      <form action='bookingtour.php' method='post'><input type='number' name='quantity' min='1' max='$row[SpacesLeft]' style='background-color:powderblue;color:black;' ><input type='submit' name='tname' value=' $row[TourID]'></form>
      link to book</td><tr>";
    }
        echo "</table></div></div>";
} else {
    echo "0 results";
}
?>
    </div>
    </div>
    <div id="menu3" class="tab-pane fade">
       <div class="ladne">
 <?php
    $sql = "SELECT TourID,Name,SpacesLeft, Destination,TourDate,Duration,Description,Price,CategoryDescription FROM tours INNER JOIN categories ON tours.CategoryId=categories.CategoryId ORDER BY CategoryDescription;";
$result = mysqli_query($con,$sql);
    if (mysqli_num_rows($result)>0) {
        echo '<div class="backfortable"><div class="tbl-content"><table class="table" cellpadding="0" cellspacing="0" border="0"><thead><tr><th>Destination</th><th>Place</th><th>Duration</th><th>Description</th><th>Price</th><th>Category</th><th>Tour Date</th><th></th></tr></thead>';
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row["Destination"]. "</td><td>" . $row["Name"]. "</td><td>" . $row["Duration"]."</td><td>" . $row["Description"]."</td><td>" . $row["Price"]."</td><td>" . $row["CategoryDescription"]."</td><td>" . $row["TourDate"]."</td> <td>
      <form action='bookingtour.php' method='post'><input type='number' name='quantity' min='1' max='$row[SpacesLeft]' style='background-color:powderblue;color:black;' ><input type='submit' name='tname' value=' $row[TourID]'></form>
      link to book</td><tr>";
    }
        echo "</table></div></div>";
} else {
    echo "0 results";
}
?>
    </div>
    </div>
  </div>
</div>
      
    <hr><div id="mytable"></div>
<!-- follow me template -->

<br>
<?php 
    $con->close();
    ?>
</body>
</html>
