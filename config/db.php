<?php

$host = "localhost";
$db = "task_sb";
$user = "masdanz";
$pass = "masdanz";

$conn = new mysqli($host, $db, $user, $pass);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

session_start();

?>