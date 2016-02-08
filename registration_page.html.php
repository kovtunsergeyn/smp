<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP register page</title>
    <meta name="description" content="Blueprint: Vertical Icon Menu" />
    <meta name="keywords" content="Vertical Icon Menu, vertical menu, icons, menu, css" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <script src="js/modernizr.custom.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/uikit.js"></script>
    <link rel="stylesheet" type="text/css" href="css/uikit (1).css">

    <script type="text/javascript">

        //Провера пусто ли поле. Нужно заменить на нормальную
        function validateNonEmpty() {
            if (document.getElementById('input_login').value == 0) {
                document.getElementById('input_login').setAttribute('class', 'uk-align-right uk-form-danger');
                document.getElementById('badLogin').setAttribute('class', 'uk-icon-warning');
            }
            else if (document.getElementById('input_pwd').value == 0) {
                document.getElementById('input_pwd').setAttribute('class', 'uk-align-right uk-form-danger');
                document.getElementById('badPwd').setAttribute('class', 'uk-icon-warning');
            }
            else {
                document.getElementById('input_login').setAttribute('class', 'uk-align-right');
                document.getElementById('badLogin').setAttribute('class', '');
                document.getElementById('input_pwd').setAttribute('class', 'uk-align-right');
                document.getElementById('badPwd').setAttribute('class', '');
            }
        }

        //Счетчик кликов на чекбокс. Если нечетные - блок разворачивается, если четные - скрывается
        var clickCount = 0;
        function showElem(count1) {

            clickCount += count1;

            if (clickCount % 2) {
                document.getElementById('toggle1').setAttribute('class', 'uk-container-center uk-panel-box uk-animation-slide-left');
                document.getElementById('toggle1').setAttribute('style', 'width: 350px; margin-top: 20px;');
            }
            else {
                document.getElementById('toggle1').setAttribute('class','uk-animation-slide-right');
                setTimeout(function timeToHidden() {document.getElementById('toggle1').setAttribute('class','uk-hidden')}, 200	);
            }

            console.log(clickCount);
        }

        //Проверяет соответствие введенных паролей на форме, ровны ли они
        function pwd() {

            var firstPwd = document.getElementById("newPassword").value;
            var secondPwd = document.getElementById("newPassword2").value;

            if (firstPwd !== secondPwd || (firstPwd == '' && secondPwd == '')) {
                document.getElementById('pwdNotMach').innerHTML = "<br/>Passwords not mach!";
                document.getElementById('submit').setAttribute('disabled', 'disabled');
            }

            else {
                document.getElementById('pwdNotMach').innerHTML = "";
                document.getElementById('submit').removeAttribute('disabled');
            }
        }

        //проверим введено ли что-то в поле логина

        function login () {
            var user_login = document.getElementById('newLogin').value;
            var firstPwd = document.getElementById("newPassword").value;
            var secondPwd = document.getElementById("newPassword2").value;

            if (user_login == ''|| firstPwd !== secondPwd || (firstPwd == '' && secondPwd == '')) {
                document.getElementById('loginNotMach').innerHTML = "<br/>Login is empty";
                document.getElementById('submit').setAttribute('disabled', 'disabled');
            } else {
                document.getElementById('loginNotMach').innerHTML = "";
                document.getElementById('submit').removeAttribute('disabled');
            }
        }

    </script>
</head>

<body>
<div class="container">
    <header class="clearfix">
        <span>SMP</span>
        <h1>Specialized medical services</h1>
    </header>
    <ul class="cbp-vimenu">
        <li>
            <a href="#" class="icon-logo">Logo</a>
        </li>
    </ul>
    <div class="main">
        <h2>Home registration</h2>

        <form class="uk-form uk-panel-box uk-panel uk-container-center" style="width: 350px; margin-top: 5%" method="POST">

            <h1 class="uk-text-large">Please enter information to continue</h1>

            <label for="input_login">
                Enter a login:
                <a href="#" id="badLogin" style="margin-left: 50px; color: red;"></a>
                <input type="text" placeholder="Enter a login" id="input_login" name="input_login" class="uk-align-right"
                       onblur="validateNonEmpty()">
                <br/>
                <br/>
            </label>

            <label for="input_pwd">
                Enter a password:
                <a href="#" id="badPwd" style="margin-left: 20px; color: red;"></a>
                <input type="password" placeholder="Enter a password" id="input_pwd" name="input_pwd" class="uk-form-password
        uk-align-right" onblur="validateNonEmpty()">
                <br/>
            </label>

            <br/>
            <a href="" class="uk-link uk-link-muted uk-float-right" id="forgot_pwd">Forgot password?</a>
            Не прикреплять к IP
            <input type="checkbox" name="not_attach_ip">
            <br/>
            <br/>
            <button type="submit" name="submit_auth" id="submit_auth" class="uk-button uk-button-primary uk-width-1-4">Log in</button>

            <div class="uk-align-right">
                <input type="checkbox" class="" onclick="showElem(1);">&nbsp;&nbsp;Want to register</div>
        </form>

        <div id="toggle1" class="uk-hidden">
            <form class="uk-form" method="POST" action="?register">
                <h3>Please register</h3>
                <label for="newLogin">
                    Enter login*:
                    <span id="loginNotMach" style="color: red;"></span>
                    <input type="text" id="newLogin" name="newLogin" placeholder="Enter a login" class="uk-align-right"
                           onblur="login()">
                    <br/>
                    <br/>
                </label>

                <label for="newPassword">
                    Enter password*:
                    <span id="pwdNotMach" style="color: red;"></span>
                    <input type="password" id="newPassword" name="newPassword" placeholder="Enter a password" class="uk-align-right"
                           onblur="pwd();">
                    <br/>
                    <br/>
                </label>

                <label for="newPassword2">
                    Confirm the password*:
                    <input type="password" id="newPassword2" placeholder="Confirm the password" class="uk-align-right" onblur="pwd();">
                    <br/>
                    <br/>
                </label>

                <button type="submit" name="submit" id="submit" class="uk-button uk-button-primary">Register</button>
            </form>

        </div>

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

    </div>
</div>
</body>
</html>