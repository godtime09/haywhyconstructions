<?php

// Connect to the database
$host = 'primal-monument-361913:us-central1:haywhy';
$dbname = 'post_db';
$username = 'godtins';
$password = 'Godtimebenson09';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $username, $password, $options);

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Get the form data
	$title = $_POST['title'];
	$content = $_POST['content'];
	$image = $_FILES['image']['name'];
	$tmp_image = $_FILES['image']['tmp_name'];

	// Save the image file to a uploads folder
	$uploads_dir = 'uploads/';
	move_uploaded_file($tmp_image, $uploads_dir . $image);

	// Insert the post data into the database
	$stmt = $pdo->prepare('INSERT INTO posts (title, content, image) VALUES (?, ?, ?)');
	$stmt->execute([$title, $content, $image]);

	// Redirect back to the home page
	header('Location: view-post.php');
	exit();
?>
