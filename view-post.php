<!DOCTYPE html>
<html>
<head>
    <title>View Post</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
    <?php
        // Connect to the database
        require_once('db.php');
        
        // Retrieve the post from the database based on the id parameter
        $id = $_GET['id'];
        $stmt = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $post = $stmt->fetch();
        
        if (!$post) {
            echo '<p>Post not found</p>';
        } else {
            echo '<h1>' . htmlspecialchars($post['title']) . '</h1>';
            echo '<p>By ' . htmlspecialchars($post['author']) . '</p>';
            echo '<p>' . htmlspecialchars($post['content']) . '</p>';
        }
    ?>
</div>

</body>
</html>
