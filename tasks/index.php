<?php
require '../config/db.php';

if (!isset($_SESSION['user_id'])){
    header ("Location: ../auth/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM tasks WHERE user_id = $user_id");
$result->fetch_assoc();

?>

<a href="../auth/logout.php">Logout</a>
<a href="create.php">Tambah Task</a>

<h2>Task Saya</h2>

<?php foreach($result as $row): ?>
    <div>
        <strong><?= $row['title'] ?></strong>
        <?= $row['is_active'] ? '[AKTIF]' : '[NONAKTIF]' ?>
        <P><?= $row['description'] ?></P>
        <a href="edit.php?id=<?= $row['id'] ?>">edit</a>
        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('yakin nih mo diapus')">hapus</a>
    </div>
<?php endforeach; ?>