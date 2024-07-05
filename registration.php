<!DOCTYPE html>
	<html lang="ru">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Мареев ИС</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXXSR1GASXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" /> <link rel="stylesheet" href="./style.css">
		</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>Регистрация</h1>
				</div>
			</div>
		<div class="row">
			<div class="col-12">
				<form method="POST" action="registration.php">
					<div class="row form__reg"><input class="form" type="email" name="email" placeholder="Email"></div>
					<div class="row form___reg"><input class="form" type="text" name="login" placeholder="Login"></div>
					<div class="row form___reg"><input class="form" type="password" name="password" placeholder="Password"></div> 
					<button type="submit" class="btn_red btn_reg" name="submit">Пpодолжить</button>
				</form>
			</div>
		</div>
		</div>
	</body>
	</html>
	<?php
require_once('db.php'); // Make sure this file correctly includes the database connection parameters

// Connect to the database
$link = mysqli_connect('127.0.0.1', 'dbuser', 'password', 'first');

// Check connection
if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $password = $_POST['password'];

    // Validate inputs
    if (!$email || !$username || !$password) {
        die('Пожалуйста введите все значения!');
    }

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO users (email, username, pass) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sss", $email, $username, $password);

    // Execute statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Пользователь успешно добавлен!";
    } else {
        echo "Ошибка при добавлении пользователя: " . mysqli_error($link);
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($link);
?>

