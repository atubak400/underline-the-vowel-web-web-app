<!DOCTYPE html>
<html>
<head>
	<title>Underlined Vowels</title>
	<link rel="stylesheet" href="back-end.css">
</head>
<body>
<?php
// Initialize variables
$sentence = '';
$output = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Validate input
	if (empty($_POST['sentence'])) {
		$errors[] = 'Sentence is required';
	} else {
		$sentence = trim($_POST['sentence']);
		if (!preg_match('/^[a-zA-Z\s]+$/', $sentence)) {
			$errors[] = 'Sentence must only contain letters and spaces';
		}
	}

	// Process input if there are no errors
	if (empty($errors)) {
		$vowels = ['a', 'e', 'i', 'o', 'u'];

		// Split the sentence into an array of characters
		$characters = str_split($sentence);

		// Loop through each character and check if it's a vowel
		foreach ($characters as $character) {
			if (in_array(strtolower($character), $vowels)) {
				$output .= "<span>{$character}</span>";
			} else {
				$output .= $character;
			}
		}

		// Output the sentence with underlined vowels
		echo "<div class='sentence'>{$output}</div>";
	} else {
		// Output errors
		foreach ($errors as $error) {
			echo "<div class='error'>{$error}</div>";
		}
	}
}
?>
<div class="back-to-home">
<a href="index.php">Back to Home</a>
</div>
</body>
</html>
