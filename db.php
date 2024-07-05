<?php 
$servername = "127.0.0.1";
$username = "dbuser";
$password = "password";
$dbName = "first";

// Connect to MySQL server
$link = mysqli_connect($servername, $username, $password);

// Check connection
if (!$link) {
    echo "<script>alert('Ошибка подключения: " . mysqli_connect_error() . "')</script>";
    die("Ошибка подключения: " . mysqli_connect_error());
} else {
    echo "<script>alert('Успешное подключение к серверу MySQL')</script>";
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if (!mysqli_query($link, $sql)) {
  echo '<script>alert( "Чет не то"mysqli_error($link)) </script>';
} else {
  echo '<script>alert( "Есть!"mysqli_error($link)) </script>';
}

// Connect to MySQL server and select database
$link = mysqli_connect($servername, $username, $password, $dbName);

// Check connection
if (!$link) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

// SQL to create users table
$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(20) NOT NULL
)";

// SQL to create posts table
$sql_posts = "CREATE TABLE IF NOT EXISTS posts (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    main_text VARCHAR(400) NOT NULL
)";

// Create users table
if (!mysqli_query($link, $sql_users)) {
    echo "Не удалось создать таблицу Users: " . mysqli_error($link);
}

// Create posts table
if (!mysqli_query($link, $sql_posts)) {
    echo "Не удалось создать таблицу Posts: " . mysqli_error($link);
}

mysqli_close($link);
?>