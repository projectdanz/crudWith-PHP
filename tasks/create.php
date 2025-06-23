<?php
require '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $is_active = isset($_POST["is_active"]) ? 1 : 0;
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO tasks (user_id, title, description, is_active) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $user_id, $title, $desc, $is_active);
    $stmt->execute();


    header("Location: index.php");
}


?>

<form method="POST">
    Judul: <input type="text" name="title"><br>
    Deskripsi: <textarea name="description"></textarea><br>
    Aktif: <input type="checkbox" name="is_active" checked><br>
    <button type="submit">Tambah</button>
</form>