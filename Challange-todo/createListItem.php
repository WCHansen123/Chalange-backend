<?php
require 'models/todo_list.php';
require 'models/list_item.php';
require 'controllers/todoListController.php';
require "resources/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// collect value of input field
createListItem($content = $_POST['content'], $date_time = $_POST['date_time'], $list_id = $_POST['list_id']);
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
<nav class="red lighten-3" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Logo</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="#">Navbar Link</a></li>
        </ul>

        <ul id="nav-mobile" class="sidenav">
            <li><a href="#">Navbar Link</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col s12">
            <h3 class="header teal-text lighten-2">Create list item for: <?php echo $_GET['name'] ?></h3>
        </div>
    </div>
</div>

<div class="container">
    <a href="createListItem.php" class="btn-floating btn-large waves-effect waves-light teal lighten-2"><i class="material-icons">add</i></a>
    <ul class="collection with-header">
        <li class="collection-header row noMargin-bottom">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="input-field col s4">
                    <input id="icon_prefix" name="content" type="text" class="validate">
                    <label for="icon_prefix">content</label>
                </div>
                <div class="input-field col s3">
                    <input type="datetime-local" name="date_time">
                    <input type="text" class="hide" value="<?php echo $_GET['list_id'] ?>" name="list_id">
                </div>
                    <button class=" input-field btn waves-effect waves-light right" type="submit">Submit
                        <i class="material-icons right">send</i>
                    </button>
            </form>
        </li>
    </ul>
</div>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="resources/js/materialize.js"></script>
<script src="resources/js/init.js"></script>




<div class="sidenav-overlay"></div><div class="drag-target"></div></body>
</html>
