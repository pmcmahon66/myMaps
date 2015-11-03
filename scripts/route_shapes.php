<?php include 'header.php'; ?>
<?php
//require("../database2.php");

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("routes");
$parnode = $dom->appendChild($node);

// Select all the rows in the markers table
global $wpdb;  $result = $wpdb->get_results("SELECT * FROM wp_shapes");
//$query = "SELECT * FROM shapes WHERE 1";
//$result = mysqli_query($connection,$query);
//if (!$result) {
//  die('Invalid query: ' . mysqli_error());
//}
//
//header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
foreach($result as $row){
  // ADD TO XML DOCUMENT NODE
  $node = $dom->createElement("route");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row['shape_id']);
  $newnode->setAttribute("lat",$row['shape_pt_lat']);
  $newnode->setAttribute("lng", $row['shape_pt_lon']);
  $newnode->setAttribute("seq", $row['shape_pt_sequence']);
}

print $dom->saveXML();

?>

//<?php
//mysqli_close($connection);
//?>