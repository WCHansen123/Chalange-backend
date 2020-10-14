<?php
require 'models/todo_list.php';
require 'models/list_item.php';
require 'controllers/todoListController.php';
require "resources/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// collect value of input field
    updateList($name = $_POST['name'], $id = $_POST['id']);
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
        <div class="col s5">
            <h3 class="header teal-text lighten-2">Update: <?php echo $_GET['name'] ?></h3>
        </div>
    <div class="input-field col s2 right">
        <a href="deleteList.php?id=<?php echo $_GET['id']?>">
        <button class="btn waves-effect waves-light delete" type="submit">Delete
            <i class="material-icons right">delete</i>
        </button>
        </a>
    </div>
    </div>
</div>

<div class="container">
    <a href="createListItem.php?name=<?php echo $_GET['name']?>&list_id=<?php echo $_GET['id'] ?>" class="btn-floating btn-large waves-effect waves-light teal lighten-2"><i class="material-icons">add</i></a>
    <ul class="collection with-header">
        <li class="collection-header row noMargin-bottom">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="input-field col s6">
                <i class="material-icons prefix teal-text lighten-2">chrome_reader_mode</i>
                <input id="icon_prefix" value="<?php echo $_GET['name'] ?>" name="name" type="text" class="validate">
                <input id="icon_prefix" value="<?php echo $_GET['id'] ?>" name="id" type="text" class="validate hide">
            </div>
            <div class="input-field col s6">
                <button class="btn waves-effect waves-light right" type="submit">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
            </form>
        </li>
<?php


foreach (getListItems($_GET) as $item)
{
    if ($item['list_id'] === $_GET['id'])
    {
        ?>
        <li class="collection-item">
            <div class="row">
                <div class="col s4 input-field">
                    <div><?php echo $item['content'] ?></div>
                </div>
                <div class="col s1">
                    <p>Datum:</p>
                </div>
                <div class="col s4">
                    <p><?php echo $item['date_time'] ?></p>
                </div>
                <a href="updateListItem.php?id=<?php echo $item['id']?>&name=<?php echo $_GET['name']?>" class="input-field secondary-content col s1"><i class="material-icons">edit</i></a>
                <a href="deleteListItem.php?id=<?php echo $item['id']?>&list_id=<?php echo $_GET['id'] ?>" class="input-field secondary-content col s1"><i class="material-icons">delete</i></a>
            </div>
        </li>

        <?php
    }
}
?>
</ul>
</div>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="resources/js/materialize.js"></script>
<script src="resources/js/init.js"></script>




<div class="sidenav-overlay"></div><div class="drag-target"></div></body>
</html>
