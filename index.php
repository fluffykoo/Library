<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

// index.php
include 'view/layout/header.php';
require_once 'model/Book.php';
include 'controller/routes.php';
include 'view/layout/footer.php';



?>
