<?php
require 'dataBase/db.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST[$username];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $bg_color = $_POST['bg_color'] ?? '#ffffff';
    $font_color = $_POST['font_color'] ?? '#000000';

    $stmt = $dbcon->prepare("INSERT INTO usersData (username, password, bg_color, font_color) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss",$username ,$password, $bg_color ,$font_color );

    if ($stmt -> execute()) {
        echo "Регистрация прошла! <a href = 'login.php'> Войти </a>";
    } else { 
        echo "Ошибка при регистрации";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset = "UTF-8">
        <link rel = "stylesheet" type = "text/css" href="styles/login.css">
    </head>
    <body>
        <div class = "mainContain">
            <h1>Registration</h1>
            <form action ="register.php" method = "POST" >
                <input type = "text" name = "username" placeholder="Enteryour name" required>
                <input type = "password" name = "password" placeholder="Enter your password" required>
                <input type = "color" name = "bg_color" placeholder="Enter Background Color">
                <input type = "color" name = "font_color" placeholder="Enter font color">
                <button type = "submit" class = "registBut">Registration</button>
            </form>
        </div>
    </body> 
</html>