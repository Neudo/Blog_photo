<?php
    
    require_once ('models/Category.php');
    require_once ('models/Post.php');
    require_once ('models/Comment.php');

    $errors = [];



    if(!empty($_POST)) {
        $content = $_POST['content'];
        $userId = $_SESSION['user']['id'];
        $postId = $_GET['id'];


        if(empty($content)){
            $errors[] = "Veuillez saisir un commentaire.";
        }

        if(empty($errors)){
            $postComment = addComment($content, $postId, $userId);
        }
    }


    $postId = $_GET['id'];
    $post = getPost($postId);

    if($post == false){
    	header('Location:index.php?page=404');
    	exit;
    }
    $comments = getPostComments($postId);

    $categories = getAllCategories();
    $postId = $_GET['id'];
    $selectedPost = getPost($postId);

    $view = 'views/postView.php';
    
?>