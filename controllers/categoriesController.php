<?php 

require_once ('models/Category.php');
require_once ('models/Post.php');

if(isset($_GET['category_id'])){

  $categoryId = $_GET['category_id'];
  $selectedCategory = getCategory($categoryId);
  $posts = getPostsByCategoryId($categoryId);


  if($selectedCategory == false){
    header('Location:index.php?page=404');
    exit;
  } 

}



$categories = getAllCategories();

$view = 'views/categoriesView.php';

?>