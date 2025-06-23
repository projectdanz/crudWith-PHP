<?php
require '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    
    $result  = $stmt->get_result()->fetch_assoc();

    if ($result && password_verify($password, $result['password'])) {
        $_SESSION['user_id'] = $result['id'];
        header("Location: ../tasks/index.php");
    } else {
        echo "Login gagal";
    }
}
?>

<form method="POST">
    Username: <input type="text" name="username"><br>
    Username: <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>