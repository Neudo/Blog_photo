
<img src="assets/img/posts/<?= $selectedPost['img'];?>" alt="<?=$selectedPost['title'];?>"> 
  <h2><?= $post['title']; ?></h2>
  <span><?= dateConverter($post['date']); ?></span>
  <div class="content"><?= $post['content']; ?></div>

  <a href="#">Commentaire : 4 </a>    <!--count le nb de commentaire-->
    <div class="comment-section">
    <?php if(count($comments) > 0): ?>
            <?php foreach($comments as $comment): ?>
              <article>
                <div class="comment">
                    <h2><?= $comment['author'] . dateConverter($post['date']); ?></h2>
                        <p><?= $comment['content']; ?></p>
                </div>
              </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun commentaire pour le moment...</p>
        <?php endif; ?>
    </div>