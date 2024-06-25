<?php
$conn = new mysqli("localhost", "root", "", "jeicrud");

if ($conn->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
echo "Connected successfully";
?>