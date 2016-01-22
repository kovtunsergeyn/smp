<?php
/**
 * Created by JetBrains PhpStorm.
 * User: skovtun
 * Date: 22.01.16
 * Time: 18:56
 * To change this template use File | Settings | File Templates.
 */
//Подключение к базе данных

$dsn = 'mysql:dbname=db02;host=localhost';
$db_user= 'db02user';
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