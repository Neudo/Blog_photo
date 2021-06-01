<?php 

require_once ('models/Category.php');
require_once('models/User.php');
$categories = getAllCategories();


$action = $_GET['action'];
$errors = [];


if($action == 'login') {  

  if(isset($_SESSION['user'])) {
    header('Location: index.php'); 
    exit;
  }

  if(!empty($_POST)) {

    $submittedEmail = $_POST['email'];
    $submittedPassword = $_POST['password'];  


    if(empty($submittedEmail)){  
      $errors[] = 'merci de renseigner votre email.';
    }
    elseif(!checkEmailFormat($submittedEmail)){
      $errors[] = 'merci d\'enter une email valide'; 
    }

    if(empty($submittedPassword)) {
    $errors[] = 'merci de renseigner votre mot de passe.';
  }

    if(empty($errors)) { 
      $user = login($_POST['email'], $_POST['password']);

      if(!$user) {  
        $errors[] = 'Utilisateur introuvable, vérifiez vos identifiants.';
      }
      else {  
        $_SESSION['user'] = [
          'pseudo' => $user['pseudo'],
          'is_admin' => $user['is_admin'],
        ];

        $_SESSION['message'] = '<span class="succes">Vous êtes bien connecté !</span>'; 

        header('Location: index.php'); 
        exit;
      }
    }

  }

  $view = 'views/loginView.php';
}

if($action == 'logout') {  

  unset($_SESSION['user']); 
  $_SESSION['message'] = '<span class="succes">Vous êtes bien déconnecté !</span>';
  header('Location: index.php'); 
  exit;
}

if($action == 'register') {

  if(!empty($_POST)) {
    $submittedPseudo = $_POST['pseudo'];
    $submittedEmail = $_POST['email'];
    $submittedPassword = $_POST['password'];
    $submittedPasswordConfirmation = $_POST['password-confirmation'];
    $submittedBio = $_POST['bio'];
    $pseudo = getPseudo();

    if(empty($submittedPseudo)) {
      $errors[] =  'merci de renseigner votre Pseudo.';
    }
    elseif($submittedPseudo == $pseudo) {
      $errors[] = 'adresse email déjà utilisée.';
    }

    if(empty($submittedEmail)) {  
      $errors[] = 'merci de renseigner votre email.';
    }
    elseif(!checkEmailFormat($submittedEmail)){
      $errors[] = 'merci d\'enter une email valide.';
    } 

    if(empty($submittedPassword)) {
      $errors[] = 'merci de renseigner votre mot de passe.';
    }
    elseif($submittedPassword != $submittedPasswordConfirmation) {
      $errors[] = 'merci de saisir le même mot de passe !';
    }

    if(empty($submittedBio)) {
      $errors [] = 'merci de remplir votre biographie.';
    }

    if(empty($errors)) {
      $creatUser = newUser($submittedPseudo, $submittedEmail, $submittedBio, $submittedPassword);
      $_SESSION['message'] = '<span class="succes">Inscription réussie ! Vous pouvez maintenant vous connecter.</span>';
    }
  }
  $view = 'views/registerView.php';
}

if($action == 'edit') {
  


  $view = 'views/userInfosView.php';

}

if($action == 'choose') {
  $view = 'views/userView.php';
}

?>
