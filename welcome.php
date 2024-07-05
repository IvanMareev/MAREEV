<?php
session_start();

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['username']) && !isset($_COOKIE['user'])) {
    header("Location: login.php");
    exit();
}

// Использование имени пользователя из cookie или сессии
$username = isset($_SESSION['username']) ? $_SESSION['username'] : $_COOKIE['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Добро пожаловать</title>
</head>
<body>
    <h1>Привет, <?php echo htmlspecialchars($username); ?>!</h1>
    <a href="logout.php">Выйти</a>
</body>
</html>
