<?php

//подключаемся к бд
include_once $_SERVER["DOCUMENT_ROOT"] . "/smp/" . "dbconnect.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/smp/" . 'exit.php';

//выводим список имен пользователей
    try {
        $result = $pdo->query('SELECT user_login, user_password, user_id FROM users');
    } catch(PDOException $error) {
        $err = "Не удалось выгрузить список пользователей" . $error->getMessage();
        echo $err;
        exit();
    }

    foreach ($result as $row) {
        $users[] = array('login'=>$row['user_login'], 'password'=>$row['user_password'], 'id'=>$row['user_id']);
    }

//изменяем логин
if (isset($_POST['login_change'])) {

    try {
        $SQL = 'UPDATE users SET user_login=:login WHERE user_id=:user_id';
        $s = $pdo->prepare($SQL);
        $s->bindValue(':login', $_POST['login_change']);
        $s->bindValue(':user_id', $_POST['user_id']);
        $s->execute();
    } catch(PDOException $error) {
        $err = "Не удалось изменить логин пользователя" . $error->getMessage();
        echo $err;
        exit();
    }

    $log_succes = 'Логин пользователя успешно изменен!';
}

include $_SERVER["DOCUMENT_ROOT"] . "/smp/" . "/admin_users/" . "admin_users.html.php";

if (isset($_POST['exit'])) {
    header('Location: exit.php');
}