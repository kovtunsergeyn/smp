<?php

 function endOfSession () {
     include_once $_SERVER["DOCUMENT_ROOT"] . "/smp/" . "dbconnect.php";
     global $pdo;

     try {
         $SQL = 'SELECT user_hash from users WHERE user_id=:user_id';
         $s = $pdo->prepare($SQL);
         $s->bindValue(':user_id', $_COOKIE['id']);
         $s->execute();
     } catch (PDOException $connect_error) {
         $error = 'Не удалось выполнить запрос' . $connect_error->getMessage();
         exit();
     }

     $result = $s->fetch();
     //$result[0] - хэш пользователя с идентификаторром который записан в куках

     if($_COOKIE['hash'] !== $result[0]) {

         setcookie("id", "", time() - 3600*24*30*12, "/");

         setcookie("hash", "", time() - 3600*24*30*12, "/");

         $message = 'Что-то пошло не так';
         header('Location: ../register.php');

         include '../register.php';
     }
 }