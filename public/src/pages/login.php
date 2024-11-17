<?php
session_start();
require'dataBase/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $dbcon->prepare("SELECT id, password, bg_color, font_color FROM usersData WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password, $bg_color, $font_color);

    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['bg_color'] = $bg_color;
        $_SESSION['font_color'] = $font_color;

        setcookie('user_id', $id, time() + (86400 * 30), "/");
        setcookie('bg_color', $bg_color, time() + (86400 * 30), "/");
        setcookie('font_color', $font_color, time() + (86400 * 30), "/");

        header("Location:index.php");
        exit();
    } else {
        echo "Неправильный логин или пароль!";
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset = "UTF-8">
        <link rel = "stylesheet" type = "text/css" href="styles/login.css">
    </head>
    <body>
        <div class = "mainContain">
            <h1>Registration</h1>
            <form action ="" method = "post" >
                <input type = "text" name = "username" placeholder="Enteryour name" required>
                <input type = "password" name = "password" placeholder="Enter your password" required>
                <button type = "submit" class = "registBut">Registration</button>
            </form>
        </div>
    </body> 
</html>