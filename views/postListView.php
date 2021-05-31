
    <div class="container-all-posts">
        <?php if(count($posts) > 0): ?>
            <?php foreach($posts as $post): ?>
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
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun article pour le moment...</p>
        <?php endif; ?>
    </div>