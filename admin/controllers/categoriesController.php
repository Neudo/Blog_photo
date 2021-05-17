<?php

$action = $_GET['action'];
$errors = [];

require_once('../models/Category.php');

if($action == 'list') {
  $categories = getAllCategories();
  $view = 'views/categoriesListView.php';
}

if($action == 'new') {

  if(!empty($_POST)){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    if(empty($name)) { // erreur nom
      $errors[] = "Merci de donner un nom !";
    }
    if(empty($description)) { // erreur desc
      $errors[] = "Merci de donner une description !";
    }
    if(empty($image['tmp_name'])){ //erreur pour l'image si pas ajoutée
      $errors[] = "Merci d'ajouter une image !";
    }
    else {
      $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
      $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

      if(in_array($extension, $allowedExtensions)) { //verif de l'extension
        if($image['size'] > 2000000) {  // verif du poids
          $errors[] = "votre fichier est trop lourd...";
        }

      else {
        $newFileName = time() . '.' . $extension;
        move_uploaded_file($image['tmp_name'], '../assets/img/categories/'. $newFileName);
       }
      }
      else {
        $errors[] = "Votre fichier n'est pas d'un format autorisé ...";
      }
    }

    if(empty($errors)) {
      $result = addCategory($name, $description, $image);

      if($result){
        $_SESSION['message'] = "Catégorie bien enregistrée !";
        header('Location: index.php?page=categories&action=list');
        exit;
      }
      else {
        $_SESSION['error'] = "Impossible d'enregistrer la catégorie...";
        header('Location: index.php?page=categories&action=list');
        exit;
      }
    }
  }
  $view = 'views/categoryFormView.php'; 
}

if($action == "delete") {

  $category = getCategory($_GET['id']);
  unlink('../assets/img/categories/' . $category['img']);
  deleteCategory($_GET['id']);

    $_SESSION['message'] = "Suppression effectuée  !";
    header('Location: index.php?page=categories&action=list');
    exit;
}

if($action == "edit") {

  if(!empty($_POST)) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image'];


    if(empty($name)) {
      $errors[] = 'Le nom est obligatoire.';
    }
    if(empty($description)) {
      $errors[] = 'La description est obligatoire.';
    }
    if(!empty($image['tmp_name'])) {
      $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
      $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
  
      if(in_array($extension, $allowedExtensions)) { //verif de l'extension
        if($image['size'] > 2000000) {  // verif du poids
          $errors[] = "votre fichier est trop lourd...";
        }
      else {
        $newFileName = time() . '.' . $extension;
        move_uploaded_file($image['tmp_name'], '../assets/img/categories/'. $newFileName);
       }
      }
      else {
        $errors[] = "Votre fichier n'est pas d'un format autorisé ...";
      }
    }

    if(empty($errors)) {

      if(isset($newFileName)){

        $categoryId = $_GET['id'];
        $selectedCategory = getCategory($categoryId);
        unlink('../assets/img/categories/' . $selectedCategory['img']);


        $updateResult = updateCategory($_GET['id'], $_POST, $newFileName);
      }
      else {
        $updateResult = updateCategory($_GET['id'], $_POST);
      }

      if($updateResult == true) {
        $_SESSION['message'] = 'Catégorie bien mise à jour !';
        header('Location: index.php?page=categories&action=list');
        exit;
      }
      else {
        $_SESSION['error'] = "Impossible d'enregristrer la modification de la catégorie ...";
        header('Location: index.php?page=categories&action=list');
      }
    }
  }

  $categoryId = $_GET['id'];
  $selectedCategory = getCategory($categoryId);
  $view = 'views/categoryFormView.php';
}







?>