<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Вывод сообщений</title>
</head>
    <body>

        <?php if (isset($error)){
            echo  '<div style="margin-top: 2%; margin-left: 40%" class="uk-alert-success uk-text-center uk-width-1-5
            uk-animation-slide-top">' . $error .
                '</div>';
        } ?>

        <?php if (isset($err)) {
            foreach ($err as $registration_error) {
                echo  '<div style="margin-top: 2%; margin-left: 40%" class="uk-alert-danger uk-text-center uk-width-1-5
            uk-animation-slide-top">' . $registration_error .
                    '</div>';
            }
        } ?>

        <?php if (isset($message)){
            echo  '<div style="margin-top: 2%; margin-left: 40%" class="uk-alert-danger uk-text-center uk-width-1-5
            uk-animation-slide-top">' . $message .
                '</div>';
        } ?>

        <?php if (isset($user_register)){
            echo  '<div style="margin-top: 2%; margin-left: 40%" class="uk-alert-danger uk-text-center uk-width-1-5
            uk-animation-slide-top">' . $user_register .
                '</div>';
        }?>

    </body>
</html>