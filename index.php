<?php
session_start();
// If the user is not logged in, redirect them to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header('Location: login.php');
  exit();
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Underline the Vowels</title>
	<link rel="stylesheet" href="front-end.css">
</head>

<body>
	<form method="post" action="back-end.php">
		<label for="sentence">Enter a sentence:</label><br>
		<input type="text" name="sentence" id="sentence"><br>
		<input type="submit" value="Submit">
	</form>
</body>

</html>