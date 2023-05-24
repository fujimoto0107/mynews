<!DOCTYPE html>
<html>
<head>
    <title>場所の名前</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <img src="photo3.jpg" alt="Photo 3" class="centered-image">

    <h1>この場所の名前を教えてください</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $name = $_POST['name'];
        $message = $_POST['message'];

        
        $file = 'guestbook.txt';
        $data = $name . ': ' . $message . "\n";
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

        
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    
    $file = 'guestbook.txt';
    $posts = [];

    if (file_exists($file)) {
        $guestbookData = file_get_contents($file);

        
        $posts = explode("\n", $guestbookData);

        $maxPosts = 5;
        if (count($posts) > $maxPosts) {
            $posts = array_slice($posts, -($maxPosts), $maxPosts, true);
            echo "<p>これ以上投稿できません。</p>";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
        $index = $_GET['delete'];
        if (isset($posts[$index])) {
            unset($posts[$index]);
            file_put_contents($file, implode("\n", $posts));
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">回答者:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="message">答え:</label>
        <textarea name="message" id="message" rows="4" required></textarea><br>

        <input type="submit" value="投稿">
    </form>

    <h2>投稿一覧</h2>

    <?php
    if (!empty($posts)) {
        foreach ($posts as $index => $post) {
            echo "<p>" . htmlspecialchars($post) . " <a href='" . $_SERVER['PHP_SELF'] . "?delete={$index}'>削除</a></p>";
        }
    } else {
        echo "<p>まだ投稿はありません。</p>";
    }
    ?>

</body>
</html>