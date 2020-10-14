<?php
require 'models/todo_list.php';
require 'models/list_item.php';
require 'controllers/todoListController.php';
require "resources/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // collect value of input field
    changeStatus($id = $_POST['id']);
}

$items = getListItems($_GET);
$lists = getAllList();
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
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Todo-challange</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="#">Navbar Link</a></li>
        </ul>

        <ul id="nav-mobile" class="sidenav">
            <li><a href="#">Navbar Link</a></li>
        </ul>
        <a href="" data-target="nav-mobile" class="sidenav-trigger hide"><i class="material-icons">menu</i></a>
    </div>
</nav>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <a href="createList.php" class="btn-floating btn-large waves-effect waves-light teal lighten-2"><i class="material-icons">add</i></a>
        <!-- Dropdown Trigger -->
        <a class='dropdown-trigger btn right' href='#' data-target='dropdown1'>Sorteer!</a>

        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="index.php">Home</a></li>
            <li class="divider" tabindex="-1"></li>
            <li><a>Status</a></li>
            <li><a href="index.php?status=1"><i class="material-icons">done</i></a></li>
            <li><a href="index.php?status=0"><i class="material-icons">clear</i></a></li>
            <li class="divider" tabindex="-1"></li>
            <li><a href="index.php?date=ASC"><i class="material-icons">arrow_upward</i>ASC</a></li>
            <li><a href="index.php?date=DESC"><i class="material-icons">arrow_downward</i>DEC</a></li>
        </ul>
        <?php
        foreach ($lists as $list)
        {
            ?>
            <ul class="collection with-header">
                <li class="collection-header">
                    <h4><?php echo $list['name'] ?>
                        <a href="updateList.php?id=<?php echo $list['id'] ?>&name=<?php echo $list['name'] ?>" class="secondary-content">
                            <i class="material-icons">adjust</i>
                        </a>
                    </h4>
                </li>
                <?php
                foreach ($items as $item)
                {
                    if ($item['list_id'] === $list['id'])
                    {
                        ?>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s4">
                                    <p><?php echo $item['content'] ?></p>
                                </div>
                                <div class="col s4">
                                <p>Datum:</p>
                                </div>
                            </div>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="row">
                                <?php
                                if ($item['status'] == 0)
                                {
                                    ?>
                                    <p class="col s4">
                                        <label>
                                            <input onchange="this.form.submit()" type="checkbox" />
                                            <span>Status</span>
                                        </label>
                                    </p>
                                    <input type="text" class="filled-in hide" value="<?php echo $item['id'] ?>" name="id">

                                    <p class="col s4"><?php echo $item['date_time'] ?></p>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <p class="col s4">
                                        <label>
                                            <input onchange="this.form.submit()" checked type="checkbox" />
                                            <span>Status</span>
                                        </label>
                                    </p>
                                    <input type="text" class="filled-in hide" value="<?php echo $item['id'] ?>" name="id">
                                    <p class="col s4"><?php echo $item['date_time'] ?></p>
                                    <?php
                                }
                                ?>

                            </form>
                        </li>

                        <?php
                    }
                }
                ?>
            </ul>
            <?php
        }
        ?>

    </div>
</div>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="resources/js/materialize.js"></script>
<script src="resources/js/init.js"></script>
<script src="resources/js/main.js"></script>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
</body>
</html>
