<?php
// Страница регситрации нового пользователя

//подключаемся к бд
include_once $_SERVER["DOCUMENT_ROOT"] . "/smp/" . "dbconnect.php";

//чтобы не ругался при первом входе при отсутствии в куках id
setcookie("id", 0);

if (isset($_POST['submit'])) {

    $err = array();

    # проверям логин

    if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['newLogin'])) {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }


    if (strlen($_POST['newLogin']) < 3 or strlen($_POST['newLogin']) > 30) {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    # проверяем, не сущестует ли пользователя с таким именем

    try {
        $SQL = 'SELECT COUNT(user_id) FROM users WHERE user_login=:user_login';
        $s = $pdo->prepare($SQL);
        $s->bindValue(':user_login', $_POST['newLogin']);
        $s->execute();
    } catch (PDOException $connect_error) {
        $error = 'Не удалось выполнить запрос' . $connect_error->getMessage();
        exit();
    }

    $row = $s->fetch();
    $count = $row[0];

    if ($count > 0) {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    # Если нет ошибок, то добавляем в БД нового пользователя

    if (count($err) == 0) {
        //логин пользователя
        $login = $_POST['newLogin'];

        # Убераем лишние пробелы и делаем двойное шифрование
        $password = md5(md5(trim($_POST['newPassword'])));

        try {
            $SQL = 'INSERT INTO users SET user_login=:user_login, user_password=:user_password';
            $s = $pdo->prepare($SQL);
            $s->bindValue(':user_login', $login);
            $s->bindValue(':user_password', $password);
            $s->execute();
        }
        catch (PDOException $connect_error) {
            $error = 'Не удалось зарегегстрировать пользователя' . $connect_error->getMessage();
            exit();
        }

        $user_register = 'Пользователь зарегестрирован!';

    } //else {
        //include "admin_users.html.php";
    //}
}

//аутентификация пользователя

//Функция для генерации случайной строки

function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {

        $code .= $chars[mt_rand(0,$clen)];
    }

    return $code;

}

if (isset($_POST['submit_auth'])) {

    # Вытаскиваем из БД запись, у которой логин равняеться введенному

    try {
        $SQL = 'SELECT user_id, user_password FROM users WHERE user_login=:user_login';
        $s = $pdo->prepare($SQL);
        $s->bindValue(':user_login', $_POST['input_login']);
        $s->execute();
    } catch (PDOException $connect_error) {
        $error = 'Не удалось выполнить запрос' . $connect_error->getMessage();
        //include "output.heml.php";
        exit();
    }
    $result = $s->fetch();

    //print $result[0]; - id пользователя
    //print $result[1]; - password пользователя

    # Сроавниваем пароли

    if($result[1] === md5(md5($_POST['input_pwd'])))

    {
        # Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));  //можно заменить на md5(rand(10,10)); нафиг там функция generateCode() не понял

        # Записываем в БД новый хеш авторизации
    try {
        $SQL = 'UPDATE users SET user_hash=:user_hash WHERE user_id=:user_id';
        $s = $pdo->prepare($SQL);
        $s->bindValue(':user_hash', $hash);
        $s->bindValue(':user_id', $result[0]);
        $s->execute();
    } catch (PDOException $connect_error) {
        $error = 'Не удалось выполнить запрос' . $connect_error->getMessage();
        //include "output.heml.php";
        exit();
    }

        # Ставим куки
        setcookie("id", $result[0], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30);

        # Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: check.php");
        exit();
    }
    else {
        $message = 'Вы ввели не правильный логин/пароль!';
    }
}

//если есть хэш отличный от 0 реиректит на страницу поиска (стратовая страница)
function redirect() {

    include 'dbconnect.php';

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

    if ($result[0] != 0) {
        header('Location:check.php');
    }
}

redirect();
include "registration_page.html.php";