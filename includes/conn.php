<?php


$db=mysqli_connect("localhost","root","","event_info");

if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>