<?php
require_once('db.php');

$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Posts</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h1>View Posts</h1>
    <div class="posts">
      <?php foreach($posts as $post): ?>
        <div class="post">
          <h2><?php echo $post['title']; ?></h2>
          <p><?php echo $post['content']; ?></p>
          <?php if($post['image']): ?>
            <img src="uploads/<?php echo $post['image']; ?>" alt="">
          <?php endif; ?>
          <p class="date"><?php echo $post['created_at']; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
    <a href="submit-post.php" class="button">Add New Post</a>
  </div>
</body>
</html>
