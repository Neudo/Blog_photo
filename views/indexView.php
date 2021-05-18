<img class="cover-pic" src="assets/img/various/main-pic.jpeg" alt="">

<div class="container-categories-index">
        <?php foreach($categories as $category): ?>
            <article>
                <div class="category">
                    <a href="index.php?page=categories&category_id=<?= $category['id']; ?>">
                        <img src="assets/img/categories/<?= $category['img'];?>" alt="<?=$category['name'];?>">
                            <div class="card-category">
                                <h2><?= $category['name']; ?></h2>
                            </div>
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

<div class="line"></div>

<div class="container-latest-posts">
    <div class="vertical latest">Derniers articles</div>
        <?php if(count($posts) > 0): ?>
            <?php foreach($latestPosts as $post): ?>
            <article>
                <a href="index.php?page=post&id=<?= $post['id']; ?>">
                    <div class="cadre-image" style="background-image: url('assets/img/posts/<?= $post['img'];?>" alt="<?=$post['title'];?>) '"></div> 
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

<div class="all-posts-button">
    <a href="index.php?page=posts">Voir tous les articles</a>
</div>