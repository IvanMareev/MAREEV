<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = file('users.txt', FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($stored_username, $stored_password) = explode(':', $user);
        if ($username === $stored_username && $password === $stored_password) {
            $_SESSION['username'] = $username;
            setcookie("user", $username, time() + (86400 * 30), "/"); // Cookie на 30 дней
            header("Location: welcome.php");
            exit();
        }
    }
    echo "Неверное имя пользователя или пароль!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>
</head>
<body>
    <h1>Авторизация</h1>
    <form method="POST" action="login.php">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Войти</button>
    </form>
</body>
</html>
