<?php

	require_once ('models/Category.php');
    require_once ('models/Post.php');



    if(isset($_GET['category_id'])){

			$categoryId = $_GET['category_id'];
			$postId = $_GET['id'];
			


    	$selectedCategory = getCategory($categoryId);

    	if($selectedCategory == false){
	    	header('Location:index.php?page=404');
	    	exit;
	    }

			$posts = getPostsByCategoryId($categoryId);
    }
    else{
      
    	$posts = getAllPosts();
    	
		}
		$categories = getAllCategories();
		$latestPosts = getLatestPosts();

    $view = 'views/postListView.php';


?> 

