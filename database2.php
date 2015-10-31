<?php
//Connect to mysql
$connection = mysqli_connect("localhost", "root", "");

//connect to database
mysqli_select_db($connection, "mcginleybus");

//test connection
if (mysqli_connect_errno()){
	 echo 'Failed to connect to mysql: '.mysqli_connect_error();
}
?>