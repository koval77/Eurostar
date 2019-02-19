<?php
        $locations=array();
        //$work=$_GET["service"];
        $uname="root";
        $pass="";
        $servername="localhost";
        $dbname="eurostar";
        $db=new mysqli($servername,$uname,$pass,$dbname);
        $query =  $db->query("SELECT TourID,SpacesLeft,Destination, TourDate, Duration, Lat,Lon FROM tours");
 //$number_of_rows = mysql_num_rows($db);  
        //echo $number_of_rows;
        while( $row = $query->fetch_assoc() ){
            $name = $row['TourID'];
            $longitude = $row['Lon'];                              
            $latitude = $row['Lat'];
            $link=$row['Destination'];
            $spacesleft=$row['SpacesLeft'];
            $tourdate=$row['TourDate'];
            $duration=$row['Duration'];
            /* Each row is added as a new array */
            $locations[]=array( 'TourID'=>$name, 'Lat'=>$latitude, 'Lon'=>$longitude, 'Destination'=>$link, 'SpacesLeft'=>$spacesleft, 'TourDate'=>$tourdate, 'Duration'=>$duration );
        }
        //echo $locations[0]['name'].": In stock: ".$locations[0]['lat'].", sold: ".$locations[0]['lng'].".<br>";
        //echo $locations[1]['name'].": In stock: ".$locations[1]['lat'].", sold: ".$locations[1]['lng'].".<br>";
    ?>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDsGhOtO6cHuyi-6MGU9JIOXXZp5OHAOaQ"></script> 
    <script type="text/javascript">
    var map;
    var Markers = {};
    var infowindow;
    var locations = [
        <?php for($i=0;$i<sizeof($locations);$i++){ $j=$i+1;?>
        [
            'AMC Service',
            '<p>"Go visit <?php echo $locations[$i]['Destination'];?> "Book this Tour from us Now!!!</p><p>The tour starts on <?php echo $locations[$i]['TourDate'] ?>!<br></p><br><p>Only <?php echo $locations[$i]['SpacesLeft'];?> places left!</p><form action="bookingtour.php" method="post"><input type="number" name="quantity" min="1" max="$row[SpacesLeft]" style="background-color:powderblue;color:black;"><input type="submit" name="tname" value="Submit Tour number: <?php echo $name ?>"></form>',
            <?php echo $locations[$i]['Lat'];?>,
            <?php echo $locations[$i]['Lon'];?>,
            0
        ]<?php if($j!=sizeof($locations))echo ","; }?>
       
    ];
    var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);
    function initialize() {
      var mapOptions = {
        zoom: 9,
        center: origin
      };
      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        infowindow = new google.maps.InfoWindow();
        for(i=0; i<locations.length; i++) {
            var position = new google.maps.LatLng(locations[i][2], locations[i][3]);
            var marker = new google.maps.Marker({
                position: position,
                map: map,
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][1]);
                    infowindow.setOptions({maxWidth: 200});
                    infowindow.open(map, marker);
                }
            }) (marker, i));
            Markers[locations[i][4]] = marker;
        }
        locate(0);
    }
    function locate(marker_id) {
        var myMarker = Markers[marker_id];
        var markerPosition = myMarker.getPosition();
        map.setCenter(markerPosition);
        google.maps.event.trigger(myMarker, 'click');
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <body id="map-canvas">