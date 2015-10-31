<?php
require("database2.php");

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

//$connection=mysqli_connect ('localhost', $username, $password);
//if (!$connection) {  die('Not connected : ' . mysqli_error());}
//
//// Set the active MySQL database
//
//$db_selected = mysqli_select_db($database, $connection);
//if (!$db_selected) {
//  die ('Can\'t use db : ' . mysqli_error());
//}

// Select all the rows in the markers table

$query = "SELECT * FROM markers WHERE 1";
$result = mysqli_query($connection,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("stop",$row['stop_name']);
  $newnode->setAttribute("lat", $row['stop_lat']);
  $newnode->setAttribute("lng", $row['stop_lon']);
}

echo $dom->saveXML();

?>

<?php
mysqli_close($connection);
?>