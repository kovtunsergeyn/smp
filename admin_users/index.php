<?php

//подключаемся к бд
include_once $_SERVER["DOCUMENT_ROOT"] . "/smp/" . 'dbconnect.php';
include_once $_SERVER["DOCUMENT_ROOT"] . "/smp/" . 'exit.php';

//выводим список имен пользователей

if ($_COOKIE['id'] == 33) {
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
} else {
    echo 'Извените, но у вас нет доступа! ';
    echo '<a href="../check.php">Назад</a>';
    exit();
}

//изменяем логин
if (isset($_POST['login'])) {

        //проверим есть ли пользователь с таким логином
        try {
            $SQL = ('SELECT user_login FROM users WHERE user_login=:login');
            $s = $pdo->prepare($SQL);
            $s->bindValue(':login', $_POST['login_change']);
            $s->execute();
        } catch (PDOException $error) {
            $err = 'Не удалось выполниь запрос поиска логина пользователя' . $error->getMessage();
            echo $err;
            exit();
        }

        $result = $s->fetch();
        //$result[0] - искомый логин пользователя

        if ($result) {
            $log_error = 'Пользователь с таким логином уже существует!';
        } else {
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

            $change_login = 'Логин успешно изменен!';

            //обновить страницу после апдейта таблицы
            header('Location: '.$_SERVER['PHP_SELF']);
        }
    }

//изменяем пароль
if (isset($_POST['password'])) {

    //шифруем введенный пароль двойным мд5 шифрованием
    $pass = md5(md5($_POST['password_change']));

    try {
    $SQL = 'UPDATE users SET user_password=:password WHERE user_id=:user_id';
    $s = $pdo->prepare($SQL);
    $s->bindValue(':password', $pass);
    $s->bindValue(':user_id', $_POST['user_id']);
    $s->execute();
    } catch (PDOException $error) {
        $err = 'Не удалось изменить пароль пользователя' . $error->getMessage();
        echo $err;
        exit();
    }

    $pchange = 'Пароль успешно изменен';

    //обновить страницу после апдейта таблицы
    Header('Location: '.$_SERVER['PHP_SELF']);
}



//выход
if (isset($_POST['exit'])) {
    theEnd();
}

include $_SERVER["DOCUMENT_ROOT"] . "/smp/" . "/admin_users/" . "admin_users.html.php";