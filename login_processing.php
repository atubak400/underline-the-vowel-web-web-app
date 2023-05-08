<?php
// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: index.php');
    exit;
}

// Check if the login form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', 'root', 'underline_the-vowel');

    // Check if the connection was successful
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Prepare the SQL statement to select the user with the matching email
    $stmt = mysqli_prepare($conn, 'SELECT id, password FROM users WHERE email = ?');

    // Bind the email parameter to the statement
    mysqli_stmt_bind_param($stmt, 's', $email);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Store the result of the statement
    mysqli_stmt_store_result($stmt);

    // Check if the statement returned a result
    if (mysqli_stmt_num_rows($stmt) === 1) {
        // Bind the password result to the variable
        mysqli_stmt_bind_result($stmt, $id, $hashed_password);
        mysqli_stmt_fetch($stmt);

        // Check if the entered password matches the stored hashed password
        if (password_verify($password, $hashed_password)) {
            // Login successful, set the session variables and redirect to index.php
            $_SESSION['loggedin'] = true;
            header('Location: index.php');
            exit;
        }
    }

    // Login failed, show an error message
    echo 'Incorrect email or password.';

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
