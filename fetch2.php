<?php
include("database2.php");
$result = mysqli_query($connection,"SELECT `stop_lat`, `stop_lon`, `stop_name`, `stop_id`
FROM `markers`");

$rs = array();
$i=0;
while($rs[] = mysqli_fetch_assoc($result)) 
{
// do nothing ;-)
}
mysqli_close($connection);

unset($rs[count($rs)-1]);  //removes a null value
print("{ \"markers\":" . json_encode($rs) . "}");

?>