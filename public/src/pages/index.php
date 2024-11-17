<?php 
require 'vendor/autoload.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['bg_color']) && isset($_COOKIE['font_color'])) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['bg_color'] = $_COOKIE['bg_color'];
        $_SESSION['font_color'] = $_COOKIE['font_color'];
    } else {
        header("Location: src/pages/register.php");
        exit();
    }
}

$bgColor = isset($_SESSION['bg_color']) ? $_SESSION['bg_color'] : '0040a1';
$fontColor = isset($_SESSION['font_color']) ? $_SESSION['font_color'] : '000000';
?>


<!DOCTYPE html>
<html>
    <head>
        <title> lab3PHP </title>
        <style>
            body { 
                background-color: <? echo htmlspecialchars($bgColor) ?>;
                color: <? echo htmlspecialchars($fontColor) ?>
            }
        </style>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Сюда попадете после того, как пройдете регистрацию или войдете в аккаунт.</h1>
    </body>
</html>