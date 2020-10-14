<?php
require 'controllers/todoListController.php';
require "resources/database.php";


deleteListItem($id = $_GET['id']);
header("Location: index.php");