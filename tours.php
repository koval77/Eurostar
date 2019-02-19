<?php 
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Journey | Tours</title>
<meta charset="utf-8">
<link rel="icon" href="images/eorcostartfavicon.ico">
    
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.jqtransform.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script>
$(window).load(function () {
    $().UItoTop({
        easingType: 'easeOutQuart'
    });
});
$(function () {
    $(".form1").jqTransform();
});
</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<header>
  <div class="container_12">
    <div class="grid_12">
      <h1><a href="index.html"><img src="images/logo.png" alt=""></a></h1>
      <div class="clear"></div>
    </div>
    <div class="menu_block">
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
          <li><a href="contacts.html">Contacts</a></li><li><a href="signin.php">Sign in</a><ul><li><a href="signup.html">Sign up</a></li></ul></li>
        </ul>
      </nav>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</header>
<div class="main">
  <div class="content">
    <div class="container_12">
      <div class="grid_9">
        <h3>Special Tours</h3>
        <div class="tours">
          <div class="grid_4 alpha">
            <div class="tour"> <img src="images/page4_img1.jpg" alt="" class="img_inner fleft">
              <div class="extra_wrapper">
                <p class="text1">Gellentesque imperdiet </p>
                <p class="price">Lorem ipsum dolor sit amet <span>From $ 399</span></p>
                <p class="price">Suspendisse jew wligulawe <span>From $ 299</span></p>
                <a href="#" class="btn">Details</a> </div>
            </div>
          </div>
          <div class="grid_4 omega">
            <div class="tour"> <img src="images/page4_img2.jpg" alt="" class="img_inner fleft">
              <div class="extra_wrapper">
                <p class="text1">Mellentesquj mperdiete </p>
                <p class="price">Dorem ium dolor sit amet <span>From $ 399</span></p>
                <p class="price">Huspendisse jew eligulawe <span>From $ 299</span></p>
                <a href="#" class="btn">Details</a> </div>
            </div>
          </div>
          <div class="clear"></div>
          <div class="grid_4 alpha">
            <div class="tour"> <img src="images/page4_img3.jpg" alt="" class="img_inner fleft">
              <div class="extra_wrapper">
                <p class="text1">Holellentesq imperdiet</p>
                <p class="price">Sorem ipsum olor sit amety <span>From $ 499</span></p>
                <p class="price">Apendisse jow wligulawet <span>From $ 599</span></p>
                <a href="#" class="btn">Details</a> </div>
            </div>
          </div>
          <div class="grid_4 omega">
            <div class="tour"> <img src="images/page4_img4.jpg" alt="" class="img_inner fleft">
              <div class="extra_wrapper">
                <p class="text1">Gellentesque imperdiet </p>
                <p class="price">Lorem ipsum dolor sit amet <span>From $ 399</span></p>
                <p class="price">Suspendisse jew wligulawe <span>From $ 299</span></p>
                <a href="#" class="btn">Details</a> </div>
            </div>
          </div>
          <div class="clear"></div>
          <div class="grid_4 alpha">
            <div class="tour"> <img src="images/page4_img5.jpg" alt="" class="img_inner fleft">
              <div class="extra_wrapper">
                <p class="text1">Fdaellensque perdiet </p>
                <p class="price">Gorem sum dolor sit met <span>From $ 399</span></p>
                <p class="price">Xuspendisse wew ligulawe <span>From $ 299</span></p>
                <a href="#" class="btn">Details</a> </div>
            </div>
          </div>
          <div class="grid_4 omega ">
            <div class="tour"> <img src="images/page4_img6.jpg" alt="" class="img_inner fleft">
              <div class="extra_wrapper">
                <p class="text1">Mellentesquj mperdiete</p>
                <p class="price">Sorem ipsum olor sit amety<span> From $ 399</span></p>
                <p class="price">Suspendisse jew wligulawe <span>From $ 299</span></p>
                <a href="#" class="btn">Details</a> </div>
            </div>
          </div>
        </div>
      </div>
      <div class="grid_3">
        <h3>Browse Tours</h3>
        <form method="post" id="form1" class="form1" action="#">
          <label class="mb0"> <span>Browse by Tour Operator</span>
            <select name="select">
              <option value="">Browse by Tour Operator</option>
              <option value="">...</option>
            </select>
          </label>
          <div class="clear"></div>
          <a onClick="document.getElementById('form1').submit()" href="#" class="btn"> Search</a>
        </form>
        <h3>Search Tours</h3>
        <form method="post" id="form2" class="form1" action="#">
          <label > <span><span class="col1">All Tour Operators</span><br>
            Destination</span>
            <select name="select">
              <option value="">Any destination</option>
              <option value="">...</option>
            </select>
          </label>
          <label > <span>Departing</span>
            <select name="select">
              <option value="">Any departing</option>
              <option value="">...</option>
            </select>
          </label>
          <label> <span>Price</span>
            <select name="select">
              <option value="">Any price</option>
              <option value="">...</option>
            </select>
          </label>
          <label class="mb0"> <span>Duration</span>
            <select name="select">
              <option value="">Any duration</option>
              <option value="">...</option>
            </select>
          </label>
          <div class="clear"></div>
          <a onClick="document.getElementById('form2').submit()" href="#" class="btn"> Search</a>
        </form>
      </div>
      <div class="clear"></div>
    </div>
  </div><div id="exper">dupahuj</div><section class="backfortable";>
    <?php
    $sql = "SELECT Name, Destination, Duration FROM tours";
$result = mysqli_query($con,$sql);
    if (mysqli_num_rows($result)>0) {
        echo '<div class="backfortable"><div class="tbl-content"><table cellpadding="0" cellspacing="0" border="0"><tr><th>Name</th><th>Destination</th><th>Duration</th></tr>';
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["Destination"]. "</td><td>" . $row["Duration"]. "</td><tr>";
    }
        echo "</table></div></div>";
} else {
    echo "0 results";
}
$con->close();
?>
             </section>
  <div class="bottom_block">
    <div class="container_12">
      <div class="grid_2 prefix_2">
        <ul>
          <li><a href="#">FAQS Page</a></li>
          <li><a href="#">People Say</a></li>
        </ul>
      </div>
      <div class="grid_2">
        <ul>
          <li><a href="#">Useful links</a></li>
          <li><a href="#">Partners</a></li>
        </ul>
      </div>
      <div class="grid_2">
        <ul>
          <li><a href="#">Insurance</a></li>
          <li><a href="#">Family Travel</a></li>
        </ul>
      </div>
      <div class="grid_2">
        <h4>Contact Us:</h4>
        TEL: 1-800-234-5678<br>
        <a href="#">info@demolink.org</a> </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<footer>
  <div class="container_12">
    <div class="grid_12">
      <div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
      <div class="copy"> Journey &copy; 2045 | <a href="#">Privacy Policy</a> | Design by: <a href="http://www.templatemonster.com/">TemplateMonster.com</a> </div>
    </div>
    <div class="clear"></div>
  </div>
</footer>
</body>
</html>