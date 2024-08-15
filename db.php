<?php
$servername = "localhost"; // Change this to your database server name
$username = "impress2_rk"; // Change this to your database username
$password = "Thanya@2022"; // Change this to your database password
$database = "impress2_impressive"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}