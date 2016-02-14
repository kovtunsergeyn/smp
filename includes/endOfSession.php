<?php

 function endOfSession () {
     include_once $_SERVER["DOCUMENT_ROOT"] . "/smp/" . "dbconnect.php";
     global $pdo;

     try {
         $SQL = 'UPDATE users SET user_hash=0 WHERE user_id=:user_id';
         $s = $pdo->prepare($SQL);
         $s->bindValue(':user_id', $_POST['user_id']);
         $s->execute();
     } catch (PDOException $error) {
         $error = 'Не удалось сбросить сессию' . $error->getMessage();
         exit();
     }

         setcookie("id", "", time() - 3600*24*30*12, "/");

         setcookie("hash", "", time() - 3600*24*30*12, "/");

         header('Location: ../register.php');

         include '../register.php';
 }