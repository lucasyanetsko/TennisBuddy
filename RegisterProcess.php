<!-- This file is used to handle the registration process -->

<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "DatabaseConnection.php";

  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $password = md5($_POST["password"]);

  $sql = "INSERT INTO users (first_name, last_name, email, password_md5) VALUES ('$first_name', '$last_name', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    $_SESSION["email"] = $email;
    header("Location: MyProfile.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
