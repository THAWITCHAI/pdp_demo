<?php
$servername = "localhost";
$username = "root";
$password = "intranet";
$dbname = "demo_pdp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
