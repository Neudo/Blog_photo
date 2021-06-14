<?php
require_once('models/Category.php');


$errors = [];

if(!empty($_POST)){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['e-mail'];
    $object = $_POST['object'];
    $content = $_POST['content'];
  
    if(empty($lastname)){
        $errors[] = "le nom est obligatoire !";
    }
    if(empty($firstname)){
        $errors[] = "le prénom est obligatoire !";
    }
    if(empty($object)){
        $errors[] = "le sujet de votre message est obligatoire !";
    }
    if(empty($content)){
        $errors[] = "le message est obligatoire !";
    }
    if(empty($email)){
        $errors[] = "l'email est obligatoire !";
    }
  
    if (checkEmailFormat($email)) {
        $mailSend = mail($email, $object, $content);
    }
    else {
        $errors[] = "Merci d'entrer un email valide !";
    }
}
    
$categories = getAllCategories();

 $view = 'views/contactView.php';
    
?>
