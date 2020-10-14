
<?php
require 'models/todo_list.php';
require 'models/list_item.php';
require 'controllers/todoListController.php';
require "resources/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// collect value of input field
    updateListitem($content = $_POST['content'], $dateTime = $_POST['dateTime'] , $id = $_POST['id']);
}

$item =  getListItem($id = $_GET['id']);
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
        <div class="col s8">
            <h3 class="header teal-text lighten-2">Update: List item in <?php echo $_GET['name'] ?></h3>
        </div>
    </div>
    <ul class="collection with-header">
        <li class="collection-item">
            <h4><?php echo $_GET['name'] ?></h4>
        </li>
        <li class="collection-item">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="row">
                <div class="col s4">
                    <p>Content:</p>
                    <input type="text" class="input-field" value="<?php echo $item['content'] ?>" name="content">
                </div>
                <div class="col s4">
                    <p>Datum:</p>
                    <input type="datetime-local" class="input-field" value="<?php echo $item['content'] ?>" name="dateTime">
                </div>
                <div class="col s3 offset-s1">
                    <p>options:</p>
                    <button class="btn waves-effect waves-light" type="submit">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
                <input id="icon_prefix" value="<?php echo $_GET['id'] ?>" name="id" type="text" class="validate hide">
            </div>
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