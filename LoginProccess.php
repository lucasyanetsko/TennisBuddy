<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "db_connection.php";

  $email = $_POST["email"];
  $password = md5($_POST["password"]);

  $sql = "SELECT * FROM users WHERE email='$email' AND password_md5='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $_SESSION["email"] = $email;
    header("Location: MyProfile.php");
  } else {
    echo "Invalid email or password.";
  }

  $conn->close();
}
