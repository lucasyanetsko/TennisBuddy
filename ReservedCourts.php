<!-- This page displays the reserved courts for the logged-in user. -->

<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: UserLogin.php");
  exit();
}

require_once "DatabaseConnection.php";

$email = $_SESSION["email"];

// Fetch reserved courts for the logged-in user including the date and time
$sql = "SELECT courts.court_name, courts.city, assigned_courts.date_time_selected 
        FROM courts 
        INNER JOIN assigned_courts ON courts.courtID = assigned_courts.courtID 
        INNER JOIN users ON assigned_courts.userID = users.userID 
        WHERE users.email = '$email'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reserved Courts - Tennis Buddy</title>
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
      <li><a href="MyProfile.php">My Profile</a></li>
      <li><a href="AvailableCourts.php">Reserve a Court</a></li>
    </ul>
  </nav>
  <section class="reserved-courts">
    <h2>Reserved Courts</h2>
    <?php if ($result->num_rows > 0) : ?>
      <table>
        <tr>
          <th>Court Name</th>
          <th>City</th>
          <th>Date Selected</th>
          <th>Time Selected</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
          <tr>
            <td><?php echo $row['court_name']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo date('Y-m-d', strtotime($row['date_time_selected'])); ?></td>
            <td><?php echo date('H:i', strtotime($row['date_time_selected'])); ?></td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else : ?>
      <p>No reserved courts found.</p>
    <?php endif; ?>
  </section>
</body>

</html>