
<div class="full-post">
  <h2><?= $post['title']; ?></h2>
  <img src="assets/img/posts/<?= $selectedPost['img'];?>" alt="<?=$selectedPost['title'];?>">
  <div class="content"><?= $post['content']; ?></div>
</div>

<a href="#">Commentaires : 4 </a>    <!--count le nb de commentaire-->
  <div class="comment-section">
    <?php if(count($comments) > 0): ?>
      <?php foreach($comments as $comment): ?>
          <article>
            <div class="comment">
                <h3><?= $comment['author']; ?> ( <?= dateConverter($post['date']) ; ?> )</h3>
                    <p><?= $comment['content']; ?></p>
            </div>
          </article>
      <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun commentaire.</p>
        <?php endif; ?>

<form class="form-comment" action="" method="POST">
  <label for="content">Votre commentaire</label>
  <textarea name="content" id="content" cols="93" rows="10"></textarea>
  <button>Envoyer</button>
  <?php if(!empty($errors)): ?>
            <h3>Erreur :</h3>
            <?php foreach($errors as $error): ?>
                <?= $error ?><br>
            <?php endforeach; ?>
        <?php endif; ?>
</form>
</div>