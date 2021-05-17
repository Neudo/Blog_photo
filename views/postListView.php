
    <div class="container-latest-posts">
        <?php if(count($posts) > 0): ?>
            <?php foreach($latestPosts as $post): ?>
            <article>
                <div class="post">
                    <a href="index.php?page=post&id=<?= $post['id']; ?>">
                    <img src="assets/img/posts/<?= $post['img'];?>" alt="<?=$post['title'];?>">
                    <h2><?= $post['title']; ?></h2>
                        <div><?= $post['summary']; ?></div>
                        <span><?= dateConverter($post['date']); ?></span>
                        </a>
                </div>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun article pour le moment...</p>
        <?php endif; ?>
    </div>
