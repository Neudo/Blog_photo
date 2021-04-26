<?php
$action = $_GET['action'];
require_once('../models/User.php');

if($action == 'list') {
  $users = getAllUsers();
  $view = 'views/usersListView.php';  
}

if($action == 'delete') {
  deleteUser($_GET['id']);

    $_SESSION['message'] = "Suppression effectuée  !";
    header('Location: index.php?page=users&action=list');
    exit;
}

if($action == 'new') {

  if(!empty($_POST)) {
    $submittedPseudo = $_POST['pseudo'];
    $submittedEmail = $_POST['email'];
    $submittedPassword = $_POST['password'];

    if(empty($submittedPseudo)) {
      $errors[] = "Merci de donner un nom !";
    }
    if(empty($submittedEmail)) {
      $errors[] = "Merci de donner une description !";
    }
    elseif(!checkEmailFormat($submittedEmail)){
      $errors[] = 'merci d\'enter une email valide !';
    }
    if(empty($submittedPassword)) {
      $errors[] = "Merci d'indiquer le mot de passe !'";
    }

    if(empty($errors)) {
      $result = newUser($submittedPseudo, $submittedEmail, $submittedPassword);

      if(!$result){
        $_SESSION['message'] = "Utilisateur bien ajouté !";
        header('Location: index.php?page=users&action=list');
        exit;
      }
      else {
        $_SESSION['error'] = "Impossible d'enregistrer l'utilisateur ...";
        header('Location: index.php?page=users&action=list');
        exit;
      }
    }
  }
  $view = 'views/userFormView.php';  
}

if($action == 'edit') {

  if(!empty($_POST)) {
    $submittedPseudo = $_POST['pseudo'];
    $submittedEmail = $_POST['email'];
    $submittedPassword = $_POST['password'];

    if(empty($submittedPseudo)) {
      $errors[] = "Merci de donner un nom !";
    }
    if(empty($submittedEmail)) {
      $errors[] = "Merci de donner une description !";
    }
    elseif(!checkEmailFormat($submittedEmail)){
      $errors[] = 'merci d\'enter une email valide !';
    }
    if(empty($errors)) {
      $result = updateUser($_GET['id'], $_POST);
    }
  }

  $userId = $_GET['id'];
  $selectedUser = getUser($userId);
  $view = 'views/userFormView.php';

}
?>