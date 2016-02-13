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
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <script src="js/modernizr.custom.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/uikit.js"></script>
    <link rel="stylesheet" type="text/css" href="css/uikit (1).css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
        <li class="cbp-vicurrent">
            <a title="search" href="check.php" class="icon-search">Search</a>
        </li>
        <li>
            <a href="#" class="icon-pencil">Pencil</a>
        </li>
        <li>
            <a title="user administration" href="admin_users/index.php" class="icon-download">Administration</a>
        </li>
    </ul>

        <div class="main">
            <h2>Search</h2>
            <button type="submit" name="create_patien" class="uk-button uk-button-primary uk-button-small uk-align-right"><i class="uk-icon-plus-square"> Add patient</i></button>
        </div>

    </div>
</body>
</html>