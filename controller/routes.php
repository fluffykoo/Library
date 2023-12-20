
<?php
// routes.php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page == 'home') {
    require_once 'view/home.php';
} elseif ($page == 'login') {
    require_once 'view/login.php';
    // Ajoutez d'autres pages au besoin
} elseif ($page == 'catalogue') {
    require_once 'view/catalogue.php';
} elseif ($page == 'fantasy') {
    include 'view/fantasy.php';
}elseif ($page == 'romance') {
    include 'view/romance.php';
}elseif ($page == 'theatre') {
    include 'view/theatre.php';
}elseif ($page == 'emprunter') {
    include 'view/emprunter.php';
}else {
    echo 'Page not found!';
}
?>
