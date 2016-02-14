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
    <script src="js/components/datepicker.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.js"></script>

    <script type="text/javascript">
        jQuery(function($){
            $("#snils").mask("999-999-999 99", {placeholder:"___-___-___ __ "});
        });

        jQuery(function($){
            $("#patientName, #patientSecName, #patientLastName").mask("aaaaaaaaaaaaaaa");
        });

        jQuery(function($){
            $("#dateBirth").mask("99.99.9999");
        });
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
            <button type="submit" name="create_patien" class="uk-button uk-button-primary uk-button-small uk-align-right" data-uk-modal="{target:'#modPatient'}"><i class="uk-icon-plus-square"> Add patient</i></button>

            <table class="uk-table uk-table-hover uk-table-striped">
                <thead>
                <tr>
                    <th>ФИО</th>
                    <th>СНИЛС</th>
                    <th>Пол</th>
                    <th>Дата рождения</th>
                    <th>Карта лечения</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td>ФИО</td>
                    <td>СНИЛС</td>
                    <td>Пол</td>
                    <td>Дата рождения</td>
                    <td>Карта лечения</td>
                </tr>
                </tfoot>
                <tbody>
<!--                --><?php //foreach (): ?>
                    <form method="POST">
                        <tr>
                            <td>Иванов Иван Иванович</td>
                            <td>143-127-810 31</td>
                            <td>Муж</td>
                            <td>5.10.1991</td>
                            <td><button type="button" name="showCard" class="uk-button uk-button-primary uk-button-small">Show card</button></td>
                            <input type="hidden" id="user_id" name="user_id" value="">
                        </tr>
                    </form>
<!--                --><?php //endforeach; ?>
                </tbody>
            </table>

            <!--модальое окно добавления пациента-->

            <div class="uk-modal" id="modPatient">
                <div class="uk-modal-dialog">
                    <div class="uk-modal-header"><a href="" class="uk-icon-justify uk-icon-user-md"></a> Add patient</div>
                    <form method="POST" class="uk-form">
                        <div style="width: 60%;">

                            <label for="snils">SNILS*: </label>
                            <input type="text" name="snils" id="snils" placeholder="Enter a snils" class="uk-align-right"><br/><br/>

                            <label for="patientName">Name*: </label>
                            <input type="text" name="patientName" id="patientName" placeholder="Enter a name" class="uk-align-right"><br/><br/>

                            <label for="patientSecName">Second name*: </label>
                            <input type="text" name="patientSecName" id="patientSecName" placeholder="Enter a soname" class="uk-align-right"><br/><br/>

                            <label for="patientLastName">Last name*: </label>
                            <input type="text" name="patientLastName" id="patientLastName" placeholder="Enter a last name" class="uk-align-right"><br/><br/>

                            <label for="dateBirth">Date of birth*: </label>
                            <input type="text" name="dateBirth" id="dateBirth" data-uk-datepicker="{format:'DD.MM.YYYY', maxDate: 0}" placeholder="Birthday date" class="uk-align-right"><br/><br/>

                            <label for="sex">Sex*: </label>
                            <input type="radio" id="sex" name="sex" value="M">Male
                            <input type="radio" id="sex" name="sex" value="F">Female

                        </div>
                    </form>

                    <div class="uk-modal-footer">
                        <input type="submit" name="addPatient" id="addPatient" value="Add" class="uk-button uk-button-primary"/>
                        <input type="submit" name="cancelAdd" id="cancelAdd" value="Cancel" class="uk-button uk-button-primary"/>
                    </div>
                </div>

        </div>

    </div>
</body>
</html>