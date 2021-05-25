<?php
setlocale(LC_ALL, "fr_FR");
session_start();


if(!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] == 0 ) {
  header('Location: ../index.php');
  exit;
}
require_once('../tools.php'); 
$db = dbConnect();


if(isset($_GET['page'])){

    $page = $_GET['page'];

    switch ($page) {

      case 'categories' : 
        require_once('controllers/categoriesController.php');
        break;
      case 'posts' : 
        require_once('controllers/postsController.php');
        break;      
      case 'users' : 
        require_once('controllers/usersController.php');
        break;
  
    }
}
else{
    $page = 'index';
    require_once('controllers/indexController.php');
}

require_once('layouts/admin.php');

if(isset($_SESSION['message'])) {  
    unset($_SESSION['message']);
}

if(isset($_SESSION['error'])) {  
  unset($_SESSION['error']);
}


?> 




