<?php
session_start();

if (!isset($_SESSION['username']) && !isset($_COOKIE['user'])) {
    header("Location: login.php");
    exit();
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : $_COOKIE['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Добро пожаловать</title>
</head>
<body>
    <h1>Привет, <?php echo htmlspecialchars($username); ?>!</h1>
</body>
</html>
