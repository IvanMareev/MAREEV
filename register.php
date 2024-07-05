<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    file_put_contents('users.txt', $username . ':' . $password . PHP_EOL, FILE_APPEND);

    echo "Регистрация прошла успешно!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
    <h1>Регистрация</h1>
    <form method="POST" action="register.php">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Зарегистрироваться</button>
    </form>
</body>
</html>
