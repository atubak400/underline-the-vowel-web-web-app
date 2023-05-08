<!DOCTYPE html>
<html>
<head>
  <title>Sign Up for Underline the Vowels</title>
  <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
<h1>Underline the Vowels</h1>
<form action="connect.php" method="POST">
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>

    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder="Enter your email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter a password" required>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>

    <button type="submit">Sign Up</button>
</form>

</form>

</body>
</html>
