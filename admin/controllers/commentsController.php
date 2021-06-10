<?php

$action = $_GET['action'];

require_once('../models/Comment.php');
require_once('../models/Post.php');


if($action == 'list') {
  $comments = getAllComments();

  $view = 'views/commentsListView.php'; 
}



if($action == "delete") {
  deleteComment($_GET['id']);

    $_SESSION['message'] = "Suppression effectuée  !";
    header('Location: index.php?page=comments&action=list');
    exit;
}



?>