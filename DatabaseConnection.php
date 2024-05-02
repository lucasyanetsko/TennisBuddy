<!--This file is used to connect to the database -->

<?php

$servername = "localhost";
$username = "Lucas";
$password = "Lucas1";
$database = "users_and_courts";

// Creates the connection with the database
$conn = new mysqli($servername, $username, $password, $database);

// This checks the connection with the database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
