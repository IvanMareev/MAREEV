<?php
session_start();
$conn = new mysqli("db", "root", "password", "vulnerable_app");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        header("Location: welcome.php");
    } else {
        echo "Invalid credentials";
    }
}
?>

<form method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
