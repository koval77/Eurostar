<?php
include("dbOO.php");
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


// Select all the rows in the markers table
$query = "SELECT TourID, Name, Destination, Lat, Lon  FROM tours;";
$result = mysqli_query($con, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}



// Start XML file, echo parent node
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'TourID="' . $row['TourID'] . '" ';
  echo 'Name="' . parseToXML($row['Name']) . '" ';
  echo 'Destination="' . parseToXML($row['Destination']) . '" ';
  echo 'Lat="' . $row['Lat'] . '" ';
  echo 'Lon="' . $row['Lon'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';
?>