<!--This page allows for the user to view their profile, 
navigate to the available courts page, and view their reserved courts. -->


<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: UserLogin.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile - Tennis Buddy</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <header class="header">
    <h1>Tennis Buddy</h1>
  </header>
  <section class="profile-info">
    <h2>Welcome, <?php echo $_SESSION["email"]; ?></h2>
  </section>
  <nav>
    <ul>
      <li><a href="AvailableCourts.php">Reserve a Court</a></li>
      <li><a href="ReservedCourts.php">View Reserved Courts</a></li>
    </ul>
  </nav>

</body>

</html>