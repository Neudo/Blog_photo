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
    $postId = $_GET['id'];
    $selectedPost = getPost($postId);


    $view = 'views/postView.php';
    
?>