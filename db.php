<?php
// Replace with your own values
$host = '123.456.789.012'; // Use your Public IP Address here
$username = 'myusername';
$password = 'mypassword';
$dbname = 'mydatabase';
$charset = 'utf8mb4';

// Create connection
try {
  $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
  $pdo = new PDO($dsn, $username, $password);
  // Set error mode to exceptions
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>
