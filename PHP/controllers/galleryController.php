<?php 


$action = $_GET['action'];

if($action == 'listGallery') {
  $view = 'views/galleryView.php';
}

if($action == 'flowers') {
  $view = 'views/galleryFlowersView.php';
}

if($action == 'insects') {
  $view = 'views/galleryInsectsView.php';
}

if($action == 'water') {
  $view = 'views/galleryWaterView.php';
}

if($action == 'paint') {
  $view = 'views/galleryPaintView.php';
}

?>