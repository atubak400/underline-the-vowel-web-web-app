<!DOCTYPE html>
<html>
<head>
  <title>Login to Underline the Vowels</title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<h1>Underline the Vowels</h1>
<form action="login_processing.php" method="POST">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder="Enter your email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required>

    <button type="submit">Log In</button>
    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
</form>



</body>
</html>



  