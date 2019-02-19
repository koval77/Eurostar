<?php include('db.php'); require('auth.php');?>

<!DOCTYPE html>
<html>
<title>EUROSTAR</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/eorcostartfavicon.ico">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<head><style>
    @import url(http://fonts.googleapis.com/css?family=Concert+One);

.zbita { 
  animation:glow 10s ease-in-out infinite;
  
  

/* For less laggy effect, uncomment this:
  
  animation:none;
  -webkit-text-stroke:1px #fff; 
  
=========== */
  
}
/*
body { background:#0a0a0a;
  overflow:hidden;
  text-align:center;
}*/

#jebud {
  animation:wobble 5s ease-in-out infinite;
  transform-origin:center center;
  transform-style:preserve-3d;
}

@keyframes wobble {
  0%,100%{ transform:rotate3d(1,1,0,20deg); }
  25%{ transform:rotate3d(-1,1,0,20deg); }
  50%{ transform:rotate3d(-1,-1,0,20deg); }
  75%{ transform:rotate3d(1,-1,0,20deg); }
}

#dupa {
  display:block;
  width:30%;
  padding:20px;
  line-height:1.5;
  font:800 4em 'Concert One', sans-serif;
  text-transform:uppercase;
  position:absolute;
  color:#0a0a0a;
    
}

@keyframes glow {
  0%,100%{ text-shadow:0 0 30px red; }
  25%{ text-shadow:0 0 30px orange; }
  50%{ text-shadow:0 0 30px forestgreen; }
  75%{ text-shadow:0 0 30px cyan; }
}

