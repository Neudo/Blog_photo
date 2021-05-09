<h3>Catégorie : <?= $post['name']; ?> </h3> <br>

<img src="assets/img/posts/<?= $selectedPost['img'];?>" alt="<?=$selectedPost['title'];?>"> 
  <h2><?= $post['title']; ?></h2>
  <span><?= dateConverter($post['date']); ?></span>
  <div><?= $post['content']; ?></div>
  <a href="#">Ecrire un commentaire</a>