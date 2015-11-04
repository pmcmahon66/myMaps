<?php
//require("../database2.php");


// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Select all the rows in the markers table
global $wpdb;  $result = $wpdb->get_results("SELECT * FROM wp_markers");
//$result = mysqli_query($connection,$query);
//if (!$result) {
//  die('Invalid query: ' . mysqli_error());
//}
//
//header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
foreach($result as $row){
  // ADD TO XML DOCUMENT NODE
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row['stop_id']);
  $newnode->setAttribute("stop",$row['stop_name']);
  $newnode->setAttribute("lat", $row['stop_lat']);
  $newnode->setAttribute("lng", $row['stop_lon']);
}

print $dom->saveXML();

?>