h1:nth-child(2){ transform:translateZ(5px); }
h1:nth-child(3){ transform:translateZ(10px);}
h1:nth-child(4){ transform:translateZ(15px); }
h1:nth-child(5){ transform:translateZ(20px); }
h1:nth-child(6){ transform:translateZ(25px); }
h1:nth-child(7){ transform:translateZ(30px); }
h1:nth-child(8){ transform:translateZ(35px); }
h1:nth-child(9){ transform:translateZ(40px); }
h1:nth-child(10){ transform:translateZ(45px); }
   
    .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
       </style></head>
    <body> 
              
        <!-- Scripts to customer table-->
        <script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  fetch_data();
  function fetch_data()
  {
   var dataTable = $('#customers_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch.php",
     type:"POST"
    }
   });
  }
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#customers_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }
 $(document).on('blur', '.update', function(){
   var id = $(this).data("CustomerId");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
html += '<td contenteditable id="data3"></td>';
      html += '<td contenteditable id="data4"></td>';
      html += '<td contenteditable id="data5"></td>';
      html += '<td contenteditable id="data6"></td>';
      html += '<td contenteditable id="data7"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   html += '</tr>';
   $('#customers_data tbody').prepend(html);
  });
  $(document).on('click', '#insert', function(){
   var CustomerName = $('#data1').text();
   var CustomerAddress = $('#data2').text();
      var CustomerCity = $('#data3').text();
      var CustomerPostcode = $('#data4').text();
      var CustomerPhone = $('#data5').text();
      var CustomerEmail = $('#data6').text();
      var CustomerPassport = $('#data7').text();
   if(CustomerName != '' && CustomerAddress != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{CustomerName:CustomerName, CustomerAddress:CustomerAddress, CustomerCity:CustomerCity, CustomerPostcode:CustomerPostcode, CustomerPhone:CustomerPhone, CustomerEmail:CustomerEmail, CustomerPassport:CustomerPassport},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#customers_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Both Fields is required");
   }
  });
  $(document).on('click', '.delete', function(){
   var CustomerId = $(this).attr("CustomerId");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{CustomerId:CustomerId},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#customers_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });
</script>

        
        
        
        
        <?php
	 // If form submitted, insert values into the database.
     
    if (isset($_REQUEST['name'])){
		$name = stripslashes($_REQUEST['name']); // removes backslashes
		$name = mysqli_real_escape_string($con,$name); //escapes special characters in a string
		$spacesleft = stripslashes($_REQUEST['spacesleft']);
		$spacesleft = mysqli_real_escape_string($con,$spacesleft);
		$destination = stripslashes($_REQUEST['destination']);
		$destination = mysqli_real_escape_string($con,$destination);
$date = date("Y-m-d H:i:s");
		$duration = stripslashes($_REQUEST['duration']);
		$duration = mysqli_real_escape_string($con,$duration);
        $description = stripslashes($_REQUEST['description']);
		$description = mysqli_real_escape_string($con,$description);
        $photo = stripslashes($_REQUEST['photo']);
		$photo = mysqli_real_escape_string($con,$photo);
        $price = stripslashes($_REQUEST['price']);
		$price = mysqli_real_escape_string($con,$price);
        $category =$_REQUEST['category'];
		$query = "INSERT INTO `tours` (Name,SpacesLeft,Destination, TourDate, Duration,Description,TourPhoto,Price,CategoryId) VALUES ('$name','$spacesleft','$destination','$date','$duration  ','$description','$photo','$price','$category')";
        
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to go back<a href='dashboard.php'>Dashboard</a></div>";
        }
    }else{
?>
<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-center" style="display:none" id="mySidebar">
  <h1 class="w3-xxxlarge w3-text-theme">.............</h1><br><br>
  <button class="w3-bar-item w3-button" onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
  <a href="registration.php" class="w3-bar-item w3-button">Add new admins</a>
  <a href="#" class="w3-bar-item w3-button">Browse other admins</a>
  <a href="#" class="w3-bar-item w3-button">Relax</a>
  <a href="#" class="w3-bar-item w3-button">Suprise</a>
</nav>

<!-- Header -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i> 
  <div class="w3-center">
  <div class="zbita ">
<figure id="jebud" >
	<h1 id="dupa">FOR EUROSTAR ADMINISTRATOR</h1>
  <h1 id="dupa">FOR EUROSTAR ADMINISTRATOR</h1>
  <h1 id="dupa">FOR EUROSTAR ADMINISTRATOR</h1>
  <h1 id="dupa">FOR EUROSTAR ADMINISTRATOR</h1>
  <h1 id="dupa">FOR EUROSTAR ADMINISTRATOR</h1>
  <h1 id="dupa">FOR EUROSTAR ADMINISTRATOR</h1>
  <h1 id="dupa">FOR EUROSTAR ADMINISTRATOR</h1>
  <h1 id="dupa">FOR EUROSTAR ADMINISTRATOR</h1>
  <h1 id="dupa">FOR EUROSTAR ADMINISTRATOR</h1>
  <h1 id="dupa">FOR EUROSTAR ADMINISTRATOR</h1>
  </figure></div>
  <h1 class="w3-xxxlarge w3-animate-bottom">DASHBOARD</h1>
    <div class="w3-padding-32"><a href="logout.php">
        <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" onclick="document.getElementById('id01').style.display='block'" style="font-weight:900;">LOG OUT</button></a>
    </div>
  </div>
</header>
<hr>
        
<h2 class="w3-center">Managment</h2><button type="button" class="btn btn-default btn-lg" id="myBtn">Add tour</button>
        <div class="container">
    <!-- Trigger the modal with a button -->
 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Add tour</h4>
        </div>
        <div class="modal-body" style="padding:40px 10px;">
          <div class="w3-container"><div class="form">

<form class="w3-container w3-card-4" name="registration" action="" method="post">
  <h2>Input Form</h2>
  <div class="w3-section">      
    <input class="w3-input" type="text" name="name">
    <label>Name</label>
  </div>
  <div class="w3-section">      
    <input class="w3-input" type="number" name="spacesleft">
    <label>Spaces left</label>
  </div>
    <div class="w3-section">      
    <input class="w3-input" type="text" name="destination">
    <label>Destination</label>
  </div>
    <div class="w3-section">      
    <input class="w3-input" type="date" name="date">
    <label>Tour date</label>
  </div>
    <div class="w3-section">      
    <input class="w3-input" type="text" name="duration">
    <label>Duration</label>
  </div>
    <div class="w3-section">      
    <textarea name="description" rows="10" cols="30">Description</textarea>
  <br>
     </div>
    <div class="w3-section">      
    <input class="w3-input" type="text" name="photo">
    <label>Photo</label>
  </div>
    <div class="w3-section">      
    <input class="w3-input" type="number" name="price">
    <label>Price</label>
  </div>
    <div class="w3-section">      
    <select name="category" size="3">
    <option value=1>Economy</option>
    <option value=2>Religious</option>
    <option value=3>Firsty class</option>
    <option value=4>Exotic</option>
  </select>
  <br><br>
    <label>Category</label>
  </div>
  <input type="submit" name="submit" value="Register">
</form>
    </div>
</div>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
        
<div class="w3-border">
<div class="w3-bar w3-theme">
  <button class="w3-bar-item w3-button testbtn w3-padding-16" onclick="openCity(event,'showtours')">Show Tours</button>
  <button class="w3-bar-item w3-button testbtn w3-padding-16" onclick="openCity(event,'Paris')">Show Customer</button>
  <button class="w3-bar-item w3-button testbtn w3-padding-16" onclick="openCity(event,'Tokyo')">Show invoices</button>
</div>

<div id="showtours" class="w3-container city w3-animate-opacity">
  <h2>Tours</h2>
  <p>London is the capital city of England.</p>
  <p>It is the most populous city in the United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>
</div>

<div id="Paris" class="w3-container city w3-animate-opacity">
  <h2>Customers</h2>
  <p>Paris is the capital of France.</p> 
  <p>The Paris area is one of the largest population centers in Europe, with more than 12 million inhabitants.</p>
</div>

<div id="Tokyo" class="w3-container city w3-animate-opacity">
  <h2>Invoices</h2>
  <p>Tokyo is the capital of Japan.</p>
  <p>It is the center of the Greater Tokyo Area, and the most populous metropolitan area in the world.</p>
</div>
</div>

<hr>
<!-- Modal -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top">
      <header class="w3-container w3-theme-l1"> 
        <span onclick="document.getElementById('id01').style.display='none'"
        class="w3-button w3-display-topright">×</span>
        <h4>Oh snap! We just showed you a modal..</h4>
        <h5>Because we can <i class="fa fa-smile-o"></i></h5>
      </header>
      <div class="w3-padding">
        <p>Cool huh? Ok, enough teasing around..</p>
        <p>Go to our <a class="w3-btn" href="/w3css/default.asp">W3.CSS Tutorial</a> to learn more!</p>
      </div>
      <footer class="w3-container w3-theme-l1">
        <p>Modal footer</p>
      </footer>
    </div>
</div>

<div class="w3-row-padding w3-center w3-margin-top">
<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Testing</h3><br>
  <i class="fa fa-desktop w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
  <p>Testing post for value</p>
  <p><?php echo $_POST['submit']; ?></p>
  <p><?php echo $_POST['SUsername']; ?></p>
  <p><?php echo $_POST['username']; ?></p>
      <p><?php echo $_POST['SPassword']; ?></p>
      <p><?php echo $username; ?></p>
       <p><?php echo $username1; ?></p>
  </div>
</div>

<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Stand</h3><br>
  <i class="fa fa-css3 w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
  <p></p>
  <p><?php echo $_SESSION['username']?></p>
  <p>Wartosc calego SESSION:</p>
  <p><?php 
    foreach($_SESSION as $dupa){
        echo "<br>".$dupa;
    }
      ?></p>
  </div>
</div>

<div class="w3-third">
  <div class="w3-container">
  <h2>Important informations</h2>
  <p>For experienced administrator</p>

  <table class="w3-table w3-striped w3-border">
    <tr>
      <th>Server Info</th>
      <th>Description</th>
    </tr>
      <tr><td><?php echo $_SERVER['PHP_SELF']; ?></td><td>NAME OF THIS SCRIPT</td></tr>
      <tr><td><?php echo $_SERVER['SERVER_ADDR']; ?></td><td>IP ADDRESS OF HOST SERVER</td></tr>
      <tr><td><?php echo $_SERVER['SERVER_NAME']; ?></td><td>NAME OF HOST SERVER</td></tr>
      <tr><td><?php echo $_SERVER['HTTP_HOST']; ?></td><td>HEADER FROM CURRENT REQUEST</td></tr>
      <TR><TD><?PHP echo $_SERVER['REMOTE_ADDR']; ?></TD><td>REMOTE IP ADDRESS</td></TR>
    <!--  <TR><TD><?PHP/* echo $_SERVER['REMOTE_HOST'];*/ ?></TD><td>REMOTE HOST NAME</td></TR>-->
      <TR><TD><?PHP echo $_SERVER['SCRIPT_URL']; ?></TD><td>THIS PAGE'S URL</td></TR>
      <TR><TD><?PHP echo $_SERVER['SCRIPT_NAME']; ?></TD><td>THIS SCRIPT'S PATH</td></TR>
      <TR><TD><?PHP echo $_SERVER['SERVER_PORT']; ?></TD><td>SERVER'S PORT</td></TR>
      <TR><TD><?PHP echo $_SERVER['SCRIPT_FILENAME']; ?></TD><td>ABSOLUTE PATH OF THIS SCRIPT</td></TR>
      <TR><TD><?PHP echo $_SERVER['REMOTE_PORT']; ?></TD><td>REMOTE PORT</td></TR>
      <TR><TD><?PHP echo ['']; ?></TD><td></td></TR>
  </table>
</div>
</div>
</div>
<hr>
<div class="w3-row-padding"> 

<div class="w3-third">
<div class="w3-card">
    </div>
</div>

<div class="w3-third">
<div class="w3-card-4"><div id="piechart"></div><script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Continent', 'Tours per Continent'],
  ['Europe', 8],
  ['Africa', 2],
  ['Asia', 4],
  ['America', 2],
  ['Australia', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Tours by Continents', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
    <div class="w3-container">
    </div>
</div>
</div>

<div class="w3-third">
<div class="w3-card-4">
  <canvas width="960" height="500"></canvas>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script>

var canvas = d3.select("canvas").on("touchmove mousemove", moved).node(),
    context = canvas.getContext("2d"),
    width = canvas.width,
    height = canvas.height;

var sites = d3.range(100)
    .map(function(d) { return [Math.random() * width, Math.random() * height]; });

var voronoi = d3.voronoi()
    .extent([[-1, -1], [width + 1, height + 1]]);

redraw();

function moved() {
  sites[0] = d3.mouse(this);
  redraw();
}

function redraw() {
  var diagram = voronoi(sites),
      links = diagram.links(),
      polygons = diagram.polygons();

  context.clearRect(0, 0, width, height);
  context.beginPath();
  drawCell(polygons[0]);
  context.fillStyle = "#f00";
  context.fill();

  context.beginPath();
  for (var i = 0, n = polygons.length; i < n; ++i) drawCell(polygons[i]);
  context.strokeStyle = "#000";
  context.stroke();

  context.beginPath();
  for (var i = 0, n = links.length; i < n; ++i) drawLink(links[i]);
  context.strokeStyle = "rgba(0,0,0,0.2)";
  context.stroke();

  context.beginPath();
  drawSite(sites[0]);
  context.fillStyle = "#fff";
  context.fill();

  context.beginPath();
  for (var i = 1, n = sites.length; i < n; ++i) drawSite(sites[i]);
  context.fillStyle = "#000";
  context.fill();
  context.strokeStyle = "#fff";
  context.stroke();
}

function drawSite(site) {
  context.moveTo(site[0] + 2.5, site[1]);
  context.arc(site[0], site[1], 2.5, 0, 2 * Math.PI, false);
}

function drawLink(link) {
  context.moveTo(link.source[0], link.source[1]);
  context.lineTo(link.target[0], link.target[1]);
}

function drawCell(cell) {
  if (!cell) return false;
  context.moveTo(cell[0][0], cell[0][1]);
  for (var j = 1, m = cell.length; j < m; ++j) {
    context.lineTo(cell[j][0], cell[j][1]);
  }
  context.closePath();
  return true;
}
</script>
  <div class="w3-container">
    </div>
</div>
</div>
</div>

<?php
   $sql = "SELECT * FROM `messages`;";
$result = mysqli_query($con,$sql);
    if (mysqli_num_rows($result)>0) {
        echo '<div class="backfortable"><div class="tbl-content"><table class="w3-table-all w3-hoverable w3-card-4" cellpadding="0" cellspacing="0" border="0"><thead><tr><th>Email</th><th>Sender</th><th>Subject</th><th>Content</th></tr></thead>';
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row["email"]. "</td><td>" . $row["senderName"]. "</td><td>" . $row["subject"]."</td><td>" . $row["content"]."</td>";
    }
        echo "</table></div></div>";
} else {
    echo "0 results";
}
?>        
        
<div class="w3-container">
  <hr>
  <hr>
<h2 class="w3-left">Tours</h2>
</div>
<div class="w3-row-padding">
<div class="w3-half"><div class="form">

<form class="w3-container w3-card-4" name="registration" action="" method="post">
  <h2>Input Form</h2>
  <div class="w3-section">      
    <input class="w3-input" type="text" name="name">
    <label>Name</label>
  </div>
  <div class="w3-section">      
    <input class="w3-input" type="number" name="spacesleft">
    <label>Spaces left</label>
  </div>
    <div class="w3-section">      
    <input class="w3-input" type="text" name="destination">
    <label>Destination</label>
  </div>
    <div class="w3-section">      
    <input class="w3-input" type="date" name="date">
    <label>Tour date</label>
  </div>
    <div class="w3-section">      
    <input class="w3-input" type="text" name="duration">
    <label>Duration</label>
  </div>
    <div class="w3-section">      
    <textarea name="description" rows="10" cols="30">Description</textarea>
  <br>
     </div>
    <div class="w3-section">      
    <input class="w3-input" type="text" name="photo">
    <label>Photo</label>
  </div>
    <div class="w3-section">      
    <input class="w3-input" type="number" name="price">
    <label>Price</label>
  </div>
    <div class="w3-section">      
    <select name="category" size="3">
    <option value=1>Economy</option>
    <option value=2>Religious</option>
    <option value=3>Firsty class</option>
    <option value=4>Exotic</option>
  </select>
  <br><br>
    <label>Category</label>
  </div>
  <!-- <div class="w3-row">
  <div class="w3-half">
    <input id="milk" class="w3-check" type="checkbox">
    <label>All inclusive</label>
    <br>
    <input id="sugar" class="w3-check" type="checkbox">
    <label>Creche</label>
    <br>
    <input id="lemon" class="w3-check" type="checkbox">
    <label>Pet friendly</label>
    <br><br>
  </div>

  <div class="w3-half">
    <input id="male" class="w3-radio" type="radio" name="gender" value="male" checked>
    <label>Male</label>
    <br>
    <input id="female" class="w3-radio" type="radio" name="gender" value="female">
    <label>Female</label>
    <br>
    <input id="unknown" class="w3-radio" type="radio" name="gender" value="" disabled>
    <label> Don't know (Disabled)</label>
  </div>
  </div> -->
  <input type="submit" name="submit" value="Register">
</form>
    </div>
</div>
<div class="w3-half">
<div class="w3-card-4 w3-container">
<h2>Lists</h2>
<ul class="w3-ul w3-margin-bottom">
  <li>Jill</li>
  <li>Eve</li>
  <li>Adam</li>
</ul>
<br>
<ul class="w3-ul w3-border w3-hoverable">
  <li class="w3-theme">Jill</li>
  <li>Eve</li>
  <li>Adam</li>
  <li>Steve</li>
</ul>
<br>
</div>
</div>
</div>
<hr>


<hr>
<!-- Script for Sidebar, Tabs, Accordions, Progress bars and slideshows -->
<script>
// Side navigation
function w3_open() {
    var x = document.getElementById("mySidebar");
    x.style.width = "100%";
    x.style.fontSize = "40px";
    x.style.paddingTop = "10%";
    x.style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

// Tabs
function openCity(evt, cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  var activebtn = document.getElementsByClassName("testbtn");
  for (i = 0; i < x.length; i++) {
      activebtn[i].className = activebtn[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-dark-grey";
}

var mybtn = document.getElementsByClassName("testbtn")[0];
mybtn.click();

// Accordions
function myAccFunc(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

// Slideshows
var slideIndex = 1;

function plusDivs(n) {
slideIndex = slideIndex + n;
showDivs(slideIndex);
}

function showDivs(n) {
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

showDivs(1);

// Progress Bars
function move() {
  var elem = document.getElementById("myBar");   
  var width = 5;
  var id = setInterval(frame, 10);
  function frame() {
    if (width == 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      elem.innerHTML = width * 1  + '%';
    }
  }
}
</script>
<?php } ?>
        
        <div class="container box">
   <h1 align="center">Manage Customer Table</h1>
   <br />
   <div class="table-responsive">
   <br />
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-info">Add</button>
    </div>
    <br />
    <div id="alert_message"></div>
    <table id="customers_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Customer Name</th>
       <th>Customer Address</th>
       <th>Customer City</th>
          <th>Customer PostCode</th>
          <th>Customer Phone</th>
          <th>Customer Email</th>
		  <th>Customer Paasport</th>
		  <th>Delete</th><th>Edit</th>
      </tr>
     </thead>
    </table>
   </div>
  </div>
        <!-- Footer -->
<footer class="w3-container w3-theme-dark w3-padding-16">
  <h3>Footer</h3>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  <div style="position:relative;bottom:55px;" class="w3-tooltip w3-right">
    <span class="w3-text w3-theme-light w3-padding">Go To Top</span>    
    <a class="w3-text-white" href="#myHeader"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
  <p>Remember to check out our  <a href="w3css_references.asp" class="w3-btn w3-theme-light" target="_blank">W3.CSS Reference</a></p>
</footer>
 </body>
</html>

