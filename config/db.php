<?php

$host = "127.0.0.1";
$user = "masdanz";
$pass = "masdanz";
$db = "task_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

session_start();

?>