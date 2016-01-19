<?

// Скрипт проверки

//подключаемся к бд

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


if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

{

    $query = mysql_query("SELECT *,INET_NTOA(user_ip) FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");

    $userdata = mysql_fetch_assoc($query);


    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])
        or (($userdata['user_ip'] !== $_SERVER['REMOTE_ADDR'])  and ($userdata['user_ip'] !== "0")))

    {

        setcookie("id", "", time() - 3600*24*30*12, "/");

        setcookie("hash", "", time() - 3600*24*30*12, "/");

        print "Хм, что-то не получилось";

    }

    else

    {

        print "Привет, ".$userdata['user_login'].". Всё работает!";

    }

}

else

{

    print "Включите куки";

}

include "registration_page.html.php";