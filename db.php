<?php
// Replace with your own values
$host = '34.173.35.180'; // Use your Public IP Address here
$username = 'godtime';
$password = 'Godtimebenson';
$dbname = 'post_db';
$charset = 'utf8';

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
