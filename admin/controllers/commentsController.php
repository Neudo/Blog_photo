<?php

$action = $_GET['action'];

require_once('../models/Comment.php');

if($action == 'list') {
  $comments = getAllComments();
  $view = 'views/commentsListView.php'; 
}



if($action == "delete") {
  deleteComment($_GET['id']);

    $_SESSION['message'] = "Suppression effectuée  !";
    header('Location: index.php?page=posts&action=list');
    exit;
}



?>