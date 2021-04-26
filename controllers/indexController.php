<?php

    require_once ('models/Post.php');
    require_once ('models/Category.php');

    $categories = getAllCategories();
    $latestPosts = getLatestPosts();

    $view = 'views/indexView.php';
?>