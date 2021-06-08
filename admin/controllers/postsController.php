<?php

$action = $_GET['action'];
$errors = [];


require_once('../models/Category.php');
require_once('../models/Post.php');

$categories = getAllCategories();




if($action == 'list') {
  $posts = getAllPosts();
  $view = 'views/postsListView.php'; 
}

if($action == 'new') {
  
  if(!empty($_POST)){
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $image = $_FILES['image'];

    if(empty($title)) {
      $errors[] = "Merci de donner un titre !";
    }
    if(empty($summary)) {
      $errors[] = "Merci de donner un résumé !";
    }
    if(empty($content)) {
      $errors[] = "Merci d'inserer un contenu !";
    }
    if(isset($_POST['category_id'] )) {
      $submittedCategory = $_POST['category_id'];
    }

    if(empty($image['tmp_name'])) {
      $errors[] = "Merci d'ajouter une image !";
    }
    else {
      $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
      $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

      if(in_array($extension, $allowedExtensions)) {
         
        if($image['size'] > 2000000) { 
          $errors[] = "votre fichier est trop lourd...";
        }
        $fileName = time(). '.' . $extension; // renomage de l'extension
        move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/posts . $fileName');
      }
      else {
        $errors[] = "Votre fichier n'est pas d'un format autorisé ...";
      }
    }

    if(empty($errors)) {
      $result = addPost($title, $summary, $content, $fileName);

      if($result) {
        $_SESSION['message'] = "Votre nouvel article à bien été publié !";
        header('Location: index.php?page=posts&action=list');
        exit;
      }
      else {
        $_SESSION['error'] = "Impossible de publier ...";
        header('Location: index.php?page=posts&action=list');
        exit;
      }
    }
  }
  $view = 'views/postFormView.php'; 
}

if($action == "delete") {
  deletePost($_GET['id']);

    $_SESSION['message'] = "Suppression effectuée  !";
    header('Location: index.php?page=comments&action=list');
    exit;
}

if($action == "edit") {

  if(!empty($_POST)) {
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $image = $_FILES['image'];

    if(empty($title)) {
      $errors[] = 'Le titre est obligatoire !';
    }
    if(empty($summary)) {
      $errors[] = 'Le résumé est obligatoire !';
    }
    if(empty($content)) {
      $errors[] = 'Le contenue est obligatoire !';
    }
    if(!empty($image['tmp_name'])) {
      $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
      $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
  
      if(in_array($extension, $allowedExtensions)) { 
        if($image['size'] > 2000000) {
          $errors[] = "votre fichier est trop lourd...";
        }
      else {
        $newFileName = time() . '.' . $extension;
        move_uploaded_file($image['tmp_name'], '../assets/img/posts/'. $newFileName);
       }
      }
      else {
        $errors[] = "Votre fichier n'est pas d'un format autorisé ...";
      }
    }

    if(empty($errors))  {

      if(isset($newFileName)) {

        $postId = $_GET['id'];
        $selectedPost = getPost($postId);
        unlink('../assets/img/posts/' . $selectedPost['img']);

        $updateResult = updatePost($_GET['id'], $_POST, $newFileName);
      }
      else {
        $updateResult = updatePost($_GET['id'], $_POST);
      }

      if($updateResult == true) {
        $_SESSION['message'] = 'Article bien mise à jour !';
        header('Location: index.php?page=posts&action=list');
        exit;
      }
      else {
        $_SESSION['error'] = "Impossible d'enregristrer la modification de l'article ...";
        header('Location: index.php?page=posts&action=list');
      }
    }
  }

  $postId = $_GET['id'];
  $selectedPost = getPost($postId);
  $view = 'views/postFormView.php';
}


?>