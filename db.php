<?php
$servername = "localhost";
$username = "xwzl6mz672t1"; 
$password = "Sakthi@1702";
$db = "eyeball";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>