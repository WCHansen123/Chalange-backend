<?php
require 'models/todo_list.php';
require 'models/list_item.php';
require 'controllers/todoListController.php';
require "resources/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// collect value of input field
createList($name = $_POST['listName']);
exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Starter Template - Materialize</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="resources/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="resources/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="#">Navbar Link</a></li>
        </ul>

        <ul id="nav-mobile" class="sidenav">
            <li><a href="#">Navbar Link</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <div class="row">
            <form class="col s12" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">chrome_reader_mode</i>
                        <input id="icon_prefix" name="listName" type="text" class="validate">
                        <label for="icon_prefix">List name</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>







<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="resources/js/materialize.js"></script>
<script src="resources/js/init.js"></script>




<div class="sidenav-overlay"></div><div class="drag-target"></div></body>
</html>
