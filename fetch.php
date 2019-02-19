<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "eurostar");
$columns = array('CustomerName', 'CustomerAddress', 'CustomerCity', 'CustomerPostcode', 'CustomerPhone', 'CustomerEmail', 'CustomerPassport');

$query = "SELECT CustomerId,CustomerName,CustomerAddress,CustomerCity,CustomerPostcode,CustomerPhone,CustomerEmail,CustomerPassport FROM customers ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE CustomerName LIKE "%'.$_POST["search"]["value"].'%" 
 OR CustomerAddress LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY CustomerId DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["CustomerId"].'" data-column="CustomerName">' . $row["CustomerName"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["CustomerId"].'" data-column="CustomerAddress">' . $row["CustomerAddress"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["CustomerId"].'" data-column="CustomerCity">' . $row["CustomerCity"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["CustomerId"].'" data-column="CustomerPostcode">' . $row["CustomerPostcode"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["CustomerId"].'" data-column="CustomerPhone">' . $row["CustomerPhone"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["CustomerId"].'" data-column="CustomerEmail">' . $row["CustomerEmail"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["CustomerId"].'" data-column="CustomerPassport">' . $row["CustomerPassport"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" CustomerId="'.$row["CustomerId"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT CustomerId,CustomerName,CustomerAddress,CustomerCity,CustomerPostcode,CustomerPhone,CustomerEmail,CustomerPassport FROM customers";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>