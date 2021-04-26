<?php
setlocale(LC_ALL, "fr_FR"); 
session_start();
require_once('tools.php');


if(isset($_GET['page'])){

    $page = $_GET['page'];

    switch ($page) {
        case 'posts' : 
            require_once('controllers/postListController.php');
            break;

        case 'post' : 
            require_once('controllers/postController.php');
            break;

        case 'user' : 
            require_once('controllers/userController.php');
            break;

        case 'contact' : 
            require_once('controllers/contactController.php');
            break;

        case 'bio' : 
            require_once('controllers/bioController.php');
            break;

        case '404' : 
            require_once('controllers/404Controller.php');
            break;

        default : 
            header('Location:index.php?page=404');
            exit;
    }
}
else{
    $page = 'index';
    require_once('controllers/indexController.php');
}

require_once('layouts/layout.php');

if(isset($_SESSION['message'])) {  
    unset($_SESSION['message']);
}


?> 




