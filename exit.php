<?php
//функция выхода - устанавливает значения хэша пользователя в бд == 0
//сбрасывает куки
//TODO сброс кук не работает. Исправить

function theEnd() {

    include_once $_SERVER["DOCUMENT_ROOT"] . "/smp/" . "dbconnect.php";

    global $pdo;
    try {
    $SQL = 'UPDATE users SET user_hash=0 WHERE user_id=:user_id';
    $s = $pdo->prepare($SQL);
    $s->bindValue(':user_id', $_COOKIE['id']);
    $s->execute();
} catch (PDOException $connect_error) {
    $error = 'Не удалось выполнить запрос' . $connect_error->getMessage();
    exit();
}

setcookie("id", "", time() - 3600*24*30*12, "/");
setcookie("hash", "", time() - 3600*24*30*12, "/");

header('Location:'. "/smp/" . 'register.php');
include "registration_page.html.php";
}