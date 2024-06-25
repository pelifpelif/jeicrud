<?php
$servername = "localhost";
$username = "root"; // Default username in XAMPP
$password = ""; // Empty password in XAMPP by default
$dbname = "jeicrud"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
