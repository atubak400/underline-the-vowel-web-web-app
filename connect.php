<?php
// Get form data
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// Validate form data
$errors = [];
if (empty($firstname)) {
    $errors[] = 'First name is required';
}
if (empty($lastname)) {
    $errors[] = 'Last name is required';
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Valid email is required';
}
if (empty($password)) {
    $errors[] = 'Password is required';
} elseif (strlen($password) < 8) {
    $errors[] = 'Password must be at least 8 characters long';
} elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
    $errors[] = 'Password must contain at least one uppercase letter, one lowercase letter, and one number';
}
if ($password !== $confirm_password) {
    $errors[] = 'Password and confirm password do not match';
}

// If there are validation errors, display them and a link to the signup page
if (!empty($errors)) {
    echo '<ul>';
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo '</ul>';
    echo '<p>Please make the neccessary corrections and <a href="signup.php">sign up</a> again.</p>';
    exit;
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Create database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "underline_the-vowel";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement with placeholders
$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");

// Bind parameters to placeholders
$stmt->bind_param("ssss", $firstname, $lastname, $email, $hashed_password);

// Execute SQL statement
if ($stmt->execute()) {
    // Redirect to the login page
    echo "Registration Successful. Click <a href='login.php'>here</a> to login.";
    exit;
} else {
    echo "Error: " . $stmt->error;
    echo '<p>Please make the neccessary corrections and <a href="signup.php">sign up</a> again.</p>';
    exit;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
