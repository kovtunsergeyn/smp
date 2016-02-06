<?php
// Скрипт проверки

//подключаемся к бд
$dsn = 'mysql:dbname=db02;host=localhost';
$db_user= 'dbuser';
$db_password = '1234';

try {
    $pdo = new PDO($dsn, $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
} catch (PDOException $connect_error) {
    $error = 'Не удалось подключится с серверу баз данных!' .$connect_error->getMessage();
    include 'output.html.php';
    exit();
}

if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {

    try {
        $SQL = 'SELECT user_hash from users WHERE user_id=:user_id';
        $s = $pdo->prepare($SQL);
        $s->bindValue(':user_id', $_COOKIE['id']);
        $s->execute();
    } catch (PDOexeption $connect_error) {
        $error = 'Не удалось выполнить запрос' . $connect_error->getMessage();
        exit();
    }

    $result = $s->fetch();
    //$result[0] - хэш пользователя с идентификаторром который записан в куках

    if($_COOKIE['hash'] != $result[0])

    {
        setcookie("id", "", time() - 3600*24*30*12, "/");

        setcookie("hash", "", time() - 3600*24*30*12, "/");

        $message = 'Что-то пошло не так';
        header('Location:register.php');
        include 'register.php';
    }
    else
    {
        $error = "Привет! Все работает!";
    }
}

else

{
    $message = 'Включите куки';
    header('Location:register.php');
}

include "search_page.html.php";

if (isset($_POST['exit'])) {
    header('Location: exit.php');
}