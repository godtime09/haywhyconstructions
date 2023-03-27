<?php
require_once('db.php');

if(isset($_POST['submit'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $image = $_FILES['image']['name'];

  // File upload path
  $targetDir = "uploads/";
  $targetFilePath = $targetDir . basename($image);
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

  // Allow certain file formats
  $allowTypes = array('jpg','png','jpeg','gif');
  if(in_array($fileType, $allowTypes)){
    // Upload file to server
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
      // Insert into database
      $stmt = $pdo->prepare("INSERT INTO posts (title, content, image) VALUES (:title, :content, :image)");
      $stmt->bindParam(":title", $title);
      $stmt->bindParam(":content", $content);
      $stmt->bindParam(":image", $image);
      $stmt->execute();
      header('Location: view-post.php');
    }else{
      $statusMsg = "Sorry, there was an error uploading your file.";
    }
  }else{
    $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
  }
}
?>
