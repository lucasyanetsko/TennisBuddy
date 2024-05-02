<!-- This file handles the court reservation process -->

<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: UserLogin.php");
  exit();
}

require_once "DatabaseConnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate and clean the input
  $email = $_SESSION["email"];
  $court_id = $_POST["court_id"];
  $reservation_time = $_POST["reservation_time"]; // Assuming the reservation_time is in the format YYYY-MM-DDTHH:MM

  // Convert reservation_time to the MySQL DATETIME format
  $reservation_datetime = date('Y-m-d H:i:s', strtotime($reservation_time));

  // Get user ID based on email
  $user_id_sql = "SELECT userID FROM users WHERE email='$email'";
  $user_id_result = $conn->query($user_id_sql);
  $user_id_row = $user_id_result->fetch_assoc();
  $user_id = $user_id_row['userID'];

  // Insert reservation into assigned_courts table
  $insert_sql = "INSERT INTO assigned_courts (courtID, userID, date_selected, date_time_selected) 
                   VALUES ('$court_id', '$user_id', CURDATE(), '$reservation_datetime')";

  if ($conn->query($insert_sql) === TRUE) {
    header("Location: MyProfile.php");
  } else {
    echo "Error: " . $insert_sql . "<br>" . $conn->error;
  }

  $conn->close();
}
