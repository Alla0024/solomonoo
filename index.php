<?php
session_start();

require_once("config/db.php");
require_once("models/product.php");
require_once("models/category.php");
require_once("models/task.php");
require_once("layout/header.php");
require_once("layout/menu.php");
require_once("layout/side.php");
if (isset($_GET["action"]) && file_exists("views/" . $_GET['action'] . ".php")) {
    require_once("views/" . $_GET['action'] . ".php");
} else {
    require_once("views/main.php");
}
require_once("views/modal.php");
require_once("layout/footer.php");
