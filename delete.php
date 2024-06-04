<?php

require_once('connection.php');

$id = $_POST['id'];

$stmtdelete = $pdo->prepare('UPDATE books SET is_deleted=1 WHERE id = :id');
$stmtdelete->execute(['id' => $id]);

header('Location: index.php');