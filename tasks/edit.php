<?php
require '../config/db.php';

if (!isset($_SESSION['user_id'])){
    header("Location: ../auth/login");
    exit;
}

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM tasks WHERE id = $id AND user_id" . $_SESSION['user_id']);
$data = $res->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $desc = $_POST['descripion'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    $stmt = $conn->prepare("UPDATE tasks SET title=?, description=?, is_active=? WHERE id=?");
    $stmt->bind_param("ssii", $title, $desc, $is_active, $id);
    $stmt->execute();
    header("Location: index.php");
}


?>



<form method="POST">
    Judul: <input type="text" name="title" value="<?= $data['title'] ?>"><br>
    Deskripsi: <textarea name="description"><?= $data['description'] ?></textarea><br>
    Aktif: <input type="checkbox" name="is_active" <?= $data['is_active'] ? 'checked' : '' ?>><br>
    <button type="submit">Update</button>
</form>