<?php

require_once('connection.php');

echo '<ul>';

$stmt = $pdo->prepare('SELECT * FROM books WHERE is_deleted = 0 OR is_deleted IS NULL');
$stmt->execute();

echo '<ul>';
while ($row = $stmt->fetch()) {
    echo '<li><a href="book.php?id=' . $row['id'] . '">' . $row['title'] . '</li>';
}
echo '</ul>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <nav style="display: flex; justify-content: space-between;">
        <a href="add_author.php">Lisa autor</a>

        <form action="index.php" method="get">
            <input type="text" name="q" placeholder="Otsing">
            <input type="submit" value="Otsi">
        </form>
    </nav>

    <main>
        <ul>
        <?php while ($book = $stmt->fetch()) { ?>
            <li>
                <a href="book.php?id=<?=$book['id'];?>"><?=$book['title'];?></a>
            </li>
        <?php } ?>
        </ul>
        
    </main>

</body>
</html>

