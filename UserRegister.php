<!-- This is the code for that file that allows the user to register with their credentials -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Tennis Buddy</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <header class="header">
    <h1>Tennis Buddy</h1>
  </header>
  <section class="form-container">
    <h2>Register</h2>
    <form action="RegisterProcess.php" method="POST">
      <label for="first_name">First Name:</label>
      <input type="text" id="first_name" name="first_name" required>
      <label for="last_name">Last Name:</label>
      <input type="text" id="last_name" name="last_name" required>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <button type="submit">Register</button>
    </form>
  </section>
</body>

</html>