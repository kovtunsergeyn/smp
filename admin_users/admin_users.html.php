<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Specialized medical services</title>
    <meta name="description" content="Blueprint: Vertical Icon Menu" />
    <meta name="keywords" content="Vertical Icon Menu, vertical menu, icons, menu, css" />
    <meta name="author" content="Codrops" />
    <link rel="stylesheet" type="text/css" href="../css/default.css" />
    <link rel="stylesheet" type="text/css" href="../css/component.css" />
    <script src="../js/modernizr.custom.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/uikit.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/uikit (1).css">

    <script type="text/javascript">
        document.onclick = function hideMessage () {
            document.getElementById('message').setAttribute('class', 'uk-hidden');
        };
    </script>

</head>

<body>
    <div class="container">
        <header class="clearfix">
            <span>SMP</span>
            <h1>Specialized medical services</h1>
            <form method="POST">
                <nav>
                    <a href="#" class="icon-arrow-left" data-info="previous">Previous</a>
                    <input type="button" name="modbutton" id="modbutoon" value="Exit" data-uk-modal="{target:'#mod'}" class="uk-button uk-button-link" style="margin-top: 3%;"/>

                    <div class="uk-modal" id="mod">
                        <div class="uk-modal-dialog">
                            <div class="uk-modal-header">Exit</div>
                            All unsaved data will be deleted! Are you sure you want to quit?
                            <div class="uk-modal-footer">
                                <input type="submit" name="exit" id="exit" value="Yes" class="uk-button uk-button-primary"/>
                            </div>
                        </div>
                    </div>
                </nav>
            </form>
        </header>
        <ul class="cbp-vimenu">
            <li>
                <a href="#" class="icon-logo">Logo</a>
            </li>
            <li>
                <a href="#" class="icon-archive">Archive</a>
            </li>
            <li>
                <a href="../check.php" class="icon-search">Search</a>
            </li>
            <li>
                <a href="#" class="icon-pencil">Pencil</a>
            </li>
            <li class="cbp-vicurrent">
                <a href="index.php" class="icon-download">Download</a>
            </li>
        </ul>

        <div class="main">

            <!--переключатель вкладок-->
            <ul class="uk-tab" data-uk-tab="{connect:'#my-id'}">
                <li><a href="">User list</a></li>
                <li><a href="">Active users</a></li>
                <li class="uk-disabled"><a href="">Other</a></li>
            </ul>

            <!--контейнер-->
            <ul id="my-id" class="uk-switcher uk-margin">
                <li>
                    <h3>List of registered users</h3>

                    <?php if (isset($pchange)) {
                        echo '<div id="message" style="margin-top: 2%; margin-left: 40%;" class="uk-alert-success uk-text-center uk-width-1-5
            uk-animation-slide-top">' . $pchange . '</div>' . '<br/>';
                    } ?>

                    <?php if (isset($change_login)) {
                        echo '<div id="message" style="margin-top: 2%; margin-left: 40%;" class="uk-alert-success uk-text-center uk-width-1-5
            uk-animation-slide-top">' . $change_login . '</div>' . '<br/>';
                    } ?>

                    <?php if (isset($log_error)) {
                        echo '<div id="message" style="margin-top: 2%; margin-left: 40%;" class="uk-alert-danger uk-text-center uk-width-1-5
            uk-animation-slide-top">' . $log_error . '</div>' . '<br/>';
                    } ?>


                    <?php foreach ($users as $user): ?>
                        <form action="index.php" method="POST" class="uk-form uk-panel-box uk-panel">
                            <i>Login:</i> <?php echo $user['login']?>
                            <i>Password:</i> <?php echo $user['password']?>
                            <i>ID:</i> <?php echo $user['id'] ?><br/><br/>

                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $user['id']; ?>">

                            <input type="text" placeholder="Change login" id="login_change" name="login_change">
                            <button type="submit" name="login" id="login" class="uk-button uk-button-primary uk-width-1-5">Change login</button><br/><br/>

                            <input type="text" placeholder="Change password" id="password_change" name="password_change">
                            <button type="submit" name="password" id="password" class="uk-button uk-button-primary uk-width-1-5">Change password</button><br/>
                        </form><br/>
                    <?php endforeach; ?>
                </li>

                <li>в разработке </li>
                <li>еще не придумал</li>
            </ul>

        </div>

    </div>
</body>
</html>