<?php 
require '../config/db.php';

if(!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}

$id = $_GET['id'];
$userId = $_SESSION['user_id'];
$conn->query("SELECT FROM tasks WHERE id=$id AND user_id=$userId");
header("Location: index.php")
?>