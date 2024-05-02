<!--This is the code for the user to login with their existing credentials -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Tennis Buddy</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <header class="header">
    <h1>Tennis Buddy</h1>


  </header>
  <section class="form-container">
    <h2>Login</h2>
    <form action="LoginProcess.php" method="POST">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <button type="submit">Login</button>
    </form>
  </section>
</body>

</html>