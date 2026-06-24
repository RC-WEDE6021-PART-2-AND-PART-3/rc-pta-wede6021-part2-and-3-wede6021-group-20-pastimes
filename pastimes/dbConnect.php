<?php
$host = "localhost"; // Database host
$user = "root";
$password = "";
$dbname = "clothingStore"; // Database name

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Handle connection error
}
?>
// This file establishes a connection to the MySQL database using the MySQLi extension.