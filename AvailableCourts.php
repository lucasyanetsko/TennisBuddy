<!-- 
  AvailableCourts.php displays a list of courts that are available for reservation today.
  The user can select a court and a time slot to reserve the court.
  The user must be logged in to access this page.
  If the user is not logged in, they will be redirected to the UserLogin.php page.
  The user can navigate to their profile page or view their reserved courts from this page.
  The user can reserve a court by selecting a court and a time slot and clicking the "Reserve" button.
  The user will be redirected to the ReserveProcess.php page to process the reservation. -->


<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: UserLogin.php");
  exit();
}

require_once "DatabaseConnection.php";

// Fetch available courts where today's date is within the start_date and end_date range
$sql = "SELECT * FROM courts WHERE CURDATE() BETWEEN start_date AND end_date";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Available Courts - Tennis Buddy</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    /* CSS for centering and styling the form */
    .available-courts {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 35vh;
      flex-direction: column;
    }

    /* CSS for select dropdown */
    .select-court {
      padding: 10px;
      /* Add padding to the select dropdown */
      font-size: 16px;
      /* Set font size */
      border: 1px solid #ccc;
      /* Add border */
      border-radius: 5px;
      /* Add border radius */
    }

    /* CSS for date/time selector */
    .date-time-selector {
      padding: 10px;
      /* Add padding to the date/time input */
      font-size: 16px;
      /* Set font size */
      border: 1px solid #ccc;
      /* Add border */
      border-radius: 5px;
      /* Add border radius */
    }
  </style>
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
      <li><a href="ReservedCourts.php">View Reserved Courts</a></li>
    </ul>
  </nav>
  <section class="available-courts">
    <h2>Available Courts</h2>
    <?php if ($result->num_rows > 0) : ?>
      <form action="ReserveProcess.php" method="POST">
        <select name="court_id" required class="select-court">
          <option value="" disabled selected>Select Court</option>
          <?php while ($row = $result->fetch_assoc()) : ?>
            <option value="<?php echo $row['courtID']; ?>"><?php echo $row['court_name']; ?></option>
          <?php endwhile; ?>
        </select>
        <input type="datetime-local" name="reservation_time" required class="date-time-selector">
        <button type="submit">Reserve</button>
      </form>
    <?php else : ?>
      <p>No courts available for reservation today.</p>
    <?php endif; ?>
  </section>
</body>

</html>