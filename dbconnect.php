<?php
//Подключение к базе данных

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