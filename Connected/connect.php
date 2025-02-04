<?php
$servername = "localhost";
$username = "root";
$password = "intranet";

// Create connection
$conn = new mysqli($servername, $username, $password, "electric");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
