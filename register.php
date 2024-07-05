<?php
$conn = new mysqli("db", "root", "password", "vulnerable_app");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($query) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<form method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Register">
</form>
