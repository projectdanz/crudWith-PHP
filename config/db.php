<?php

$host = "localhost";
$user = "masdanz";
$pass = "masdanz";
$db = "task_sb";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

session_start();

?>