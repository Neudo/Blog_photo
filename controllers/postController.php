<?php
    
    require_once ('models/Category.php');
    require_once ('models/Post.php');

    if(isset($_GET['id'])){
    	$postId = $_GET['id'];
    }
    else{
    	header('Location:index.php?page=404');
    	exit;
    }

    $post = getPost($postId);

    if($post == false){
    	header('Location:index.php?page=404');
    	exit;
    }
    
    $categories = getAllCategories();

    $view = 'views/postView.php';
    
?>