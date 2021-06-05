<?php if(isset($selectedCategory)): ?>
  <div class="container-categories-infos">
    <h1><?= $selectedCategory['name'] ?></h1>
    <p><?= $selectedCategory['description'] ?></p>
  </div>
<?php endif; ?>

<?php if(count($posts) > 0): ?>
  <?php foreach($posts as $post): ?>
    <div class="container-all-posts">
      <article class="post">
                  <a href="index.php?page=post&id=<?= $post['id']; ?>">
                      <div class="cadre-image" style="background-image: url('assets/img/posts/<?= $post['img'];?>" alt="<?=$post['title'];?>)'"></div>
                      <div class="card-post">
                          <h2><?= $post['title']; ?></h2>
                          <p><?= $post['summary']; ?></p>
                          <span><?= dateConverter($post['date']); ?></span>
                      </div>
                  </a>
              </article>
    </div>
  <?php endforeach; ?>
    <?php else: ?>
      <p>Aucun article pour le moment...</p>
<?php endif; ?>
