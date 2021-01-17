<?php
$con=mysqli_connect("localhost","root","","voting_system");
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>